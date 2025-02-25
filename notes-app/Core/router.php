<?php

$routes = require base_path('routes.php');

function route_to_controller($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
    require base_path($routes[$uri]);
  } else {
    abort();
  };
}

function abort($code = 404)
{
  http_response_code($code);
  require base_path("views/{$code}.php");
  die();
};

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
route_to_controller($uri, $routes);
