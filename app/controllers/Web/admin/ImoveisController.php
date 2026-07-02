<?php

namespace app\controllers\Web\admin;

use app\controllers\Api\ApiController;
use app\middleware\AuthMiddleware;
use app\services\ImoveisService;

class ImoveisController extends ApiController
{

    private $authMiddleware;
    private $imoveisService;

    public function __construct()
    {
        $this->authMiddleware = new AuthMiddleware;
        $this->imoveisService = new ImoveisService;
    }

    //Página de dashboard

    public function index()
    {
        //Passa pela verificação de COOKIES
        $this->authMiddleware->handle();
        require_once VIEW_PATH . "/admin/dashboard.php";
    }


    public function searchImovel()
    {
        //Passa pela verificação de COOKIES
        $this->authMiddleware->handle();
        require_once VIEW_PATH . "/admin/searchImoveis.php";
    }

    // Tela formulário de criação
    public function createImovel()
    {
        //Passa pela verificação de COOKIES
        $this->authMiddleware->handle();

        require_once VIEW_PATH . "/admin/novoImovel.php";
    }

    // Tela para edição de formulario
    public function editImovel(array $parametros)
    {


        //Coleta ID OD Imovel
        $id = (int) $parametros["params"]['id'];

        //Passa pela verificação de COOKIES
        $this->authMiddleware->handle();

        //Coleta dados do backend
        $dateImovel = $this->imoveisService->getAllDateImovelById($id);

        //Separa imagens
        $imagens = $dateImovel['imagens'];

        //Define capa
        $capa = $imagens[0];
        unset($imagens[0]);

        require_once VIEW_PATH . "/admin/editImovel.php";
    }
}
