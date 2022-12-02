<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //cek kalu di authnya udh ada history login, dia gaboleh masuk ke login lagi, bakal balik ke todo
        if(Auth::check()){
        return redirect()->route('dashboard.io')->with('notAllowed', 'Anda sudah login!');
        }

        return $next($request);
    }
}
