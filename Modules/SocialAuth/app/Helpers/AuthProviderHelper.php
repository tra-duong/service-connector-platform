<?php

namespace Modules\SocialAuth\Helpers;

class AuthProviderHelper
{
    const GOOGLE = 'google';

    const FACEBOOK = 'facebook';

    const ZALO = 'zalo';

    const LINKEDIN = 'linkedin';

    const TIKTOK = 'tiktok';

    /**
     * List Providers.
     *
     * @return string[]
     */
    public static function values()
    {
        return [
            self::GOOGLE => 'Google provider',
            self::FACEBOOK => 'Facebook provider',
            self::ZALO => 'Zalo provider',
            self::LINKEDIN => 'Linkedin provider',
            self::TIKTOK => 'Tiktok provider',
        ];
    }

    /**
     * List providers by key.
     *
     * @return array
     */
    public static function keys()
    {
        return array_keys(self::values());
    }
}
