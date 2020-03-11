<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LoginPageMiddleware
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
        if(Session::get('admin_id') && Session::get('admin_name')){
            return redirect('/apanel/dashboard');
        }else{
            return $next($request);
        }
    }
}
