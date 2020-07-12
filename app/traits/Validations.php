<?php

namespace app\traits;

trait Validations {

    private $errors = [];

    protected function required($field) {
        if(empty($_POST[$field])) {
            $this->errors[$field][] = flash($field, error('Esse campo é obrigatório'));
        }
    }

    protected function email($field) {

    }

    protected function phone() {

    }

    protected function unique() {

    }

    public function hasErrors() {
        return !empty($this->errors);
    }
}