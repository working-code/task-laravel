<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestBy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            $name = $request->session()->get('name');
            $email = $request->session()->get('email');

            if (!$name && !$email) {
                $request->flash();
//                dd($request, $name, $email);
                return redirect()->route('orders.create');
            }

            $request->request->add([
                'name' => $name,
                'email' => $email
            ]);
        }
        return $next($request);
    }
}
