<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ((env('API_URL')  !== null || '') && (env('API_KEY') !== null || ''))
            return $next($request);

        return response()->json('Hmm, sorry missing API_URL or API_KEY');
    }
}
