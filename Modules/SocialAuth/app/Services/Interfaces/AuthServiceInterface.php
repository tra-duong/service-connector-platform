<?php
namespace Modules\SocialAuth\Services\Interfaces;

use Laravel\Socialite\Two\User as SocialUser;
interface AuthServiceInterface
{
  /**
   * Login or create user via Social auth user.
   * @param \Laravel\Socialite\Two\User $socialUser
   * @return void
   */
  public function loginOrCreate(SocialUser $socialUser);
}
