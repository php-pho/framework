<?php
use Pho\Http\HttpProgram;
use function DI\autowire;

$app = require dirname(__DIR__).'/bootstrap/load.php';
$app->register(new \Pho\ServiceProvider\HttpServiceProvider(), [
    \Pho\Http\Kernel::class => autowire(App\Http\Kernel::class)->method('stacks'),
    \Pho\Routing\Router::class => autowire(App\Http\Routing::class)->method('routes'),
]);
$app->run(HttpProgram::class);
