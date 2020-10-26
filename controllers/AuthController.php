<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        
        //returns only the view if HTTP method is get
        return $this->render('login');
    }

    public function register(Request $request)
    {   
        $this->setLayout('auth');
        $registerModel = new RegisterModel();

        if($request->isPost()){

            //loads data from super global POST to Model attributes
            $registerModel->loadData($request->getBody());


            if($registerModel->validate() && $registerModel->register()){
                return 'Success';
            }

            return $this->render('register', ['model' => $registerModel]);
        }

        //returns only the view if HTTP method is get
        return $this->render('register', ['model' => $registerModel]);
        
    }
}