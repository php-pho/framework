<?php

namespace App\ServiceProvider;

use DI\ContainerBuilder;
use Pho\Core\ServiceProviderInterface;
use Symfony\Component\Routing\Router;
use App\Lib\Routing\UrlGenerator;

use function DI\get;
use function DI\autowire;

class WebsiteServiceProvider implements ServiceProviderInterface
{
    public function register(ContainerBuilder $containerBuilder, array $opts = [])
    {
        $def = [
        ];

        $def['url_generator'] = get(UrlGenerator::class);

        $def = array_merge($def, $opts);

        $containerBuilder->addDefinitions($def);
    }
}
