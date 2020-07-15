<?php

namespace app\traits;

trait Sanitize {

    public function sanitize() {
        $sanitized = [];

        foreach ($_POST as $field => $value) {
            $sanitized[$field] = filter_var($value, FILTER_SANITIZE_STRING);
        }
    }

}