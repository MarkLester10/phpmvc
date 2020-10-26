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
  public Controller $controller;
  public static Application $app;

  public function __construct($rootPath)
  {
    //singleton
    self::$ROOT_DIR = $rootPath;

    self::$app = $this;

    $this->request = new Request();

    $this->response = new Response();

    $this->router = new Router($this->request, $this->response);
    
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
  public function debug($data){
    echo '<pre>';
      var_dump($data);
    echo '</pre>';
    exit;
  }

}