<?php
global $router;

use DS\ErrorHandling;

$router->respond('GET', '/?', function () {
    return 'INDEX!';
});

$router->respond('/error', function () {
    Controller::view('error');
})->setName('error');

$router->onHttpError(function ($code, $err_msg) {
    (new ErrorHandling($code))->ShowErrorScreen();
});
