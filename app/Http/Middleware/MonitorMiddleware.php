<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitorMiddleware
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
         * 3) Cuenta Votos
         * 4) Digitador + Cuenta Votos
         * 5) Monitor
         */

         switch(Auth::user()->role){
            case 1:
            case 5:
                return $next($request);

            case 2:
            case 4:
                return redirect()->route('factvote');
                
            case 3:
                return redirect()->route('factcountvote.create');
         }
    }
}
