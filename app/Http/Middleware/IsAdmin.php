<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->roles == 'ADMIN') {
            return $next($request);
            return redirect('/admin');
        } elseif (Auth::check() && Auth::user()->roles == 'USER') {
            return redirect('/');
        } else {
            abort(403, 'Otoritas tidak termasuk');
        }
    }
}
