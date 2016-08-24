<?php

namespace LearnGP\Http\Middleware;

use Closure;

class HeadOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!$user->isHead()) {
            return response('', 403);
        }

        return $next($request);
    }
}
