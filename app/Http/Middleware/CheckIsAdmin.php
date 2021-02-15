<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $session =  $request -> session();

        $usuario = User::find($session -> get('id'));
        
        if(!is_null($usuario) && $usuario -> admin){
            return $next($request);
        }

        return redirect('/');
    }
}
