<?php

namespace app\models\imoveis;

use app\database\Database;

use PDO;

class ImoveisModels
{


    public function getTotalImoveis($query = [])
    {
        $conn = Database::connect();

        // Precisamos do JOIN com endereco_imovel caso o filtro seja por municipio/estado
        $sql = "SELECT COUNT(*) AS total_imoveis 
            FROM imovel AS i
            LEFT JOIN comodos AS c ON i.id = c.fk_imovel
            LEFT JOIN valor AS v ON i.id = v.fk_imovel
            LEFT JOIN tipo_imovel AS ti ON i.fk_tipo_imovel = ti.id
            LEFT JOIN endereco_imovel AS e ON i.fk_endereco = e.id ";


        if (isset($query) && !empty($query)) {
            $contador = 1;
            $sql .= " WHERE ";
            foreach (array_keys($query) as $indice) {
                if (count($query) > $contador) {
                    $sql .= "{$indice} = '$query[$indice]' AND ";
                } else {
                    $sql .= "{$indice} = '$query[$indice]'";
                }

                $contador++;
            }
        }


        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function getImoveis($offset, $query, $limit)
    {

        $conn = Database::connect();
        //Preparação do SQL

        $sql = "SELECT i.nome_imovel,
                i.dimensao,
                c.quarto,
                c.banheiro,
                c.sala_de_estar,
                c.suite,
                v.preco
                FROM imovel AS i
                LEFT JOIN comodos AS c ON i.id = c.fk_imovel
                LEFT JOIN valor AS v ON i.id = v.fk_imovel
                LEFT JOIN tipo_imovel AS ti ON i.fk_tipo_imovel = ti.id
                LEFT JOIN endereco_imovel AS e ON i.fk_endereco = e.id ";

        if (isset($query) && !empty($query)) {
            $contador = 1;
            $sql .= " WHERE ";
            foreach (array_keys($query) as $indice) {
                if (count($query) > $contador) {
                    $sql .= "{$indice} = '$query[$indice]' AND ";
                } else {
                    $sql .= "{$indice} = '$query[$indice]'";
                }

                $contador++;
            }
        }


        $sql .= " LIMIT {$limit} offset {$offset}";


        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }
}
