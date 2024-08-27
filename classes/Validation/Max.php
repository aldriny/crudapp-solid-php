<?php

namespace OnlineShop\Classes\Validation;

require_once 'ValidationInterface.php';

use OnlineShop\Classes\Validation\ValidationInterface;


class Max implements ValidationInterface{
    private $maxLenth;
    public function __construct($maxLenth){
        $this->maxLenth = $maxLenth;
    }
    
    public function validate($key, $value) {
        if (strlen($value) > $this->maxLenth){
            return "$key must not exceed $this->maxLenth characters";
        }
    }
}