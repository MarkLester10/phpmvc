<?php

use Dotenv\Dotenv;
use app\core\Application;
use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\ContactController;

//Current directory
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

//Home router
$app->router->get("/", [HomeController::class, 'index']);

//contact router
$app->router->get("/contact", [ContactController::class, 'show']);
$app->router->post("/contact", [ContactController::class, 'handleContact']);

//Auth router
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->post("/login", [AuthController::class, 'login']);
$app->router->get("/register", [AuthController::class, 'register']);
$app->router->post("/register", [AuthController::class, 'register']);


$app->run();