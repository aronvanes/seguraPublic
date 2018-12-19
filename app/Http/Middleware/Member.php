<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Member
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
        if(is_null(Auth::user()) || Auth::user()->access_level < 11 || Auth::user()->access_level == 33) {
            return redirect('/');
        }
        return $next($request);
    }
}
