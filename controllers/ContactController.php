<?php

namespace app\controllers;

use marklester\phpmvc\Request;
use marklester\phpmvc\Response;
use marklester\phpmvc\Controller;
use marklester\phpmvc\Application;
use app\models\ContactForm;
use marklester\phpmvc\middlewares\AuthMiddleware;

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
