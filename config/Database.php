<?php

namespace config;

use PDO;
use PDOException;

class Database
{
    private $host = "127.0.0.1";
    private $dbname = "student_mis";
    private $username = "rcv";
    private $password = "info@0011";

    public function connect()
    {
        try {

            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );

            $pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $pdo;

        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }
}