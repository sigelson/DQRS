<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfSessionExpired
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
        if (auth()->check()) {
            dd('');
        }

        return $next($request);
    }
}
