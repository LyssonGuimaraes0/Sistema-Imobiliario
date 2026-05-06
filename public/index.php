<?php

require_once __DIR__ . '/../config/conf.php';

//Realiza tratamento de URL da página
$base = "/trabalhos/imobiliaria";
//Coleta o caminho da Url
$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$request = $_SERVER['REQUEST_METHOD'];
//Coleta os parametros da URL
$queryParams = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS) ?? [];

$uri = str_replace($base, '', $uri);

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

if (!array_key_exists($uri, $router[$request])) {

    //futuro redirect para page 404
}

$router[$request][$uri]($data);

?>

<!--Estrutura Padrão HTML-->
<!DOCTYPE html>
<html lang="pt-BR">

<?php include(VIEW_PATH . "/components/head.php") ?>

</html>