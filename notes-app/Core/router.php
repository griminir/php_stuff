<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {
        return $this->addRoute('GET', $uri, $controller);
    }

    private function addRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method),
            'middleware' => null
        ];

        return $this;
    }

    public function post($uri, $controller)
    {
        return $this->addRoute('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->addRoute('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->addRoute('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->addRoute('PUT', $uri, $controller);
    }

    public function only($key)
    {

        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);

                return require base_path('Http/controllers/'.$route['controller']);
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

    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }
}
