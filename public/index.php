<?php

//Current directory
require_once __DIR__ .'/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\ContactController;
use app\controllers\HomeController;
use app\core\Application;

$app = new Application(dirname(__DIR__));

//Home router
$app->router->get("/",[HomeController::class, 'index']);

//contact router
$app->router->get("/contact", [ContactController::class, 'show']);
$app->router->post("/contact",[ContactController::class, 'handleContact']);

//Auth router
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->post("/login", [AuthController::class, 'login']);
$app->router->get("/register",[AuthController::class, 'register']);
$app->router->post("/register",[AuthController::class, 'register']);


$app->run();