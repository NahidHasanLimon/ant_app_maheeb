<?php
/**
 * Created by PhpStorm.
 * User: UnderTaker
 * Date: 03-Sep-20
 * Time: 12:36 PM
 */

namespace App;


use Config;
use URL;

class Asset
{

    private static function getUrl($type, $file)
    {
        return URL::to(Config::get('assets.' . $type) . '/' . $file);
    }

    public static function css($file)
    {
        return self::getUrl('css', $file);
    }

    public static function img($file)
    {
        return self::getUrl('img', $file);
    }

    public static function js($file)
    {
        return self::getUrl('js', $file);
    }
}