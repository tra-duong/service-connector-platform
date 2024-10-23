<?php

namespace Modules\SocialAuth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\SocialAuth\Helpers\AuthProviderHelper;

class CheckProvider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $provider = $request->route('provider');
        if (! in_array($provider, AuthProviderHelper::keys())) {
            return response()->json(['error' => 'Invalid provider'], 400);
        }

        return $next($request);
    }
}
