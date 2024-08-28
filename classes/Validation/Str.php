<?php

namespace OnlineShop\Classes\Validation;

require_once 'ValidationInterface.php';

use OnlineShop\Classes\Validation\ValidationInterface;


class Str implements ValidationInterface{
    private const PATTERN = "/^([A-Za-z\p{L}\d\s'\-]{2,500})$/u";
    
    public function validate($key, $value) {
        if (!is_string($value)){
            return "$key must be string";
        }
        if (!preg_match(self::PATTERN, $value)){
            return "$key is not valid";
        }
        else{
            return false;
        }
    }
}