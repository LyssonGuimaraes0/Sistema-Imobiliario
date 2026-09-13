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

        require_once VIEW_PATH . "/imovel.php";
    }
}
