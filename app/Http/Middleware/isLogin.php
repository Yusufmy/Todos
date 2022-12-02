<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLogin
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
        //cek apakah ada history login di authnya, kalu ada dibolehkan lanjut akses laman
        if(Auth::check()){
            return $next($request);
        }
        //kalu gaada history login bakal diarahi lagi ke logi dengan pesan
        return redirect('/')->with('notAllowed', 'Silahkan login terlebih dahulu!');
    }
}
