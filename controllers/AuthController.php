<?php

namespace app\controllers;

use app\models\User;
use app\core\Request;
use app\core\Controller;
use app\core\Application;

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
        $user = new User();

        if ($request->isPost()) {

            //loads data from super global POST to Model attributes
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlashMessage('success', 'Thanks For Registering');
                Application::$app->response->redirect('/');
                exit;
            }
            return $this->render('register', ['model' => $user]);
        }

        //returns only the view if HTTP method is get
        return $this->render('register', ['model' => $user]);
    }
}