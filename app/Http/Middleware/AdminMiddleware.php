<?php

namespace App\Http\Middleware;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class AdminMiddleware
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke(Request $request)
    {
        $session = $request->getSession();
        // $session->set('test', 'quang123');
        // dd($session->get('test'));
        if ($admin_authed = $session->get('admin_authed')) {
            return null;
        }
        $url_generator = $this->container->get('url_generator');
        return new RedirectResponse($url_generator->path('admin_login'));
    }
}
