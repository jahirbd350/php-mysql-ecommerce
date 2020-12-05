<?php


namespace App\classes;


class Database
{
    public static function db_connect(){
        $link = mysqli_connect('localhost','root','','isd_ecommerce');
        return $link;
    }


}