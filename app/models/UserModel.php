<?php

namespace app\models;

use app\database\Database;
use PDO;

class UserModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    //Encontra Usuario

    public function FindByEmail(string $email){

        $sql = "SELECT 
        id,
        nome,
        email,
        password_hash 
        FROM usuario WHERE email = :email";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); 

    }
}
