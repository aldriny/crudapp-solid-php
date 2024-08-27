<?php

namespace OnlineShop\Classes\Queries;

use Dotenv\Dotenv;
use PDO;
use PDOException;

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__. '/../../');
$dotenv->load();

class Connection {
    protected function connectDb(){
        try {
            $conn = new PDO(
                "mysql:host=" . $_ENV['DB_HOST'] . ";port=" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );
        
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        
            // echo "Connected successfully";
         
        } catch (PDOException $e) {
            error_log($e->getMessage());
            die("Connection failed: Unable to connect to the database.");
        }
    }
}

?>
