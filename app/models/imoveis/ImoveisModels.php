<?php

namespace app\models\imoveis;

use app\database\Database;

use PDO;

class ImoveisModels
{


    public function getTotalImoveis()
    {
        $conn = Database::connect();
        //Preparação do SQL
        $sql = "SELECT COUNT(*) AS total_imoveis FROM imovel";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }



    /*     public function getTotalImoveis($offset){
        $conn = Database::connect();
        //Preparação do SQL
        $sql = "SELECT * FROM imovel limit 15 offset {$offset}";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    
    } */
}
