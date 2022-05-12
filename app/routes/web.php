<?php
global $router;

use DS\ErrorHandling;

$router->respond('GET', '/?', function () {
    return 'INDEX!';
});

$router->with('/students', function () use ($router) {
    $router->get('/?', function () {
        (new StudentOverviewController())->index();
    });
});

$router->onHttpError(function ($code, $err_msg) {
    (new ErrorHandling($code))->ShowErrorScreen();
});
