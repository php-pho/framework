<?php
require_once dirname(__FILE__).'/helpers.php';
$autoloader = (require_once dirname(__DIR__).'/vendor/autoload.php');

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

$application = (require_once dirname(__FILE__).'/application.php');
$application->register(new Pho\ServiceProvider\LogServiceProvider(), [
    'logger.stream' => storage_path('logs/pho.log'),
]);
$application->register(new Pho\ServiceProvider\TwigServiceProvider(), [
    'twig.path' => resources_path('views'),
    'twig.options' => [
        'cache' => env('TWIG_CACHE', false) ? storage_path(env('TWIG_CACHE')) : false,
    ]
]);
$application->register(new Pho\ServiceProvider\RedisServiceProvider());
$application->register(new Pho\ServiceProvider\EloquentServiceProvider(), [
    'db.connection' => [
        'driver' => env('DB_DRIVER', 'mysql'),
        'host' => env('DB_HOST', '127.0.0.1'),
        'database' => env('DB_NAME', 'test'),
        'username' => env('DB_USER', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'charset' => env('DB_CHARSET', 'utf8mb4'),
        'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
        'prefix' => env('DB_PREFIX', null),
    ],
]);
return $application;
