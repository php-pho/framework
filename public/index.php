<?php

define('CONTAINER_CACHE_PATH', 'http');

use Pho\Http\HttpProgram;

require_once dirname(__DIR__) . '/bootstrap/helpers.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';

define('CONTAINER_INCLUDES', [
    dirname(__DIR__) . '/bootstrap/load.php',
    dirname(__DIR__) . '/bootstrap/http.php',
]);

require dirname(__DIR__) . '/bootstrap/app.php';

$pho_container = $app->buildContainer();
$app->run(HttpProgram::class);
