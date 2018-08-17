<?php

namespace App\Http\Middleware;

use Closure;

class AppendClientSecret
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
        $request->merge([
            'client_id'     => env('LARAVEL_CLIENT_ID'), 
            'client_secret' => env('LARAVEL_CLIENT_SECRET'),
            'grant_type'    => env('LARAVEL_GRANT_TYPE'),
            'scope'         => env('LARAVEL_SCOPE')
        ]);
        return $next($request);
    }
}
