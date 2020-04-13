<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class urlBeforeAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rout = \Route::current()->getName();
        $url = URL::previous();

        if($rout == 'login' || $rout == 'register') {
            $BeforeUrl = $request->header('referer');

            if ($url != 'http://blog/login' || $url != 'http://blog/login') {
                session()->put('beforeUrl', $BeforeUrl);
            }
        }

        return $next($request);
    }
}
