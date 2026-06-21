<?php

//Definição de router

$router = [
    'GET' => [
        //Home
        '/' => web('HomeController', 'index'),
        
        //Página de Catalogo
        '/catalog' => web('CatalogController', 'index'),
        '/catalog/{id}' => web('CatalogController', 'show'),

        //Sessão de Login
        '/admin/login' => web('LoginController','index'),

        //Páginas de ADMIN
        '/admin/dashboard' => web('admin\ImoveisController','index'),
        '/admin/imoveis' => web('admin\ImoveisController','searchImovel'),
        '/admin/imoveis/create' => web('admin\ImoveisController','createImovel'),
        '/admin/imoveis/edit/{id}' => web('admin\ImoveisController','editImovel'),

        //Sessão de Chamadas API GET
        '/api/imoveis/' => api('ImoveisApiController', 'index'),
        '/api/imoveis/{id}' => api('ImoveisApiController', 'show')
    ],
    'POST' => [
        //API de Busca Login de Usuario
        '/api/auth/login' => api('AuthApiController', 'login'),

        //API de realiza logout de Usuario
        '/api/auth/logout' => api('AuthApiController', 'logout'),

        //API para registro de imovel
        '/api/imovel/create' => api('ImoveisApiController', 'create')
    ],

];




//Sistema de que separa rotas
function loadRouter(string $type, string $controller, string $action, $data = [])
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



//Função que realiza a separação de WEB e API
function web($controller, $action)
{
    return fn($data) => loadRouter('Web', $controller, $action, $data);
}

function api($controller, $action)
{
    return fn($data) => loadRouter('Api', $controller, $action, $data);
}


function findRoute($routes, $uri)
{
    foreach ($routes as $route => $callback) {


        $regex = preg_replace(
            '/\{([a-zA-Z0-9_]+)\}/',
            '([^/]+)',
            $route
        );

        $regex = "#^{$regex}$#";



        /*
        Verifica se bate
        */
        if (preg_match($regex, $uri, $matches)) {

            /*
            Remove URL completa
            */
            array_shift($matches);

            /*
            Captura nomes dos parâmetros
            */
            preg_match_all(
                '/\{([a-zA-Z0-9_]+)\}/',
                $route,
                $paramNames
            );

            $params = [];

            /*
            Junta nome + valor
            */
            foreach ($paramNames[1] as $index => $name) {
                $params[$name] = $matches[$index];

            }

            return [
                'callback' => $callback,
                'params' => $params
            ];
        }
    }

    return null;
}
