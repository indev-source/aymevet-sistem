<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class UserRol
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
        if(Auth::check()){
            if(Auth::user()->rol == 'vendedor')
                return redirect('vender');
        }
        return $next($request);
    }
}
