<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionadminRequest;
use App\Http\Requests\TransactionRequest;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_transactions')->only(['index']);
        $this->middleware('permission:create_transactions')->only(['create', 'store']);
        $this->middleware('permission:update_transactions')->only(['edit', 'update']);
        $this->middleware('permission:delete_transactions')->only(['delete']);
    } // end of __construct

    public function index()
    {
        // where('status','<>','canceled')->
        $transactions = Transaction::with('bank', 'user', 'currency')
            ->latest()
            ->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $users = User::get();
        $banks = Bank::get();
        $currencys = Currency::get();
        return view('admin.transactions.create', compact('banks', 'users', 'currencys'));
    }

    public function store(TransactionadminRequest $request)
    {
        transaction::create($request->all());
        Alert::success(__('settings.success'), __('createsms'));
        return redirect()->route('ad.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        $users = User::get();
        $banks = Bank::get();
        $currencys = Currency::get();
        return view('admin.transactions.edit', compact('transaction', 'banks', 'users', 'currencys'));
    }

    public function update(TransactionadminRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->route('ad.transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        Alert::success(__('settings.success'), __('deletesms'));
        return redirect()->back();
    }

    public function change_status($id, Request $request)
    {
        // dd($request->all());
        $TransactionID = Crypt::decrypt($id);
        $transaction = Transaction::findorfail($TransactionID);
        // ($transaction->status == 'pending') ? $transaction->status = 'approved' : $transaction->status = 'pending';
        if ($transaction->status == 'pending') {
            $final_total = $transaction->final_total;

            $Currency = Currency::where('id', $transaction->currency_id)->first();
            if ($Currency) {
                $final_total = (1 / $Currency->rate) * $final_total;
            }
            $user = User::where('id', $transaction->user_id)->increment('user_balance', $final_total);
            $transaction->status = 'approved';
            // $transaction->user->update([
            //   'user_balance' =>  $transaction->user->user_balance + $transaction->final_total,
            // ]);
            // ->user_balance += $transaction->final_total;
        } elseif ($transaction->status == 'approved') {
            $transaction->status = 'canceled';
        } elseif ($transaction->status == 'canceled') {
            $transaction->status = 'approved';
        }
        $transaction->update();
        // if($transaction->status == 'approved'){
        //     $final_total=$transaction->final_total;

        //     $Currency=Currency::where('id',$transaction->currency_id)->first();
        //     if($Currency){
        //         $final_total= (1 / $Currency->rate)*$final_total;
        //     }
        //   $user=  User::where('id',$transaction->user_id)
        //         ->increment('user_balance',$final_total);
        // }
        Alert::success(__('settings.success'), __('changesms'));
        return redirect()->back();
    }
    
    public function cancel_status($id, Request $request)
    {
        $request->validate([
            'reason' => 'required',
            'status' => 'required',
        ]);
        // dd($request->all());
        $TransactionID = Crypt::decrypt($id);
        $transaction = Transaction::findorfail($TransactionID);
        $transaction->status == 'approved' ? ($transaction->status = 'canceled') : ($transaction->status = 'approved');
        $transaction->reason = $request->reason;
        $transaction->update();
        Alert::success(__('settings.success'), __('changesms'));
        return redirect()->back();
    }
}
