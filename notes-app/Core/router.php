<?php

namespace Core;

class Router
{
  protected $routes = [];

  private function addRoute($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => strtoupper($method)
    ];
  }

  public function get($uri, $controller)
  {
    $this->addRoute('GET', $uri, $controller);
  }

  public function post($uri, $controller)
  {
    $this->addRoute('POST', $uri, $controller);
  }

  public function delete($uri, $controller)
  {
    $this->addRoute('DELETE', $uri, $controller);
  }

  public function patch($uri, $controller)
  {
    $this->addRoute('PATCH', $uri, $controller);
  }

  public function put($uri, $controller)
  {
    $this->addRoute('PUT', $uri, $controller);
  }

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        return require base_path($route['controller']);
      }
    }

    $this->abort();
  }

  protected function abort($code = 404)
  {
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
  }
}
