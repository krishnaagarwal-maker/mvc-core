<?php
namespace App\models;
use config\Database;
use PDO;
class Models
{
    protected PDO $db;
    public function __construct(){
        $database = new Database();
        $this->db = $database->connect();
        
        
    }
}