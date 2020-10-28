<?php

namespace app\controllers;

use app\models\User;
use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\core\Application;
use app\models\LoginForm;

class AuthController extends Controller
{

    // public function __construct()
    // {
    //     $this->Middleware(new AuthMiddleware(['profile']));
    // }

    public function login(Request $request, Response $response)
    {
        // $this->setLayout('auth');
        $loginForm = new LoginForm();

        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        return $this->render('login', ['model' => $loginForm]);
    }

    public function register(Request $request, Response $response)
    {
        // $this->setLayout('auth');
        $user = new User();

        if ($request->isPost()) {

            //loads data from super global POST to Model attributes
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                $user->login();
                Application::$app->session->setFlashMessage('success', 'Thanks For Registering');
                $response->redirect('/');
                exit;
            }
            return $this->render('register', ['model' => $user]);
        }

        //returns only the view if HTTP method is get
        return $this->render('register', ['model' => $user]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}