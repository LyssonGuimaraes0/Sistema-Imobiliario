<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Carrega o .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Configurações Global

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');
define('PUBLIC_PATH', BASE_PATH . '/public');

