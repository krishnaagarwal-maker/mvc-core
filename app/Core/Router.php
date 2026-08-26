<?php

namespace app\Core;

class Router {
private $routes = [];

public function __construct($routes)
{
    $this->routes = $routes;
}

public function patch($url){
    foreach($this->routes as $routePattern => $routeConfig){
        $pattern = '@^' . preg_replace('/\{[0-9A-Za-z]+\}/' , '([a-zA-Z0-9]+)', $routePattern) . '$@';
        if(preg_match($pattern, $url, $matches)){
            $route = $routeConfig;
            array_shift($matches);
            $params = $matches;
            
            
        $controller = $route[0];
        $method = $route[1];
        $controllername = "App\\Controllers\\" . $controller;
        $controller = new $controllername();
        return $controller->$method(...$params);
     }
    
  }
  return "404 Not Found";
}

}


?>