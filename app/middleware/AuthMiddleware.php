<?php

namespace app\middleware;

use app\services\jwt\JwtService;

class AuthMiddleware
{

    private $jwtService;

    public function __construct()
    {
        $this->jwtService = new JwtService;
    }

    public function handle()
    {
        if (!isset($_COOKIE['access_token'])) {
            header(
                'Location: ' . BASE_URL .'/admin/login'
            );

            exit;
        }

        $user = $this->jwtService->validate(
            $_COOKIE['access_token']
        );

        if (!$user) {
            header(
                'Location: ' . BASE_URL .'/admin/login'
            );

            exit;
        }

        return;
    }
}
