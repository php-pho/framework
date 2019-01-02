<?php
use function DI\autowire;
use Pho\ServiceProvider\HttpServiceProvider;
use Pho\ServiceProvider\SessionServiceProvider;

$app->register(new HttpServiceProvider(), [
    'kernel.class' => App\Http\Kernel::class,
    Pho\Routing\RouteLoader::class => autowire(App\Http\Router::class),
]);
$app->register(new SessionServiceProvider());
