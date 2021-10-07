<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{

    public function index()
    {
        /** @var Order[]|Collection $orders */
        $orders = Order::limit(100)->latest()->get();
        return view('admin/order-index')
            ->with('orders', $orders);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Order $order)
    {
        return view('admin/order-show')
            ->with('order', $order);
    }


    public function edit(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        Log::info($message = 'Order ' . $order->id . ' deleted');
        $order->delete();
        return redirect()->back()->with('success', $message);
    }
}
