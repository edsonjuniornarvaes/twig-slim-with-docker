<?php

namespace app\models ;
use PDO;

class Connection 
{

    public static function connect() {

        $pdo = new PDO("mysql:host=mysql;dbname=database;charset=utf8","root", "12345");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }

}