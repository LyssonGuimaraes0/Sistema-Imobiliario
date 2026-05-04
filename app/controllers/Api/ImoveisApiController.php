<?php

namespace app\controllers\Api;

use app\services\ImoveisService;

class ImoveisApiController extends ApiController
{



    //Coleta lista de para catalogo
    public function index()
    {
        //Filtra Input da URL é retorna 1 caso não tenha sido passado nada
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT) ?: 1;
        $limit = filter_input(INPUT_GET, 'limit', FILTER_SANITIZE_NUMBER_INT)?: NULL;
        $ImoveisService = new ImoveisService;

        //Coleta total das Páginas
        $total_pages = $ImoveisService->getTotalPages($limit);

        //Coleta dados de imoveis
        $dados_imoveis = $ImoveisService->getDadosImoveisWithLimit((int)$page, $limit);

        $response = [
             'pagination' => [
                    'page' => (int) $page,
                    'limit' => (int) $limit,
                    'total_paginas' => $total_pages
                ],
            'data' => $dados_imoveis
        ];

      $this->success($response, 200); 
    }
}
