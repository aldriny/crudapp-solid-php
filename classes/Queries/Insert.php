<?php

namespace OnlineShop\Classes\Queries;

require_once 'Connection.php';
require_once 'QueryInterface.php';

use OnlineShop\Classes\Queries\QueryInterface;
use OnlineShop\Classes\Queries\Connection;


class Insert extends Connection implements QueryInterface{

    public function query($columns, $table,$values, $key){
        $conn = $this->connectDb();


        $columnNames = implode(',', $columns);
        $placeHolders = ':' . implode(', :', $columns);

        $stmt = $conn->prepare("INSERT INTO `$table` ($columnNames) VALUES ($placeHolders)");

        foreach ($columns as $index => $column) {
            $stmt->bindParam(":$column", $values[$index]);
        }
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}