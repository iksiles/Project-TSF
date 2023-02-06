<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SeguridadMiddleware
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
        if(null !== session()->get('usuario'))
            return $next($request);

        $usu = session('usuario');
        if($usu->rol == 'admin') {
            return $next($request);
        }
        if ($usu->rol != 'admin'){
            return redirect('/Tsf');
        }
        return redirect('/Tsf');
    }
}