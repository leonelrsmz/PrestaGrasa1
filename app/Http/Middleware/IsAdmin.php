<?php

namespace App\Http\Middleware;

use Closure, Auth;
use Illuminate\Http\Request;

class IsAdmin
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
        if(Auth::user()->rol=="1"): //Verifica la autenticación de rol 1 para darle acceso como admin
            return $next($request);
        else:
            return redirect('/'); 
        endif;
    }
}
