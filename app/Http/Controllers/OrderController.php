<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all()
    {
        $orders = Order::with('product')->get();
        return view('admin.orders.all', ['orders' => $orders]);
    }
}
