<?php

namespace OnlineShop\Classes\Queries;

use OnlineShop\Classes\Factory;

require_once 'Select.php';
require_once 'Insert.php';
require_once 'Update.php';
require_once 'Delete.php';

class Query
{
    public function getQuery($operation,$columns, $table, $values = null, $key = null)
    {
        $queryHandler = Factory::create('Queries',$operation);
        if (!$queryHandler instanceof QueryInterface){
            throw new \Exception("Invalid query handler.");
        }
            $result = $queryHandler->query($columns, $table, $values, $key);

            return $result === false ? false : $result;
    }
}