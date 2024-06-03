<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogMiddleware
{
    public function handle($request, Closure $next)
    {
        Log::info('Request URL:', ['url' => $request->url()]);
        return $next($request);
    }
}
