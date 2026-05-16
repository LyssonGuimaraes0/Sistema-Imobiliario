<?php

namespace app\services;

use app\models\imoveis\ImoveisModels;

class ImoveisService
{
    private $imoveisModels;
    private $defaultLimit = 15;

    public function __construct(){
         $this->imoveisModels = new ImoveisModels;
    }
    //Funções de paágina de catalogo

    //Coleta Valores para pagina de catalog
    public function getTotalPages($query, $limit = null)
    {

        // Se o limite vier 0 ou nulo, usa o padrão
        $limit = ($limit > 0) ? $limit : $this->defaultLimit;

        unset($query['page'], $query['limit']);

        $dadosModel = $this->imoveisModels->getTotalImoveis($query);
        $total = (int) $dadosModel['total_imoveis'];

        $calculo = ceil($total / $limit);

        $total_pages = ($calculo > 0) ? $calculo : 1;

        $dadosPaginas = [
            'total_pages' => $total_pages,
            'total' => $total
        ];

        return $dadosPaginas;
    }

    public function getDadosImoveisWithLimit(int $page, $query, $limit = null,)
    {

        $limit = $limit ?? $this->defaultLimit;

        unset($query['page'], $query['limit']);

        //Calcular off de consulta
        $offset = ($page - 1) * $limit;

        $dadosModel = $this->imoveisModels->getImoveis($offset, $query, $limit);

        return $dadosModel;
    }

    public function getImovelById(int $id){

        $dadosModel = $this->imoveisModels->getImoveisById($id);

        return $dadosModel;
        

    }

    public function getDadosAddressImoveis()
    {

        $dadosModel = $this->imoveisModels->getAddressImoveis();

        return $dadosModel;
    }
}
