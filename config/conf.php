<?php

// Configurações Global


require_once __DIR__ . '/../vendor/autoload.php';

// Carrega o .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

require_once __DIR__ . '/../routes/router.php';
require_once 'cors.php';

// Configurações Pastas Raiz

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');
define('PUBLIC_PATH', BASE_PATH . '/public');
define('UPLOAD_PATH', BASE_PATH . '/storage/uploads/imoveis');

// Configurações Subpasta
define('VIEW_PATH', APP_PATH . '/view');
define('COMPONENTS_PATH', VIEW_PATH . '/components');
define('ASSETS_PATH', PUBLIC_PATH . '/assets');


//Caminho URL
define('BASE_URL', $_ENV['RAIZ_URL']);
define('IMAGEM_URL', '/trabalhos/imobiliaria/public/assets/images');
define('SCRIPT_URL', BASE_URL . "/public" .  '/assets/js');
define('ADMIN_URL',  BASE_URL . "/admin");




