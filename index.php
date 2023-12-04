<?php

// Autoload classes using Composer's autoload
require_once 'vendor/autoload.php';

// Initialize the application
$app = new Application();

// Define your routes
$routes = [
    '/' => 'HomeController@index',
    '/user/register' => 'UserController@register',
    '/user/login' => 'UserController@login',
    '/dashboard' => 'DashboardController@index',
    // Add more routes for other features
];

// Process the requested URL
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Find the corresponding controller and method based on the requested URL
if (array_key_exists($requestUri, $routes)) {
    list($controllerName, $methodName) = explode('@', $routes[$requestUri]);
    $controller = new $controllerName();
    $controller->$methodName();
} else {
    // Handle 404 Not Found
    echo "404 Not Found";
}

?>
