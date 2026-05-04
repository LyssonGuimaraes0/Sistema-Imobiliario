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



   public function getImoveis($offset,$limit){
        $conn = Database::connect();
        //Preparação do SQL
        $sql = "SELECT i.nome_imovel,
                i.dimensao,
                c.quarto,
                c.bunheiro,
                c.sala_de_estar,
                c.suit,
                v.preco
                FROM imovel AS i
                LEFT JOIN comodos AS c ON i.id = c.fk_imovel
                LEFT JOIN  valor AS v ON i.id = v.fk_imovel
                LIMIT {$limit} offset {$offset}";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    
    } 
}
