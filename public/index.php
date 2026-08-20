<?php
// require '../vendor/autoload.php';
// $routes = require '../routes/web.php';
// // use App\Controllers\HelloController;

// $url = $_SERVER['REQUEST_URI'];

// // print_r($url);
// // echo "<br>";

// if (isset($routes[$url])) {

//     // print_r($routes);
//     // echo "<br>";

//     $route = $routes[$url];

//     // print_r($route);
// //  echo "<br>";

//     $controller = $route[0];
//     $method = $route[1];

    
//     $controllername = "App\\Controllers\\" .  $controller;

//     // print_r($controllername);   
//     // echo "<br>";

//     $controller = new $controllername();
    
//     $result = $controller->$method();
//     echo $result;

// } else {
//     echo "404 - Route Not Found";
// }


require '../vendor/autoload.php';

$routes = require '../routes/web.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$route = null;
$params = [];

// Check routesx
foreach ($routes as $routePattern => $routeConfig) {
    // Convert id
    $pattern = '@^' . preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)',$routePattern ) . '$@';    
    if (preg_match($pattern, $url, $matches)) {
        $route = $routeConfig;
        array_shift($matches);
        $params = $matches;
        break;
    }
}

if ($route) {

    $controller = $route[0];
    $method = $route[1];
    $controllername = "App\\Controllers\\" . $controller;
    $controller = new $controllername();
    $result = $controller->$method(...$params);
    echo $result;
} 
else 
{
    echo " Route Not Found";
}
