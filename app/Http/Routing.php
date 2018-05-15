<?php
namespace App\Http;

use Pho\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Routing extends Router {
    private function to($controller, $method) {
        return '\\App\\Http\Controller\\'.$controller.'::'.$method;
    }

    public function routes()
    {
        $this->get('/', $this->to('Home', 'index'), 'home');
        $this->group('/admin', function($group) {
            $group->get('/', $this->to('Home', 'abc'), 'abc');
            $group->get('/xyz', $this->to('Home', 'xyz'), 'xyz');
        }, [
            '_before' => function(Request $req) {
                $req->attributes->set('ok', 'abc');
            },
            '_after' => function(Request $req, Response $res) {
                $res->headers->set('X-Length', $req->attributes->get('ok'));
                return $res;
            },
        ]);
    }
}
