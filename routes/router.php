<?php
//Sistema de que separa rotas
function loadRouter(string $type,string $controller, string $action, $data = [])
{
    try {
        $controllerNameSpace = "app\\controllers\\{$type}\\{$controller}";

        if (!class_exists($controllerNameSpace)) {
            throw new Exception("controller não encontrado");
        }

        $controllerInstance = new $controllerNameSpace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("o metodo {$action} não existe no {$controller} não existe");
        };


        $controllerInstance->$action($data);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

//Função que realiza a separação de WEB e
function web($controller, $action) {
    return fn($data) => loadRouter('Web', $controller, $action,$data);
}

function api($controller, $action) {
    return fn($data) => loadRouter('Api', $controller, $action, $data);
}

$router = [
    'GET' => [
        '/' => web('HomeController', 'index'),
        '/catalog' => web('CatalogController', 'index'),

        //Sessão de Chamadas API GET
        '/api/imoveis/' => api('ImoveisApiController','index')
    ],
    'POST' => [],

];
