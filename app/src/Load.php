<?php

namespace app\src;

class Load {
     public static function file($file) {
        $file = path().$file;

        if(!file_exists($file)) {
            throw new \Exception("Esse arquivo não existe: {$file}");
        }

        return require $file;
     }
}