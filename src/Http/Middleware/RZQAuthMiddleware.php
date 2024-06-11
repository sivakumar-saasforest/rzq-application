<?php

namespace RzqApplication\Plugin\Http\Middleware;

use Closure;
use RzqApplication\Plugin\Store\Store;

class RZQAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $store = Store::store();

        return $next($request);
    }
}
