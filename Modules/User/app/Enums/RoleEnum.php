<?php

namespace Modules\User\Enums;

enum RoleEnum
{
    //The Roles Enum
    const ROLE_ADMINISTRATOR = 'admin';

    const ROLE_EDITOR = 'editor';

    const ROLE_AUTHENTICATED = 'authenticated';

    const ROLE_SERVICE_PROVIDER = 'service_provider';

    const ROLE_SERVICE_EMPLOYER = 'service_employer';

    public static function getRoles()
    {
        return [
            self::ROLE_ADMINISTRATOR,
            self::ROLE_EDITOR,
            self::ROLE_AUTHENTICATED,
            self::ROLE_SERVICE_PROVIDER,
            self::ROLE_SERVICE_EMPLOYER,
        ];
    }
}
