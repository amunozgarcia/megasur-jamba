<?php namespace Jamba\Ws\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

class WsMiddleware implements Middleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        dd("Entro en el WsMiddleware");
        return $next($request);
    }
}