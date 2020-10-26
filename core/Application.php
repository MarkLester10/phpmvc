<?php

namespace app\core;

//since application and router are in the same namespace, declaring namespace app\core is not needed

class Application
{

  //PHP 7.4 typed properties
  public static string $ROOT_DIR;
  public Router $router;
  public Request $request;
  public Response $response;
  public Session $session;
  public Controller $controller;
  public static Application $app;
  public Database $db;

  public function __construct($rootPath, array $config)
  {
    //singleton
    self::$ROOT_DIR = $rootPath;

    self::$app = $this;

    $this->request = new Request();

    $this->response = new Response();

    $this->session = new Session();

    $this->router = new Router($this->request, $this->response);

    $this->db = new Database($config['db']);
  }

  public function run()
  {
    echo $this->router->resolve();
  }

  public function getController()
  {
    return $this->controller;
  }
  public function setController()
  {
    return $this->controller;
  }


  //For Debugging purpose only will delete later
  public static function pd($params = [])
  {
    echo '<pre>';
    foreach ($params as $param) {
      var_dump($param);
    }
    echo '</pre>';
  }
}