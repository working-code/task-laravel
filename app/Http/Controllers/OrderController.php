<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function all()
    {
        $orders = Order::with('product')->get();
        return view('admin.orders.all', ['orders' => $orders]);
    }

    public function allForUser()
    {
        $user = User::query()->find(Auth::id());
        $orders = Order::with('product')->where('email', '=', $user->email)->get();
        return view('admin.orders.my', ['orders' => $orders]);
    }
}
