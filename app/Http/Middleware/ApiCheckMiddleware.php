<?php

namespace App\Http\Middleware;

use Closure;

class ApiCheckMiddleware
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
        // 站内访问
        if( server('HTTP_REFERER') !== null )
            return response()->json(['code'=>400]);
        // ajax请求
        if( $request->ajax() )
            return response()->json(['code'=>300]);
        return $next($request);

    }
}