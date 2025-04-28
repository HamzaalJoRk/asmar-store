<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Agent;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Transaction;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{


    /**
     * Show the application dashboard.
     *layouts-scrollable
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($type='Pending')
    {

        $orders=Order::MyOrders()->when($type == 'Pending' , function ($q) {
            return $q->Pending();
        })->latest()->get();

        return view('front.orders.index')->with([
            'orders'=>$orders,
            'type'=>$type,
        ]);
    }



}
