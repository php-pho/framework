<?php
use function DI\autowire;
use Pho\Http\HttpProgram;
use Pho\ServiceProvider\SessionServiceProvider;

$app = require dirname(__DIR__).'/bootstrap/load.php';
$app->register(new \Pho\ServiceProvider\HttpServiceProvider(), [
    \Pho\Http\Kernel::class => autowire(App\Http\Kernel::class)->method('stacks')->method('events'),
    \Pho\Routing\Router::class => autowire(App\Http\Routing::class)->method('routes'),
]);
$app->register(new SessionServiceProvider());
$app->run(HttpProgram::class);
