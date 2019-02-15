<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class user
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
        if (Auth::user()->userType=='user') {
            return redirect('userHome');
        }
        else if(Auth::user()->userType=='admin'){
            return redirect('admin');
        }
        return $next($request);
    }
}
