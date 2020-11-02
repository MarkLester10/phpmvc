<?php

namespace app\core;

//since application and router are in the same namespace, declaring namespace app\core is not needed

class Application
{

  //PHP 7.4 typed properties
  public static string $ROOT_DIR;

  public string $layout = 'main';
  public string $userClass;
  public Router $router;
  public Request $request;
  public Response $response;
  public Session $session;
  public ?Controller $controller = null;
  public static Application $app;
  public Database $db;
  public ?DBModel $user; //optional it might be null
  public View $view;

  public function __construct($rootPath, array $config)
  {

    $this->userClass = $config['userClass'];

    //singleton
    self::$ROOT_DIR = $rootPath;

    self::$app = $this;

    $this->request = new Request();
    $this->response = new Response();
    $this->session = new Session();
    $this->router = new Router($this->request, $this->response);
    $this->view = new View();

    $this->db = new Database($config['db']);

    $primaryValue = $this->session->get('user');
    if ($primaryValue) {
      $primaryKey = $this->userClass::primaryKey();
      $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
    } else {
      $this->user = null;
    }
  }

  public function run()
  {
    try {
      echo $this->router->resolve();
    } catch (\Exception $e) {
      $this->response->setStatusCode($e->getCode());
      echo $this->view->renderView('_error', ['exception' => $e]);
    }
  }

  public function getController()
  {
    return $this->controller;
  }
  public function setController()
  {
    return $this->controller;
  }


  public function login(DBModel $user)
  {
    $this->user = $user;
    $primaryKey = $user->primaryKey();
    $primaryValue = $user->{$primaryKey};
    $this->session->set('user', $primaryValue);
    return true;
  }

  public function isGuest()
  {
    return !self::$app->user;
  }

  public function logout()
  {
    $this->user = null;
    $this->session->remove('user');
  }
}