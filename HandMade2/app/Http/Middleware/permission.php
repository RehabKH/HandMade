<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class permission
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
        if (Auth::user()->userType=='Seller') {
            return redirect('sellerHome');
        }
        else if(Auth::user()->userType=='admin'){
            return redirect('admin');
        }
        return $next($request);
    }
}
