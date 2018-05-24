<?php
namespace App\Http\Controller;

use Pho\Http\Controller;

class Home extends Controller {
    public function index() {
        return $this->text('Phở ngon quá !!!');
    }
}
