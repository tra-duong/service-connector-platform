<?php

namespace Modules\SocialAuth\Services\Interfaces;

use Laravel\Socialite\Two\User as SocialUser;

interface AuthServiceInterface
{
    /**
     * Login or create user via Social auth user.
     *
     * @return void
     */
    public function loginOrCreate(SocialUser $socialUser);
}
