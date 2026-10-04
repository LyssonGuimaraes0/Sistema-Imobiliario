<?php

namespace app\controllers\Web;

use app\controllers\Api\ApiController;
use app\services\ImoveisService;

class ImoveisController extends ApiController
{
    private $imoveisService;

    public function __construct()
    {
        $this->imoveisService = new ImoveisService;
    }

    //Página do Imovel

    public function index($id)
    {
        //Coleta id e converta
        $id = (int) $id['params']['id'];

        $imovel = $this->imoveisService->getAllDateImovelById($id);

        //Separa imagens
        $imagens = $imovel['imagens'];

        //Define capa
        $capa = $imagens[0];
        unset($imagens[0]);

        //Separa Atributos de Imoveis
        $componentes = [
            'Quarto' => $imovel['quarto'],
            'Banheiro' => $imovel['banheiro'],
            'Sala de estar' => $imovel['sala_de_estar'],
            'Cozinha' => $imovel['cozinha'],
            'Suite' => $imovel['suite'],
            'Garagem' => $imovel['garagem'],
        ];

        require_once VIEW_PATH . "/imovel/imovel.php";
    }
}
