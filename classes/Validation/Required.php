<?php

namespace OnlineShop\Classes\Validation;

require_once 'ValidationInterface.php';

use OnlineShop\Classes\Validation\ValidationInterface;


class Required implements ValidationInterface{
    public function validate($key, $value)
    {
        if (empty($value)) {
            return "$key is required";
        }
        else{
            return false;
        }
    }
}
