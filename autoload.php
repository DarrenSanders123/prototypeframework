<?php
spl_autoload_register(function($className)
{
    $className=str_replace("\\","/",$className);

    $parts = explode('/', $className);
    $className = end($parts);

    $controller = APP_ROOT . "\\app\\classes\\controllers\\{$className}.php";
    $functions = APP_ROOT . "\\app\\classes\\functions\\{$className}.php";
    $router = APP_ROOT . "\\app\\classes\\router\\{$className}.php";
//    $controller = APP_ROOT . "\\app\\classes\\controllers\\".(empty($namespace)?"":$namespace."\\")."{$className}.php";
    if (file_exists($controller)) {
        $class = $controller;
    } elseif (file_exists($functions)) {
        $class = $functions;
    } elseif (file_exists($router)) {
        $class = $router;
    }

    include_once($class);
});
