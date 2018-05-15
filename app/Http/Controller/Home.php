<?php
namespace App\Http\Controller;

use Pho\Http\Controller;
use Symfony\Component\HttpFoundation\Response;

class Home extends Controller {
    public function index() {
        return $this->render('test.html.twig', ['title' => 'World']);
    }

    public function abc() {
        $res = new Response('abc');
        return $res;
    }

    public function xyz()
    {
        $res = new Response('xyz');
        return $res;
    }
}
