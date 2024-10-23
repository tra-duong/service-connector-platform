<?php

namespace Modules\Common\Helpers;

class RoleHelper
{
    const ROLE_ANONYMOUS = 0;

    const ROLE_ADMINISTRATOR = 1;

    const ROLE_EDITOR = 2;

    const ROLE_AUTHENTICATED = 3;

    const ROLE_PROVIDER = 4;

    public static function values()
    {
        return [
            self::ROLE_ANONYMOUS => 'Anonymous',
            self::ROLE_ADMINISTRATOR => 'Admin',
            self::ROLE_EDITOR => 'Editor',
            self::ROLE_AUTHENTICATED => 'Authenticated',
            self::ROLE_PROVIDER => 'Provider',
        ];
    }

    /**
     * List roles.
     *
     * @return array
     */
    public static function keys()
    {
        return array_keys(self::values());
    }
}
