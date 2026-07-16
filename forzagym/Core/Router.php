<?php
namespace Core;

class Router{
    protected $route = [];

    public function add(string $method, string $uri, string $controller){
        $this->route[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
        return $this;
    }

    public function get(string $uri, string $controller){
        return $this->add('GET', $uri, $controller);
    }
    public function post(string $uri, string $controller){
        return $this->add('POST', $uri, $controller);
    }
    public function delete(string $uri, string $controller){
        return $this->add('DELETE', $uri, $controller);
    }
    public function patch(string $uri, string $controller){
        return $this->add('PATCH', $uri, $controller);
    }
    public function put(string $uri, string $controller){
        return $this->add('PUT', $uri, $controller);
    }

    public function getRoutes(){
        return $this->route;
    }
}
