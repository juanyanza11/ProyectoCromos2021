<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EsAdmin
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
        $user=Auth::user();
            // en caso de que el usuario NO sea admin
            if ($user && !$user->esAdmin()){
                return redirect('/');
        }
        // en caso de que el usuario SI sea admin 
        return $next($request);

    }
}
