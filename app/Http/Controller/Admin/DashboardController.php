<?php

namespace App\Http\Controller\Admin;

class DashboardController extends Controller
{
    public function index()
    {
        return $this->render('admin/dashboard.html.twig');
    }
}
