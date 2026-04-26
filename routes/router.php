<?php

function loadRouter(string $controller, string $action)
{
    try {
        $controllerNameSpace = "app\\controllers\\{$controller}";

        if (!class_exists($controllerNameSpace)) {
            throw new Exception("controller não encontrado");
        }

        $controllerInstance = new $controllerNameSpace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("o metodo {$action} não existe no {$controller} não existe");
        };

        $controllerInstance->$action();

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$router = [
    'GET' => [
        '/' =>  fn() => loadRouter('HomeController', 'Home'),
    ],
    'POST' => [],

];
