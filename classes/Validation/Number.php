<?php

namespace OnlineShop\Classes\Validation;

require_once 'ValidationInterface.php';

use OnlineShop\Classes\Validation\ValidationInterface;


class Number implements ValidationInterface{
    public function validate($key, $value) {
        if (!is_numeric($value)){
            return "$key must be number";
        }
        else{
            return false;
        }
    }
}