<?php

namespace OnlineShop\Classes\Validation;

interface ValidationInterface{
    public function validate($key, $value);
}