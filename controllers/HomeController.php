<?php

namespace app\controllers;

use marklester\phpmvc\Controller;
use marklester\phpmvc\db\Pagination;

class HomeController extends Controller
{
    public function index()
    {
        $pagination = new Pagination('users', 2, ['isAdmin' => 0]);
        $users = $pagination->findAndPaginate();
        $pages  = $pagination->get_pagination_number();

        return $this->render('home', ['data' => $users, 'pages' => $pages]);
    }

    public function about()
    {
        return $this->render('about');
    }
}