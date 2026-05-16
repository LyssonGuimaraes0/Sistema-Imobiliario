<?php

namespace app\models\imoveis;

use app\database\Database;

use PDO;

class ImoveisModels
{

    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    //====================Buscar Total de Imoveis Com Filtros=================================
    public function getTotalImoveis($query = [])
    {

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


        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //====================Buscar Dados de Imoveis Com Filtros=================================

    public function getImoveis($offset, $query, $limit)
    {

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


        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    //====================Buscar Dados de Imoveis Por ID=================================
    public function getImoveisById(int $id)
    {
        $sql = "SELECT i.nome_imovel,
        i.dimensao,
        i.estado_imovel,
        e.estado,
        e.municipio,
        e.bairro,
        e.CEP,
        v.preco,
        v.condominio,
        v.modalidade,
        c.quarto,
        c.banheiro,
        c.sala_de_estar,
        c.suite,
        c.garagem,
        c.cozinha
        FROM imovel AS i 
        LEFT JOIN endereco_imovel AS e ON i.fk_endereco = e.id
        LEFT JOIN comodos AS c ON i.id = c.fk_imovel
        LEFT JOIN valor AS v ON i.id = v.fk_imovel
        LEFT JOIN arquivos AS a ON i.id = a.fk_imovel
        LEFT JOIN tipo_imovel AS ti ON i.fk_tipo_imovel = ti.id 
        WHERE i.id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $dados = $stmt->fetch(PDO::FETCH_ASSOC);


    }

    //====================Buscar Nomes de endereços de Imoveis =================================

    public function getAddressImoveis()
    {

        //Preparação do SQL

        $sql = "SELECT 
                bairro, 
                MAX(municipio) AS municipio, 
                MAX(estado) AS estado
                FROM endereco_imovel 
                GROUP BY bairro
                ORDER BY bairro ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }
}
