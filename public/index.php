<?php

use App\Config\DotEnv;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

DotEnv::setEnvVariables();

setcookie('key', $_ENV['API_KEY'], time() + 3600 * 24 * 365 * 10, '/cinetech', '', false, false);

$router = new AltoRouter();

define('BASE_PATH', '/cinetech');

// Must set base path if the app is not at the website root
$router->setBasePath(BASE_PATH);

// Map route for homepage
$router->map('GET', '/', 'App\\Controller\\Home#index', 'homepage');

// Match current request url
$match = $router->match();

// If target is a string parse it into a class method
if (is_array($match) && is_string($match['target'])) {
    $match['target'] = explode('#', $match['target']);

    $match['target'][0] = new $match['target'][0];
}

// Call closure or throw 404 status
if(is_array($match) && is_callable( $match['target'])) {
	call_user_func_array($match['target'], $match['params']);
} else {
	// No route was matched
	header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}