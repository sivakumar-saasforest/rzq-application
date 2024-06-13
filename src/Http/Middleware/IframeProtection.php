<?php

namespace RzqApplication\Plugin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Responsibility for protection against clickjaking
 */
class IframeProtection
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        // $domain = $shop
        //     ? $shop->name
        //     : '*.myrzq.com';

        $iframeAncestors = "frame-ancestors https://rzq-duplicate-records.saasforest.com https://rzq.saasforest.com";

        $response->headers->set(
            'Content-Security-Policy',
            $iframeAncestors
        );

        return $response;
    }
}
