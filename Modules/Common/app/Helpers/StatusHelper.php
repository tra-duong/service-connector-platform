<?php

namespace Modules\Common\Helpers;

class StatusHelper
{
  const STATUS_INACTIVE = 0;
  const STATUS_ACTIVE = 1;
  const STATUS_DRAFT = 2;
  public static function values()
  {
    return [
      self::STATUS_INACTIVE => 'Inactive',
      self::STATUS_ACTIVE => 'Active',
      self::STATUS_DRAFT => 'Draft',
    ];
  }

  /**
   * List statuses by key.
   * @return array
   */
  public static function keys()
  {
    return array_keys(self::values());
  }

}
