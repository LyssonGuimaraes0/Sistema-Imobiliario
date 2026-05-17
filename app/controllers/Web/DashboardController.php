<?php

namespace app\controllers\Web;

use app\middleware\AuthMiddleware;

class DashboardController
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
        require_once VIEW_PATH . "/admin/dashboard.php";
    }
}
