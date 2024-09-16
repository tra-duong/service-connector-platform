<?php
namespace Modules\SocialAuth\Services;

use Firebase\JWT\JWT;
use Illuminate\Http\RedirectResponse;
use Modules\User\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Two\User as SocialUser;
use Modules\SocialAuth\Services\Interfaces\AuthServiceInterface;

class FacebookAuthService implements AuthServiceInterface
{
  public function loginOrCreate(SocialUser $socialUser): ?RedirectResponse
  {
    // Already login, redirect to front.0
    if (Auth::user()) {
      return Redirect::away(config('app.fe_url'));
    }
    $user = User::where('email', $socialUser->getEmail())->first();
    if (!$user) {
      $raw = $socialUser->getRaw();
      try {
        $user = User::create([
          'first_name' => $raw['given_name'] ?? '',
          'last_name' => $raw['family_name'] ?? '',
          'name' => $socialUser->getName(),
          'email' => $socialUser->getEmail(),
          'google_id' => $socialUser->getId(),
          'avatar' => $socialUser->getAvatar(),
        ]);
      } catch (\Exception $e) {
        Log::error($e->getMessage());
      } finally {
        return Redirect::away(config('app.fe_url'));
      }
    }
    try {
      $payload = [
        'iss' => "connector-jwt",
        'sub' => $user->id,
        'iat' => time(),
        'exp' => time() + 24 * 60 * 60,
        'user' => $user->toArray(),
      ];
      $jwt = JWT::encode($payload, config('socialite.secret'), config('socialite.algorithm'));
      return Redirect::away(config('app.fe_url') . '/login/callback/facebook?token=' . urlencode($jwt));
    } catch (\Exception $e) {
      Log::error($e->getMessage());
    } finally {
      return Redirect::away(config('app.fe_url'));
    }
  }
}
