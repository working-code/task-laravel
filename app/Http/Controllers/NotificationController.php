<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Order;
use Illuminate\Http\Request;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

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
        $notification = new Notification(['email' => $request->email]);
        $notification->save();
        return redirect()->route('notifications.all');
    }

    public function edit($id)
    {
        $notification = Notification::query()->find($id);
        return view('admin.notifications.edit', ['notification' => $notification]);
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

    public static function sendNotification($id)
    {
        $order = Order::with('product')->find($id);
        $emails = array_column(Notification::all('email')->toArray(), 'email');
//        dd(env('EMAIL_LOGIN'));
        $emailMessage = "Заказ {$order->id}, email: {$order->email}, товар: {$order->product->name}, цена: {$order->product->price}";
        $emailFrom = [env('EMAIL_LOGIN') => 'Games store'];
        $emailTo = $emails;
        $emailTheme = 'Уведомление о заказе игры ' . $order->product->name;

        $countSend = 0;
        try {
            $transport = (new Swift_SmtpTransport(env('EMAIL_SMTP'), env('EMAIL_PORT'), 'ssl'))
                ->setUsername(env('EMAIL_LOGIN'))
                ->setPassword(env('EMAIL_PASSWORD'));
            $mailer = new Swift_Mailer($transport);
            $message = (new Swift_Message($emailTheme))
                ->setFrom($emailFrom)
                ->setTo($emailTo)
                ->setBody($emailMessage);
            $countSend = $mailer->send($message);
        } catch (Exception $e) {
//            out in log
        }
    }

}
