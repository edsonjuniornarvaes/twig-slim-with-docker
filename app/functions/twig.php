<?php

use app\sr\Flash;

$message = new \Twig_SimpleFunction('message', function($index){
    echo Flash::($index);
});

return [
    $message
];