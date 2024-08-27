<?php

namespace OnlineShop\Classes\Queries;

require_once 'Select.php';
require_once 'Insert.php';
require_once 'Update.php';
require_once 'Delete.php';



class Query{
    private $errors = [];
    public function getQuery($operationName, $columns, $table, $values = null, $key = null) {
        $query = "OnlineShop\Classes\Queries\\" . $operationName;
        $obj = new $query;

        $result = $obj->query($columns, $table, $values, $key);

        if($result == false) {
            return $this->errors[] = $result;
        }
        return $result;
    }
    public function getErrors() {
        return $this->errors;
    }
}

