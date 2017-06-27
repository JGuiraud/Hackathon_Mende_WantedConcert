<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{


    /**
    *Handle an incoming request.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \Closure  $next
        * @return mixed
        */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->roles->implode('slug') !== 'admin') {
            if (Auth::user()->roles->implode('slug') == 'pro') {
                return redirect('pro');
            } else {
                return redirect('user');
            }
        }
        return $next($request);
    }
}
