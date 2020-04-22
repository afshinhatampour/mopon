<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class ChackUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth::user()) {
            if (auth::user()->role === 1) {
                return $next($request);
            } else {
                return response()->json(
                    [
                        'status' => 500,
                        'message' => 'you should login as an admin'
                    ]
                );
            }
        } else {
            return response()->json(
                [
                    'message' => 'you should login as an admin'
                ]
            );
        }
    }
}
