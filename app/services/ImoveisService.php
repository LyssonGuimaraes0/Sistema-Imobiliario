<?php

namespace app\services;

use app\models\imoveis\ImoveisModels;

class ImoveisService
{

    private $defaultLimit = 15;

    //Funções de paágina de catalogo

    //Coleta Valores para pagina de catalog
    public function getTotalPages($limit = null)
    {
        $ImoveisModels = new ImoveisModels;
        $dadosModel = $ImoveisModels->getTotalImoveis();

        $total = (int) $dadosModel[0]['total_imoveis'];
        //Limite da página catalog
        $limit = $limit ?? $this->defaultLimit;

        //Calculo de Página
        $total_pages =  ceil($total / $limit);         

        return $total_pages;
    }

    public function getDadosImoveisWithLimit(int $page, $limit = null)
    {

        $limit = $limit ?? $this->defaultLimit;

        //Calcular off de consulta
        $offset = ($page - 1) * $limit;

        $ImoveisModels = new ImoveisModels;
        $dadosModel = $ImoveisModels->getImoveis($offset,$limit);

        return $dadosModel;
    }
}
