<?php

namespace App\Http\Middleware;

use Closure;

class CustomAuthentication
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
        $token = $request->bearerToken();
        $user = \App\User::where('api_token', $token)->first();
        if ($user) {
            auth()->login($user);
            return $next($request);
        }
        return response([
            'message' => 'Unauthenticated'
        ], 403);
    }
}
