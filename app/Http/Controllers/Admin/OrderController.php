<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_orders')->only(['index']);
        $this->middleware('permission:create_orders')->only(['create', 'store']);
        $this->middleware('permission:update_orders')->only(['edit', 'update']);
        $this->middleware('permission:delete_orders')->only(['delete']);

    }// end of __construct
    public function index(){
        $orders= Order::with('user','game')->latest()->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }

    public function change_status($id,Request $request)
    {
        // dd($request->all());
        $orderID = Crypt::decrypt($id);
        $order = Order::findorfail($orderID);
        // ($order->status == 'pending') ? $order->status = 'approved' : $order->status = 'pending';
        if($order->status == 'pending'){
            $order->status = 'approved';
        }elseif($order->status == 'approved'){
            $order->status = 'canceled';
           $final_total=$order-> final_total;
           $user=$order->user_c;
           $user->amount_orders=$user->amount_orders - $final_total;
           $user->user_balance=$user->user_balance + $final_total;
           $user->save();
        }elseif($order->status == 'canceled'){
            $order->status = 'approved';
        }
        $order->update();
        Alert::success(__('settings.success'), __('changesms'));
        return redirect()->back();
    }
    public function cancel_status($id,Request $request)
    {
        $request->validate([
            'reason' => 'required',
            'status' => 'required',
        ]);
        // dd($request->all());
        $orderID = Crypt::decrypt($id);
        $order = Order::findorfail($orderID);
        ($order->status == 'approved') ? $order->status = 'canceled' : $order->status = 'approved';
        $order->reason = $request->reason;
        $order->update();
        Alert::success(__('settings.success'), __('changesms'));
        return redirect()->back();
    }

}
