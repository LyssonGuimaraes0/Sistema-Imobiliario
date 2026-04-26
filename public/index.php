<?php

require_once __DIR__ . '/../config/conf.php';

$base = "/trabalhos/imobiliaria-FA";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$request = $_SERVER['REQUEST_METHOD'];

$uri = str_replace($base, '', $uri);

if (!isset($router[$request])) {

    //futuro redirect para page 404
}

if (!array_key_exists($uri, $router[$request])) {

    //futuro redirect para page 404
}

?>

<!--Estrutura Padrão HTML-->
<!DOCTYPE html>
<html lang="pt-BR">

<?php include(VIEW_PATH . "/include/head.php") ?>

<body>
    <?php $router[$request][$uri](); ?>
</body>

</html>