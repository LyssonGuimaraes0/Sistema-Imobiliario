<?php

require_once __DIR__ . '/../config/conf.php';

//Coleta o caminho da Url
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = $_SERVER['REQUEST_METHOD'];
//Coleta os parametros da URL
$queryParams = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS) ?? [];

$uri = str_replace(BASE_PATH, '', $uri);

//Definição de Variavel de Parametos e query

$data = [
    'params' => [],
    'query' => $queryParams
];


//=========================================

//Parametros de busca na URL


if (!isset($router[$request])) {

    //futuro redirect para page 404
}
/** @disregard */
$route = findRoute($router[$request], $uri);

if (!$route) {

    http_response_code(404);

    echo "404 Not Found";

    exit;
}


//Adiciona parâmetros encontrados

$data['params'] = $route['params'];


//Executa callback da rota encontrada
$route['callback']($data);


?>
