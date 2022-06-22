<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStatus
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
        if (auth()->user()->status == 1) {
            return $next($request);
        }
        Session::flush();
        
        Auth::logout();

        if(auth()->user()->role == "user"){
            return redirect('landing_page')->with('success','Akun sudah nonaktif');
        }
        return redirect('login')->with('success','Akun sudah nonaktif');
    }
}
