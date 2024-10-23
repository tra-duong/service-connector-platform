<?php

namespace Modules\SocialAuth\Tests\Unit;

use Firebase\JWT\JWT;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JwtUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testJwt()
    {
        $payload = [
            'iss' => 'connector-jwt',
            'sub' => 1,
            'iat' => time(),
            'exp' => time() + 24 * 60 * 60,
        ];
        $secret = config('socialite.secret'); // "ptIioTIFidRubGxF2cZHahUrOC3yqTCQNuqOTfX705dhdIZe3c3gYTKPvhYLFozilxYMfAb2fJc7dFP5YeOOxPpZv6whJrr5UKSWHwsZk3ZNofckr1ryxMzOo1";
        $algorithm = config('socialite.algorithm'); // "HS256";

        var_dump($secret);
        var_dump($algorithm);
        try {
            $jwt = JWT::encode($payload, config('socialite.secret'), config('socialite.algorithm'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        // dd($jwt);
        $jwt = JWT::encode($payload, 'ptIioTIFidRubGxF2cZHahUrOC3yqTCQNuqOTfX705dhdIZe3c3gYTKPvhYLFozilxYMfAb2fJc7dFP5YeOOxPpZv6whJrr5UKSWHwsZk3ZNofckr1ryxMzOo1', 'HS256');
        dd($jwt);
        dd(11111);
        dd($jwt);
    }
}
