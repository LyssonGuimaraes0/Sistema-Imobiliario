<?php

namespace app\controllers\Api;

use app\services\ImoveisService;

class ImoveisApiController extends ApiController
{

    private $imoveisService;

    public function __construct()
    {
        $this->imoveisService = new ImoveisService;
    }

    //Coleta lista de para catalogo
    public function index($data = [])
    {

        $query = $data['query'] ?? [];
        //Filtra Input da URL é retorna 1 caso não tenha sido passado nada
        $page  = isset($query['page'])  ? (int)$query['page']  : 1;
        $limit = isset($query['limit']) ? (int)$query['limit'] : null;

        //Coleta total das Páginas
        $total_pages = $this->imoveisService->getTotalPages($query, $limit);

        //Coleta dados de imoveis
        $dados_imoveis = $this->imoveisService->getDadosImoveisWithLimit((int)$page, $query, $limit);

        //Coleta Endereços de Imoveis

        $dados_endereço = $this->imoveisService->getDadosAddressImoveis();

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

    //Mostra imovel unico

    public function show($data)
    {
        $id = (int)$data['params']['id'];

        $response = $this->imoveisService->getImovelById($id);

        if (!$response) {
            return $this->error("Registro não encontrado", 404);
        }

        return $this->success($response);
    }

    //Cria novo imovel

    public function create()
    {
      /*   header('Content-Type: application/json');*/
        
        //Dados de imoveis
        $dados = json_decode($_POST['imovel'],true);

        //Dados de Imagem
        /* $imagensInfo = json_decode($_POST['imagensInfo'],true); */

        //Arquivos de Imagens
        /* $imagens = $_FILES; */

/*         echo json_encode([
            "dados" => $dados,
            "imagensInfo" =>$imagensInfo
        ]);  */

        //Servicos para armazenamento em banco de dados
        $this->imoveisService->createImovel($dados);
    }
}
