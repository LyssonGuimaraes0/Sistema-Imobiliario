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

    //====================Criar Novo Imoveis =================================

    public function createImovel($dados)
    {
        try {
            // Inicia a transação de forma segura
            $this->conn->beginTransaction();

            //Preparação do SQL de Endereço
            $sqlEndereco = "INSERT INTO endereco_imovel (bairro, bairro_slug, municipio, estado, CEP) 
                        VALUES (:bairro, :bairro_slug, :municipio, :estado, :cep)";

            $stmtEnd = $this->conn->prepare($sqlEndereco);

            // Vinculando as variáveis do endereço
            $stmtEnd->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
            $stmtEnd->bindParam(':bairro_slug', $dados['bairro_slug'], PDO::PARAM_STR);
            $stmtEnd->bindParam(':municipio', $dados['municipio'], PDO::PARAM_STR);
            $stmtEnd->bindParam(':estado', $dados['estado'], PDO::PARAM_STR);
            $stmtEnd->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);

            $stmtEnd->execute();

            $idEndereco = $this->conn->lastInsertId();

            //Preparação do SQL de Imovel
            $sqlImovel = "INSERT INTO imovel (nome_imovel, dimensao, estado_imovel, fk_tipo_imovel, fk_endereco) 
                      VALUES (:nome, :dimensao, :estado_imovel, :fk_tipo_imovel, :fk_endereco)";

            $stmtImovel = $this->conn->prepare($sqlImovel);

            // Vinculando as variáveis do imóvel
            $stmtImovel->bindParam(':nome', $dados['nome_imovel'], PDO::PARAM_STR);
            $stmtImovel->bindParam(':dimensao', $dados['dimensao'], PDO::PARAM_STR); // ou PARAM_INT dependendo do seu banco
            $stmtImovel->bindParam(':estado_imovel', $dados['estado_imovel'], PDO::PARAM_STR);
            $stmtImovel->bindParam(':fk_tipo_imovel', $dados['fk_tipo_imovel'], PDO::PARAM_INT);
            $stmtImovel->bindParam(':fk_endereco', $idEndereco, PDO::PARAM_INT); // ID que veio do Passo 1

            $stmtImovel->execute();

            // Pega o ID gerado para o imóvel
            $idImovel = $this->conn->lastInsertId();

            //Preparação do SQL de Comodos
            $sqlComodos = "INSERT INTO comodos (quarto, banheiro, sala_de_estar, suite, garagem, cozinha, fk_imovel) 
                       VALUES (:quarto, :banheiro, :sala, :suite, :garagem, :cozinha, :fk_imovel)";

            $stmtComodos = $this->conn->prepare($sqlComodos);

            // Vinculando as variáveis dos cômodos
            $stmtComodos->bindParam(':quarto', $dados['quarto'], PDO::PARAM_INT);
            $stmtComodos->bindParam(':banheiro', $dados['banheiro'], PDO::PARAM_INT);
            $stmtComodos->bindParam(':sala', $dados['sala_de_estar'], PDO::PARAM_INT);
            $stmtComodos->bindParam(':suite', $dados['suite'], PDO::PARAM_INT);
            $stmtComodos->bindParam(':garagem', $dados['garagem'], PDO::PARAM_INT);
            $stmtComodos->bindParam(':cozinha', $dados['cozinha'], PDO::PARAM_INT);
            $stmtComodos->bindParam(':fk_imovel', $idImovel, PDO::PARAM_INT); // ID que veio do Passo 2

            $stmtComodos->execute();

            //Preparação do SQL de Valor
            $sqlValor = "INSERT INTO valor (preco, condominio, modalidade, fk_imovel) 
                     VALUES (:preco, :condominio, :modalidade, :fk_imovel)";

            $stmtValor = $this->conn->prepare($sqlValor);

            // Vinculando as variáveis de valores
            $stmtValor->bindParam(':preco', $dados['preco'], PDO::PARAM_STR); // Decimal/Float costuma entrar como STR no PDO
            $stmtValor->bindParam(':condominio', $dados['condominio'], PDO::PARAM_STR);
            $stmtValor->bindParam(':modalidade', $dados['modalidade'], PDO::PARAM_STR);
            $stmtValor->bindParam(':fk_imovel', $idImovel, PDO::PARAM_INT); // ID que veio do Passo 2

            $stmtValor->execute();

            // Se nenhuma exceção foi lançada até aqui, confirma todas as inserções
            $this->conn->commit();
            return $idImovel;
        } catch (\Exception $e) {
            // Se houver qualquer falha em qualquer tabela, desfaz o banco inteiro
            $this->conn->rollBack();
            return null;
        }
    }
}
