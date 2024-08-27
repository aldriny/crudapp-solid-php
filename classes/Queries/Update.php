<?php

namespace OnlineShop\Classes\Queries;

require_once 'Connection.php';
require_once 'QueryInterface.php';

use OnlineShop\Classes\Queries\QueryInterface;
use OnlineShop\Classes\Queries\Connection;



class Update extends Connection implements QueryInterface{
private $setCondition;
    public function query($columns, $table,$values, $key){
        $conn = $this->connectDb();

        foreach($columns as $column => $columnValue){
            $this->setCondition .=  "$column = :$column, ";
        } 
        $this->setCondition = rtrim($this->setCondition, ', ');

        $stmt = $conn->prepare("UPDATE `$table` SET $this->setCondition WHERE $key = :$key");

        foreach ($columns as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }
        
        $stmt->bindValue(":$key", $values);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}