<?php

namespace app\controllers\Web\admin;

use app\middleware\AuthMiddleware;

class ImoveisController
{

    private $authMiddleware;

    public function __construct()
    {
        $this->authMiddleware = new AuthMiddleware;
    }


    public function index()
    {
        //Passa pela verificação de COOKIES
        $this->authMiddleware->handle();
        require_once VIEW_PATH . "/admin/imoveis.php";
    }

    // Tela formulário de criação
    public function create()
    {
        //Passa pela verificação de COOKIES
        $this->authMiddleware->handle();
        require_once VIEW_PATH . "/admin/novoImovel.php";
    }
}
