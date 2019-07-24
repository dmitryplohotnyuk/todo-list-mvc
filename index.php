<?php

spl_autoload_register(function ($class) {
    $classFilename = __DIR__ . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR
        . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    require $classFilename;
});

define('DEFAULT_CONTROLLER', 'Home');

$controller = $_GET['view'] ?? DEFAULT_CONTROLLER;
$controller = file_exists('controllers/' . $controller . '.php') 
    ? $controller
    : DEFAULT_CONTROLLER;

include_once('controllers/' . $controller . '.php');
