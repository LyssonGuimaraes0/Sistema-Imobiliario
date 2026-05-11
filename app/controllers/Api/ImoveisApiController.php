<?php

namespace app\controllers\Api;

use app\services\ImoveisService;

class ImoveisApiController extends ApiController
{



    //Coleta lista de para catalogo
    public function index($data = [])
    {

        $query = $data['query'] ?? [];
        //Filtra Input da URL é retorna 1 caso não tenha sido passado nada
        $page  = isset($query['page'])  ? (int)$query['page']  : 1;
        $limit = isset($query['limit']) ? (int)$query['limit'] : null;
        $ImoveisService = new ImoveisService;

        //Coleta total das Páginas
        $total_pages = $ImoveisService->getTotalPages($query,$limit);

        //Coleta dados de imoveis
        $dados_imoveis = $ImoveisService->getDadosImoveisWithLimit((int)$page,$query,$limit);

        //Coleta Endereços de Imoveis

        $dados_endereço = $ImoveisService->getDadosAddressImoveis();

        $response = [
            'pagination' => [
                'page' => (int) $page,
                'limit' => (int) $limit,
                'total_registros' => $total_pages['total'],
                'total_paginas' => $total_pages['total_pages']
            ],
            'address_to_list' => $dados_endereço,
            'data' => $dados_imoveis
        ];

        $this->success($response, 200);
    }
}
