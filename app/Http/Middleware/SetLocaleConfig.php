<?php

namespace App\Http\Middleware;

use Closure;

class SetLocaleConfig
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
        if(session()->has('locale'))
            \App::setLocale(session('locale'));

        return $next($request);
    }
}
