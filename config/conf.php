<?php

// Configurações Global

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/router.php';

// Carrega o .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


// Configurações Pastas Raiz

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');
define('PUBLIC_PATH', BASE_PATH . '/public');

// Configurações Subpasta

define('VIEW_PATH', APP_PATH . '/view');



