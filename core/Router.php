<?php

namespace app\core;

class Router
{

  public Request $request;
  public Response $response;
  protected array $routes = [];

  public function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  // HTTP Methods

  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  public function post($path, $callback)
  {
    $this->routes['post'][$path] = $callback;
  }



  //URL Handlers

  public function resolve()
  {

    $path = $this->request->getPath();
    $method = $this->request->method();
    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      $this->response->setStatusCode(404);
      return $this->renderView("_404");
    }

    if (is_string($callback)) {
      return $this->renderView($callback);
    }

    if (is_array($callback)) {

      //creating instance of a class
      Application::$app->controller = new $callback[0]();
      $callback[0] = Application::$app->controller;
    }
    //execute a callback if a not a string
    return call_user_func($callback, $this->request, $this->response);
  }

  //render the view
  public function renderView($view, $params = [])
  {
    //render a view inside the main layout
    $layoutContent = $this->layoutContent();
    $viewContent = $this->renderOnlyView($view, $params);
    return str_replace('{{ content }}', $viewContent, $layoutContent);
  }

  protected function layoutContent()
  {
    $layout = Application::$app->layout;
    if (Application::$app->controller) {
      $layout = Application::$app->controller->layout;
    }
    //start the output caching
    ob_start();
    //output
    include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
    //returns the output instead of outputting to the browser and clears the buffer
    return ob_get_clean();
  }

  protected function renderOnlyView($view, $params)
  {
    foreach ($params as $key => $value) {
      //value of variable is evaluated as its variable name
      $$key = $value;
    }

    ob_start();
    include_once Application::$ROOT_DIR . "/views/$view.php";
    return ob_get_clean();
  }
}