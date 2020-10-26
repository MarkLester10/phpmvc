<?php

namespace app\controllers;
use app\core\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $params = [
            'name' => "Mark Lester"
        ];

        return $this->render('home', $params);
    }
}