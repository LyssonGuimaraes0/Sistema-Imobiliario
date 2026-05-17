<?php

namespace app\services\auth;

use app\models\UserModel;

class AuthUserService{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel;
    }

    public function login(string $email, $password){

        //Realiza Busca no banco de dados pelo EMAIL
        $user = $this->userModel->FindByEmail($email);

        if (!$user) {
            return null;
        }


        $password_hash = $user['password_hash'];

        //Verifica se as credencias de senhas estão certa!
        if(!password_verify($password, $password_hash)){
            return null;
        }

        return $user;
    }
}