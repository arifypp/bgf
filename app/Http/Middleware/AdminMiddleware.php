<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
			if (Auth::user()->is_super == 0) {
				return $next($request);
			} else {
				Auth::logout();
				return redirect(url('login'));
			}
		} else {
			Auth::logout();
			return redirect(url('login'));
		}
    }
}
