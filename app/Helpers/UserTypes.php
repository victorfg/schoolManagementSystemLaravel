<?php


namespace App\Helpers;


class UserTypes
{
    public static function getUserTypeById($id)
    {
        return config('usertypes')[$id];
    }
    public static function getIdUserTypesByName($name)
    {
        return array_search($name, config('usertypes'));
    }
    public static function getUserTypes()
    {
        return config('usertypes');
    }
}
