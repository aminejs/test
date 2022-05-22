<?php

namespace App\Utils\Helper;


trait StringHelper
{
    public static function matchesPattern($pattern, $subject)
    {
        return preg_match($pattern, $subject);
    }
}