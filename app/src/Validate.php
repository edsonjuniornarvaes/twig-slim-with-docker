<?php

namespace app\src;

use app\traits\Validations;

class Validate {
    use Validations;

    public function validate($rules) {
        foreach ($rules as $field => $validation) {
            
            if($this->hasOneValidation($validation))   {
                $this->$validation($field);
            }

            if($this->hasOneOrMoreValidation($validation))   {
                $validations = explode(':', $validation);

                foreach ($validations as $validation) {
                    $this->$validation($field);
                }
            }
        }
    }

    public function hasOneValidation($validate) {
        return substr_count($validate, ':') == 0;
    }

    private function hasOneOrMoreValidation($validate) {
        return substr_count($validate, ':') >= 1;
    }
}