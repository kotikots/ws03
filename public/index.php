<?php 

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../helpers.php';

use Framework\Router;
use Framework\Session; 

Session::start();

//instatiate the router
$router = new Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->route($uri);