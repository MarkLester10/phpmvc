<?php

namespace app\controllers;

use marklester\phpmvc\Controller;

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
