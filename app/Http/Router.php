<?php
namespace App\Http;

use Pho\Routing\RouteLoader;
use Pho\Routing\Routing;

class Router extends RouteLoader
{
    private function to($controller, $method)
    {
        return '\\App\\Http\Controller\\'.$controller.'::'.$method;
    }

    public function routes(Routing $routing)
    {
        $routing->get('/', $this->to('Home', 'index'), 'home');
    }
}
