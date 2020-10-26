<?php

namespace app\controllers;
use app\core\Request;
use app\core\Controller;

class ContactController extends Controller
{
    public function home()
    {

        $data = [
            'name' => "Mark Lester"
        ];

        return $this->render('home', $data);
    }
   
    public function show()
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {   
        $body = $request->getBody();
        return $this->render('contact');
    }
}