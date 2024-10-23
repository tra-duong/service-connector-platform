<?php

namespace Modules\SocialAuth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Modules\SocialAuth\Services\Interfaces\AuthServiceInterface;

class SocialAuthController extends Controller
{
    protected AuthServiceInterface $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Return redirect response for endpoint.
     *
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function redirect(string $provider)
    {
        return response()->json([
            'redirect_url' => Socialite::driver($provider)->stateless()->redirect()->getTargetUrl(),
        ]);
    }

    /**
     * Handle callback.
     *
     * @return mixed
     */
    public function callback(string $provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();

            // $authService = App::make($provider);
            // dd($authService);
            return $this->authService->loginOrCreate($user);
        } catch (\Exception $e) {
            Log::error('Error fetching user: ', ['exception' => $e->getMessage()]);

            return redirect(config('app.fe_url').'/login');
        }
    }
}
