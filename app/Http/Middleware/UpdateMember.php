<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UpdateMember
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
        if(!is_null(Auth::user()) && Auth::user()->access_level >= 99) {
            return $next($request);

        } else {
            $user = $request->route('members');
            if(!is_null(Auth::user()) && Auth::user()->id == $user->id && Auth::user()->access_level >= 11) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
