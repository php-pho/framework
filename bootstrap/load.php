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
]);
$application->register(new Pho\ServiceProvider\RedisServiceProvider());
$application->register(new Pho\ServiceProvider\EloquentServiceProvider(), [
    'db.connection' => [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'database' => 'ezweb_website',
        'username' => 'root',
        'password' => 'passwd',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => null,
    ],
]);
return $application;
