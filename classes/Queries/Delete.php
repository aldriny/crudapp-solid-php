<?php

namespace OnlineShop\Classes\Queries;

require_once 'Connection.php';
require_once 'QueryInterface.php';

use OnlineShop\Classes\Queries\QueryInterface;
use OnlineShop\Classes\Queries\Connection;


class Delete extends Connection implements QueryInterface{

    public function query($columns, $table,$value, $key){
        $conn = $this->connectDb();

        $stmt = $conn->prepare("DELETE FROM `$table` WHERE $key = :$key");
        $stmt->bindParam(":$key",$value);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }


    }
}