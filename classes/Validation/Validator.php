<?php

namespace OnlineShop\Classes\Validation;

use OnlineShop\Classes\Factory;

require_once 'Required.php';
require_once 'Str.php';
require_once 'Max.php';
require_once 'Number.php';
require_once 'Image.php';


class Validator{

    private $errors = [];
    public function validator($key, $value, $rules){
        foreach($rules as $rule){

            $parts = explode(':', $rule);
            $ruleClass = $parts[0];
            $ruleParams = isset($parts[1]) ? $parts[1] : null;

            $obj = isset($ruleParams)? Factory::create('Validation',$ruleClass,$ruleParams) : Factory::create('Validation',$ruleClass);
            $result = $obj->validate($key,$value);
            if ($result != false){
                return $this->errors[] = $result;
            }
        }
    }
    public function getError(){
        return $this->errors;
    }
}