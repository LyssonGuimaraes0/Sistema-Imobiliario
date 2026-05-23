<?php


namespace app\controllers\Api;

use app\services\auth\AuthUserService;
use app\middleware\AuthMiddleware;

class AuthApiController extends ApiController
{

    private $authService;
    private $authMiddleware;

    public function __construct()
    {
        $this->authService = new AuthUserService;
        $this->authMiddleware = new AuthMiddleware;
    }


    public function login()
    {
        //Coleta dados do Frontend
        $dados = json_decode(file_get_contents('php://input'), true);

        $email = filter_var($dados['email'], FILTER_SANITIZE_EMAIL);
        $password = $dados['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Email ou senha invalido!', 401);
            return;
        };

        $response = $this->authService->login($email, $password);

        if (!isset($response)) {
            $this->error('Email ou senha invalido!', 401);
            return;
        }

        if ($response['success'] === true) {
            return $this->success('');
        }
    }

    public function logout()
    {
        $response = $this->authService->logout();

        if ($response['success'] != true) {
            return $this->error('',401);
        }
        $this->authMiddleware->handle(); 
        return $this->success('');
    }
}
