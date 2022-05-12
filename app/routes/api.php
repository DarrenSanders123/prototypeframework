<?php
global $router;

use DS\ErrorHandling;

$router->with('/api', function () use ($router) {
    $router->with('/v1', function () use ($router) {
        $router->with('/students', function () use ($router) {
            $router->get('/?', function () {
                return (new StudentOverviewController())->ApiGetStudents();
            });
        });
    });
});



$router->onHttpError(function ($code, $err_msg) {
    (new ErrorHandling($code))->ShowErrorScreen();
});
