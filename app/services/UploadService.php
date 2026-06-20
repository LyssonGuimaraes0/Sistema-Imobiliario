<?php

namespace app\services;

use Exception;

class UploadService
{
    public function upload(int $idImovel, array $file)
    {

        //Verificar a extensão
        if (($extensao = $this->verifyExtension($file['name'])) === false) {
            throw new Exception('Extensão não é válida');
        }

        //Verifica se pasta existe, caso não exista cria
        $diretorio = $this->verifyDir($idImovel);

        //Altera nome do arquivo
        $newNameFile = $this->gerarCodigoImovel($idImovel, $extensao);

        $destino = "$diretorio/$newNameFile";

        //Move os arquivos para a pasta
        if (!move_uploaded_file($file['tmp_name'], $destino)) {
            throw new \Exception('Arquivo não foi pode ser salvo', 500);
        }

        $diretorioFormatado = str_replace(BASE_PATH, "", $diretorio);

        //Retorna dados de imovel
        return [
            'nome_arquivo' => $newNameFile,
            'caminho_arquivo' => $diretorioFormatado
        ];
    }

    //Verifica extenção de arquivo
    private function verifyExtension($file)
    {

        $permitidas = ['jpg', 'jpeg', 'png', 'webp'];

        //Coleta extenção para verificar
        $extensao = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if (!in_array($extensao, $permitidas)) {
            return false;
        }

        return $extensao;
    }

    private function gerarCodigoImovel($id, $extensao): string
    {
        return 'IMO-' . $id  . '-' . random_int(1000, 9999) . "." . $extensao;
    }

    //Criação de Pasta caso não exista
    private function verifyDir(int $idImovel)
    {
        //Verifica se Pasta do Imovel existe
        $diretorio = UPLOAD_PATH . "/id_$idImovel";

        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0770, true);

            return $diretorio;
        }

        return $diretorio;
    }
}
