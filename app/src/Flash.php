<?php

namespace app\src;

class Flash {

    public static function add($index, message) {
        if(!isset($_SESSION[$index])) {
            $_SESSION[$index] = $message;
        }
    }

    public static function get() {
        
        if(isset($_SESSION[$index])) {
           $message = $_SESSION[$index];
        }

        unset($_SESSION[$index]);

        return $message ?? '';
    }
}