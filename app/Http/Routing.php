<?php
namespace App\Http;

use Pho\Routing\Router;

class Routing extends Router {
    private function to($controller, $method) {
        return '\\App\\Http\Controller\\'.$controller.'::'.$method;
    }

    public function routes()
    {
        $this->get('/', $this->to('Home', 'index'), 'home');
    }
}
