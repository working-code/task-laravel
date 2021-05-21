<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function all()
    {
        $notifications = Notification::all();
        return view('admin.notifications.all', ['notifications' => $notifications]);
    }

    public function addView()
    {
        return view('admin.notifications.add');
    }

    public function add(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $notification = new Notification(['email'=> $request->email]);
        $notification->save();
        return redirect()->route('notifications.all');
    }

    public function edit($id)
    {
        $notification = Notification::query()->find($id);
        return view('admin.notifications.edit', ['notification'=>$notification]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $notification = Notification::query()->find($request->id);
        $notification->email = $request->email;
        $notification->save();
        return redirect()->route('notifications.all');
    }

    public function delete($id)
    {
        $notification = Notification::query()->find($id);
        $notification->delete();
        return redirect()->route('notifications.all');
    }
}
