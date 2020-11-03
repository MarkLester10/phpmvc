<?php

namespace app\controllers;

use app\core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('home');
    }

    public function about()
    {
        return $this->render('about');
    }
}
