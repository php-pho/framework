<?php

use Pho\Core\Application;
use Pho\Core\ContainerBuilderFactory;

if (!is_readable($env_path = dirname(__DIR__) . '/.env')) {
    die('Please create environment file here! "' . $env_path . "\"\n");
}

$dotenv = Dotenv\Dotenv::create(dirname(__DIR__));
$dotenv->load();

error_reporting(E_ALL);

date_default_timezone_set(env("DEFAULT_TIMEZONE"));

if (!defined('CONTAINER_CACHE_PATH')) {
    define('CONTAINER_CACHE_PATH', 'default');
}

if (!defined('CONTAINER_INCLUDES')) {
    define('CONTAINER_INCLUDES', []);
}

$cachePath = container_cache_path(CONTAINER_CACHE_PATH);
$useProductionContainer = env('APP_ENV') === 'production' || env('APP_ENV') === 'staging';

if ($useProductionContainer) {
    error_reporting(0);
    @mkdir($cachePath);
    $containerBuilder = ContainerBuilderFactory::production($cachePath, $cachePath);
} elseif (env('APP_ENV') === 'testing') {
    $containerBuilder = ContainerBuilderFactory::testing();
} else {
    $containerBuilder = ContainerBuilderFactory::development();
}

$app = new Application($containerBuilder);

if (!$useProductionContainer || !is_readable(container_cache_file(CONTAINER_CACHE_PATH))) {
    foreach (CONTAINER_INCLUDES as $file) {
        include_once $file;
    }
}
