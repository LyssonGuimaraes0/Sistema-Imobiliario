<?php

namespace app\services;

use app\models\imoveis\ImoveisModels;

class ImoveisService
{

    private $defaultLimit = 15;

    //Funções de paágina de catalogo

    //Coleta Valores para pagina de catalog
    public function getTotalPages($query, $limit = null)
    {
        $ImoveisModels = new ImoveisModels;

        // Se o limite vier 0 ou nulo, usa o padrão
        $limit = ($limit > 0) ? $limit : $this->defaultLimit;

        unset($query['page'], $query['limit']);

        $dadosModel = $ImoveisModels->getTotalImoveis($query);
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

        $ImoveisModels = new ImoveisModels;
        $dadosModel = $ImoveisModels->getImoveis($offset, $query, $limit);

        return $dadosModel;
    }
}
