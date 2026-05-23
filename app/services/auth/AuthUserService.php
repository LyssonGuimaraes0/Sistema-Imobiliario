<?php

namespace app\services\auth;

use app\models\UserModel;
use app\services\jwt\JwtService;

class AuthUserService
{

    private $userModel;
    private $jwtService;

    public function __construct()
    {
        $this->userModel = new UserModel;
        $this->jwtService = new JwtService;
    }

    public function login(string $email, $password)
    {

        //Realiza Busca no banco de dados pelo EMAIL
        $user = $this->userModel->FindByEmail($email);

        if (!$user) {
            return null;
        }

        $password_hash = $user['password_hash'];

        //Verifica se as credencias de senhas estão certa!
        if (!password_verify($password, $password_hash)) {
            return null;
        }

        //Gera Token com JWT
        $acessToken = $this->jwtService->generate($user);

        //Gera CSRF
        $csrfToken = bin2hex(random_bytes(32));

        //Armazena JWT Token em COOKIES

        setcookie(
            'access_token',
            $acessToken,
            [
                'httponly' => true,
                'path' => '/',
                'samesite' => 'Lax'
            ]
        );

        //Armazena CSRF em COOKIES 

        setcookie(
            'csrf_token',
            $csrfToken,
            [
                'httponly' => false,
                'path' => '/',
                'samesite' => 'Lax'
            ]
        );

        return [
            'success' => true
        ];
    }

    public function logout()
    {
        // Remove Access Token
        setcookie(
            'access_token',
            '',
            [
                'expires' => time() - 3600,
                'httponly' => true,
                'path' => '/',
                'samesite' => 'Lax'
            ]
        );

        // Remove CSRF Token
        setcookie(
            'csrf_token',
            '',
            [
                'expires' => time() - 3600,
                'httponly' => false,
                'path' => '/',
                'samesite' => 'Lax'
            ]
        );

        return [
            'success' => true,
        ];
    }
}
