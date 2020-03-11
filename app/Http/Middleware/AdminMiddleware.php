<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminMiddleware
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
            return $next($request);
        }else{
            session()->flash('color', 'red');
            session()->flash('message', 'Please Login with Your Valid Email & Password');
            return redirect('/cosmosapanel');
        }

    }
}
