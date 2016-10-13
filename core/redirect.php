<?php
namespace Core\Core;

/*
*---------------------------------------------------------------
* Redirect Helper Class
*---------------------------------------------------------------
*
* This class allows for reditecting to pages..
* You can add new Methods
*/

class Redirect {

    function __construct()
    {

    }

    public static function To($page)
    {
    header('Location:/'.$page);
    }
}

 ?>
