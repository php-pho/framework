<?php
use Pho\Core\Application;
use Pho\Core\ContainerBuilderFactory;

if (env('APP_ENV', 'dev') == 'dev') {
    $containerBuilder = ContainerBuilderFactory::development();
} else {
    $containerBuilder = ContainerBuilderFactory::production(true, false, storage_path('cache'), storage_path('cache'));
}

$app = new Application($containerBuilder);
return $app;
