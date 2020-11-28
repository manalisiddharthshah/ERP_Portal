<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Closure;

class LogCheck
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
        /**
        * Checking that session exists or not
        * If session exists then check the authentication using Auth::check()
        */
        if(empty(Session::has('frontSession'))){
            return redirect('login');
        }
        else
        { 
            if(Auth::check()){
                return $next($request);
            }
            return Redirect::to("login")->withSuccess('Opps! You do not have access');
        }
        //return $next($request);
    }
}
