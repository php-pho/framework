<?php

use Pho\ServiceProvider\ConsoleServiceProvider;
use Pho\Console\ConsoleKernel;
use App\Console\Kernel;
use function DI\autowire;

$app->register(new ConsoleServiceProvider(), [
    ConsoleKernel::class => autowire(Kernel::class)->method('commands'),
]);
