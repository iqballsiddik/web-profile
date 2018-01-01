<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateCheckAfterLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!empty(\Session::get('key'))){
            return redirect('/admin');
        }
        return $next($request);
    }
}
