<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $orderId = $id;
        $orders = Order::where('id', $id)->get();
        $orders->transform(function($orders, $key){
            $orders->cart = unserialize($orders->cart);
            return $orders;
        });

        return view('admin.pages.orders.show', compact('orders', 'orderId'));
    }
}
