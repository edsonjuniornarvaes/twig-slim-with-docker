<?php

use app\src\Flash;

$message = new \Twig_SimpleFunction('message', function($index){
    echo Flash::get($index);
});

return [
    $message
];