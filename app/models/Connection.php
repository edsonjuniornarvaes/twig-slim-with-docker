<?php

namespace app\models;


class Connection {
    
    $dsn = "mysql:host=localhost;dbname=database";
    $dsn = "mysql:host=mysql;port=3307;dbname=database";
    $dbuser = "root";
    $dbpass = "12345";

    public static function connect() {

        $pdo = new PDO($dsn,$dbuser, $dbpass);
        echo "Conectado!";

        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }

}