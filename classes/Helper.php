<?php

namespace classes;

class Helper
{

    public static function isAuthorized()
    {
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
            return true;
        }

        return false;
    }

    public static function isRogue()
    {
        if (isset($_SESSION['sleep_time']) && $_SESSION['sleep_time'] >= time()
        ){
            return true;
        }

        return false;
    }

}