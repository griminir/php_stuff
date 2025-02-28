<?php

session_start();

use Core\Session;

// need to use define because of the use of a function in params
define('BASE_PATH', str_replace("\\", "/", __DIR__) . '/../');


require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {

  $class = str_replace('\\', '/', $class);

  require base_path("{$class}.php");
});

require base_path('bootstrap.php');


$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// ?? = this or that
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);

Session::unFlash();
