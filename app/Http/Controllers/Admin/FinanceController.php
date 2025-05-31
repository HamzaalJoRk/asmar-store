<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'in'); // 'in' = وارد (orders), 'out' = صادر (transactions)
        $fromDate = $request->get('from_date');
        $toDate = $request->get('to_date');

        // مجموع الوارد (Orders)
        $ordersQuery = Order::where('status', 'approved');
        if ($fromDate && $toDate) {
            $ordersQuery->whereBetween('created_at', [$fromDate, $toDate]);
        }
        $totalIn = $ordersQuery->sum('final_total');

        // مجموع الصادر (Transactions)
        $transactionsQuery = Transaction::where('status', 'approved');
        if ($fromDate && $toDate) {
            $transactionsQuery->whereBetween('created_at', [$fromDate, $toDate]);
        }
        $totalOut = $transactionsQuery->sum('final_total');


        if ($type == 'in') {
            $query = Order::with('user')
                ->where('status', 'approved');

            if ($fromDate && $toDate) {
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            }

            $items = $query->paginate(20);

            $total = $query->sum('final_total');

        } else { // type = 'out'
            $query = Transaction::with('user')
                ->where('status', 'approved');

            if ($fromDate && $toDate) {
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            }

            $items = $query->paginate(20);

            $total = $query->sum('final_total');
        }

        return view('admin.IncomingOutgoing.index', compact('items','totalOut','totalIn', 'total', 'type', 'fromDate', 'toDate'));
    }
}
