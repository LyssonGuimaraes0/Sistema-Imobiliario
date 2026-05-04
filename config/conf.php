<?php

// Configurações Global

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/router.php';

// Carrega o .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

//Realiza tratamento de URL da página
$base = "/trabalhos/imobiliaria";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$request = $_SERVER['REQUEST_METHOD'];

$uri = str_replace($base, '', $uri);

//=========================================


// Configurações Pastas Raiz

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');
define('PUBLIC_PATH', BASE_PATH . '/public');

// Configurações Subpasta

define('VIEW_PATH', APP_PATH . '/view');
define('COMPONENTS_PATH', VIEW_PATH . '/components');
define('ASSETS_PATH', PUBLIC_PATH . '/assets');

//Caminho URL
define('BASE_URL', '/trabalhos/imobiliaria/public');
define('IMAGEM_URL', '/trabalhos/imobiliaria/public/assets/images');



