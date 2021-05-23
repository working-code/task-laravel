<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Order;
use App\Models\Role;
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

    public function allForUser(Request $request)
    {
        $user = User::query()->find(Auth::id());
        $orders = null;
        if ($user) {
            $email = $user->email;
        } else {
            $email = $request->session()->get('email');
        }
        if ($email) {
            $orders = Order::with('product')->where('email', '=', $email)->get();
        }
        return view(Role::getRole() . '.orders.my', ['orders' => $orders]);
    }

    public function add(Request $request)
    {
        $request->validate(['id' => 'integer']);
        $userId = Auth::id();

        $order = new Order();
        $order->products_id = $request->id;

        if ($userId) {
            $user = User::find($userId);

            $order->email = $user->email;
            $order->name = $user->name;
        } else {
            $order->name = $request->name;
            $order->email = $request->email;
//            $order->guest_id = $request->session()->getId();
        }
        $order->save();
        NotificationController::sendNotification($order->id);
        return redirect()->route('orders.user');
    }

    public function inputDataGuest(Request $request)
    {
        return view('user.orders.create', ['id' => $request->old('id')]);
    }

    public function addDataGuestInSession(Request $request)
    {
        $request->validate([
            'email' => 'required|String',
            'name' => 'required|String'
        ]);
        $request->session()->put('name', $request->name);
        $request->session()->put('email', $request->email);
        return redirect()->route('orders.add', ['id' => $request->id]);
    }
}
