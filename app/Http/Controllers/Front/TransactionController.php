<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Agent;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\Transaction;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{


    /**
     * Show the application dashboard.
     *layouts-scrollable
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($type='Pending')
    {

        $transactions=Transaction::MyPayments()->when($type == 'Pending' , function ($q) {
            return $q->Pending();
        })->orderBy('date_at','desc')->get();
        // return  $transactions;
        return view('front.transactions.index')->with([
            'transactions'=>$transactions,
            'type'=>$type,
        ]);
    }
    public function create()
    {

        $banks=Bank::Active()->get();

        return view('front.transactions.create')->with([
            'banks'=>$banks
        ]);
    }
    public function stepTwo($id)
    {

        $bank=Bank::findorfail($id);
        $currencies =Currency::get();
        return view('front.transactions.step-two')->with([
            'currencies'=>$currencies,
            'bank'=>$bank
        ]);
    }
    public function store(TransactionRequest $request)
    {
        DB::beginTransaction();
        try {
            $bank=Bank::findorfail($request->payment_gateway);
            if(get_helper_price_by_id($request->original_amount,$request->currency_id) < $bank->minimum_payment ){
                return redirect()->back()->with( 'error',__('translation.error_minimum_payment'));

            }elseif(get_helper_price_by_id($request->original_amount,$request->currency_id)  >  $bank->limit_payment){
                return redirect()->back()->with( 'error',__('translation.error_limit_payment'));
            }
            $fee_amount= ($bank->fee_percentage / 100 )*$request->original_amount;
            $amount= $request->original_amount - $fee_amount;
            $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $invoice_no='Tr'.$randomNumber;
                Transaction::create([
                    'user_id'=>auth()->id(),
                    'bank_id'=>$bank->id,
                    'invoice_no'=>$invoice_no,
                    'currency_id'=>$request->currency_id,
                    'account_name'=>$request->name,
                    'account_number'=>$request->address,
                    'date_at'=>$request->date,
                    'details'=>$request->details,
                    'final_total'=>$amount,
                ]);
                DB::commit();
            return redirect()->back()->with('message', __('translation.store_Transaction_done'));
         } catch (\Exception $e) {
            DB::rollBack();
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            return redirect()->back()->with( 'error', __('translation.same_thing_error'));

        }


    }


}
