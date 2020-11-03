<?php

namespace app\core;

use app\core\middlewares\BasedMiddleware;

class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /** 
     * @var \app\core\middlewares\BasedMiddleware[] 
     * 
     */
    protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BasedMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * Get the value of middlewares
     *
     * @return  \app\core\middlewares\BasedMiddleware[]
     */
    public function getMiddlewares()
    {
        return $this->middlewares;
    }
}
