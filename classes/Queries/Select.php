<?php

namespace OnlineShop\Classes\Queries;

require_once 'Connection.php';
require_once 'QueryInterface.php';

use OnlineShop\Classes\Queries\QueryInterface;
use OnlineShop\Classes\Queries\Connection;


class Select extends Connection implements QueryInterface
{

    public function query($columns, $table, $value, $key)
    {
        $conn = $this->connectDb();

        if (is_array($columns)) {
            $columns = implode(", ", $columns);
        }

        $sql = "SELECT $columns FROM `$table`";
        if (!empty($key) && !empty($value)) {
            $sql .= " WHERE $key = :$key";
        }

        $stmt = $conn->prepare($sql);
        if (!empty($key) && !empty($value)) {
            $stmt->bindParam(":$key", $value);
        }
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
}
