<?php

use Dotenv\Dotenv;
use marklester\phpmvc\Application;
use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\ContactController;

//Current directory
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

// $app->on(Application::EVENT_BEFORE_REQUEST, function () {
//     echo 'Before Request';
// });

//Home router
$app->router->get("/", [HomeController::class, 'index']);
$app->router->get("/about", [HomeController::class, 'about']);

//contact router
$app->router->get("/contact", [ContactController::class, 'contact']);
$app->router->post("/contact", [ContactController::class, 'contact']);

//Auth router
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->post("/login", [AuthController::class, 'login']);
$app->router->get("/register", [AuthController::class, 'register']);
$app->router->post("/register", [AuthController::class, 'register']);
$app->router->get("/logout", [AuthController::class, 'logout']);
$app->router->get("/profile", [AuthController::class, 'profile']);

//Post routes




$app->run();