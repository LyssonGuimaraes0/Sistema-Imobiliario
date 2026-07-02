<?php

namespace app\services;

use app\models\imoveis\ImoveisModels;
use app\helpers\ImovelSanitizerHelper;
use app\services\UploadService;
use Exception;

class ImoveisService
{
    private $imoveisModels;
    private $uploadService;
    private $defaultLimit = 15;

    public function __construct()
    {
        $this->imoveisModels = new ImoveisModels;
        $this->uploadService = new UploadService;
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

    //Coleta Imoveis com limites de busca
    public function getDadosImoveisWithLimit(int $page, $query, $limit = null,)
    {

        $limit = $limit ?? $this->defaultLimit;

        unset($query['page'], $query['limit']);

        //Calcular off de consulta
        $offset = ($page - 1) * $limit;

        $dadosModel = $this->imoveisModels->getImoveis($offset, $query, $limit);

        foreach ($dadosModel as &$imovel) {
            $imovel['caminho_arquivo'] .= '/' . $imovel['nome_arquivo'];
            unset($imovel['nome_arquivo']);
        }

        return $dadosModel;
    }

    public function getImovelById(int $id)
    {

        $dadosModel = $this->imoveisModels->getImoveisById($id);

        return $dadosModel;
    }


    public function getAllDateImovelById(int $id)
    {
        //Coleta dados do Imovel
        $dadosModel = $this->imoveisModels->getImoveisById($id);

        if (!$dadosModel) {
            throw new Exception("Imóvel não encontrado.");
        }

        $dadosModel['imagens'] = $this->imoveisModels->getImagesByImovel($id);

        return $dadosModel;
    }







    //Coleta Endereço do Imovel
    public function getDadosAddressImoveis()
    {

        $dadosModel = $this->imoveisModels->getAddressImoveis();

        return $dadosModel;
    }

    //Criação de Imovel

    public function createImovel(array $dados, $file, array $infoFiles)
    {

        //Sanitizar as variaveis
        $dados = ImovelSanitizerHelper::sanitize($dados);

        //Registra Primeiros dados de imoveis
        $idImovel = $this->imoveisModels->createImovel($dados);


        if (!isset($idImovel)) {
            throw new Exception("Falha na criação de Imovel");
        }

        //Organiza Dados de imagens

        $AllDateFiles = [];

        foreach ($infoFiles as $index => $imagem) {

            $file = [
                'name' => $_FILES['imagens']['name'][$index],
                'tmp_name' => $_FILES['imagens']['tmp_name'][$index],
                'size' => $_FILES['imagens']['size'][$index]
            ];

            //Realiza upload de imoveis na pasta
            $dadosFile = $this->uploadService->upload($idImovel, $file);

            //Organiza dados em array 

            $AllDateFiles = array_merge(
                $dadosFile,
                [
                    "ordem" => $imagem['ordem'],
                    "capa" => $imagem['capa'],
                    "tipo" => "imagem",
                ]
            );

            //Armazena uma imagem de cada vez
            $idImagem = $this->imoveisModels->createFileImovel($AllDateFiles, $idImovel);

            //Verifica caso a imagem atual seja capa do Imovel
            if ($AllDateFiles['capa'] === true) {
                //Define imagem como capa
                $this->imoveisModels->updateCapaImovel($idImagem, $idImovel);
            }
        }
        return;
    }
}
