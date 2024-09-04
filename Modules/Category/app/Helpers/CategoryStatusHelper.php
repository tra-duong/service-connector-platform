<?php

namespace Modules\Category\Helpers;

class CategoryStatusHelper
{
    const STATUS_INACTIVE = 0;

    const STATUS_ACTIVE = 1;

    const STATUS_SOFT_DELETE = 2;

    /**
     * Get all available statuses.
     *
     * @return string[]
     */
    public static function getAllStatus()
    {
        return [
            self::STATUS_INACTIVE => 'Inactive',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_SOFT_DELETE => 'Soft Delete',
        ];
    }
}
