<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\core\Application;
use app\models\ContactForm;
use app\core\middlewares\AuthMiddleware;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['contact']));
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlashMessage('success', 'Thanks for messaging. We\'ll contact you soon');
                return $response->redirect('/');
            }
        }
        return $this->render('contact', ['model' => $contact]);
    }
}