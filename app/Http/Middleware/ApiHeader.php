<?php

namespace App\Http\Middleware;

use Closure;

class ApiHeader
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
        $acceptHeader = $request->header('Accept');
        
        if ('application/vnd.Barracuda+json' != $acceptHeader) {
            return response()->api(null, 'Invalid Accept Header', false, 400);
        }

        $version = $request->header('Version');
        if(is_null($version)) {
            return response()->api(null, 'Missing API Version', false, 400);
        }

        if(! in_array($version, config('api.versions'))) {
            return response()->api(null, 'Invalid API Version', false, 400);
        }
        
        return $next($request);
    }
}
