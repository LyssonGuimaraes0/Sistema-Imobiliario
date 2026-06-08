<?php

namespace app\services;

class UploadService
{
    public function upload($idImovel, $file)
    {
        //Verificar a extensão
        if($this->verifyExtension($file) != true){
            return false;
        }

        //Verifica se Pasta do Imovel existe

        $diretorio = UPLOAD_PATH . "/id_$idImovel";

        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0770, true);
        }



    }

    private function verifyExtension($file)
    {

        $permitidas = ['jpg', 'jpeg', 'png', 'webp'];

        //Coleta extenção para verificar
        $extensao = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if (!in_array($extensao, $permitidas)) {
            return false;
        }

        return true;
    }
}
