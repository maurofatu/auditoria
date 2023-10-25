<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountVotesMiddleware
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
        /**
         * Roles
         * 1) Administrador
         * 2) Digitador
         * 3) Coordinador
         * 4) Monitor
         */

        if( in_array( Auth::user()->fk_roles, [1,3] ) ){
            return $next($request);
        }elseif( in_array( Auth::user()->fk_roles, [4] ) ){
            return redirect()->route('monitor.dashboard');
        }elseif( in_array( Auth::user()->fk_roles, [2] ) ){
            return redirect()->route('home');
        }else{
            return view('errors.403');
        }
    }
}
