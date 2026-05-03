<?php

require_once __DIR__ . '/../config/conf.php';


if (!isset($router[$request])) {

    //futuro redirect para page 404
}

if (!array_key_exists($uri, $router[$request])) {

    //futuro redirect para page 404
}

$router[$request][$uri]();

?>

<!--Estrutura Padrão HTML-->
<!DOCTYPE html>
<html lang="pt-BR">

<?php include(VIEW_PATH . "/include/head.php") ?>

</html>