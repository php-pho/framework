<?php
use function DI\autowire;
use Pho\Http\HttpProgram;
use Pho\ServiceProvider\HttpServiceProvider;
use Pho\ServiceProvider\SessionServiceProvider;

if (function_exists('tideways_xhprof_enable')) {
    tideways_xhprof_enable();
}

$app = require dirname(__DIR__).'/bootstrap/load.php';
$app->register(new HttpServiceProvider(), [
    Pho\Http\Kernel::class => autowire(App\Http\Kernel::class)->method('stacks')->method('events'),
    Pho\Routing\Router::class => autowire(App\Http\Routing::class)->method('routes'),
]);
$app->register(new SessionServiceProvider());
$app->run(HttpProgram::class);

if (function_exists('tideways_xhprof_disable')) {
    $profileData = tideways_xhprof_disable();
    file_put_contents(storage_path('cache/profiler.json'), json_encode($profileData));
}

