<?php

namespace app\controllers\Api;

use app\models\imoveis\ImoveisModels;


class ImoveisApiController extends ApiController
{

    private $page;
    public $limite;

    //Coleta lista de para catalogo
    public function index()
    {
        //Filtra Input da URL é retorna 1 caso não tenha sido passado nada
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT) ?: 1;
        $resultado = New ImoveisModels;
        $dadosModel = $resultado->getTotalImoveis();

        $total = (int) $dadosModel[0]['total_imoveis'];

        $limite = 15;

        $dados = [
            "total_imoveis" => $total,
            "limite" => $limite,
            "total_paginas" => ceil($total / $limite)
        ];

        $this->success($dados, 200);
    }
}
