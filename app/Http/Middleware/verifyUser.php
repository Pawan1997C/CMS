<?php

namespace App\Http\Middleware;

use Closure;

class verifyUser
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
        if (!auth()->user()->isAdmin()) {
            session()->flash('error', 'Sorry you are not authorize');
            return redirect(route('home'));
        }

        return $next($request);
    }
}
