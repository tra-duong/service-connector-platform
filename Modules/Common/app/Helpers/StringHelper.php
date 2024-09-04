<?php

namespace Modules\Common\Helpers;

class StringHelper
{
  public static function buildMachineName(string $str)
  {
    $lower = mb_strtolower(trim($str));

    return preg_replace('@[^a-z0-9_]+@', '_', $lower);
  }
}
