<?php
namespace App\Http\Controller;

use Pho\Http\Controller;

class BaseController extends Controller
{
    protected $data = [];

    protected function render(string $template, array $data = null, int $status = 200, array $headers = [])
    {
        if ($data === null) {
            $data = $this->data;
        }
        return parent::render($template, $data, $status, $headers);
    }
}
