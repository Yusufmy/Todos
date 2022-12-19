<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    //...$roles - > untuk mengubah data yang dikirim ke middleware menjadi bentuk array
    public function handle(Request $request, Closure $next, ...$roles)
    {
        //cek apakah di dalam array $roles (parameter) yang dikirim dari route tadi terdapat role yang dimiliki user yang login
        if (in_array(Auth::user()->role, $roles)){
            return $next($request);
        }
        //kalou tidak bakal diarahkan ke halaman yang memunculkan arror not fount
        return redirect('/error');
    }
}
