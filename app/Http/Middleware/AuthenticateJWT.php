<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        if ($token) {
            $token = str_replace('Bearer ', '', $token);

            try {
                $decoded = JWT::decode($token, new Key(config('app.key'), 'HS256'));
                // Authenticate user & login.
                Auth::login($user);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } else {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        return $next($request);
    }
}
