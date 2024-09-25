<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GeoIP; // Ha a torann/geoip csomagot használod

class BlockCaliforniaUsers
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $location = GeoIP::getLocation($ip);

        if ($location['state'] === 'California') {
            return response('404 Not Found', 404);
        }

        return $next($request);
    }
}
