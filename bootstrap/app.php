<?php

use Pho\Core\Application;
use Pho\Core\ContainerBuilderFactory;

if (env('APP_ENV', 'dev') == 'dev') {
    $containerBuilder = ContainerBuilderFactory::development();
} else {
    $cacheDir = defined('CONTAINER_CACHE_DIR') ? CONTAINER_CACHE_DIR : 'cache/default';
    $containerBuilder = ContainerBuilderFactory::production(storage_path($cacheDir), storage_path($cacheDir));
}

$app = new Application($containerBuilder);
