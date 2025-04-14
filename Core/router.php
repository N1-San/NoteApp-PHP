<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{

    protected $routes = [];

    public function add($method, $uri, $controller){
        $this->routes[$uri] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null,
        ];
        // dd($uri);
        return $this;
    }
    public function get($uri, $controller)
    {
        // dd($uri);
        return $this->add('GET', $uri, $controller);
        
    }
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
        
    }
    public function delete($uri, $controller)
    {
        
        // dd($uri);
        return $this->add('DELETE', $uri, $controller);

    }
    public function patch($uri, $controller)
    {

        return $this->add('PATCH', $uri, $controller);

    }
    public function put($uri, $controller)
    {

        return $this->add('PUT', $uri, $controller);
        
    }
    public function only($key){
        // dd($key);
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    
        // dd($this->routes);
    }
    public function route($uri, $method)
    {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                $middleware = new Middleware();
                $middleware->resolve($route['middleware']);


                return require base_path($route['controller']);
            }
        }
        $this->abort();
        //abort
    }
    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");
        // echo '404 Not Found';
        die();
    }

}


