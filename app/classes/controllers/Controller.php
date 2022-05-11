<?php
namespace DS;

use eftec\bladeone\{BladeOne};
use Exception;

class Controller
{
    //Load the views (checks for the file)

    public static function view($view, $data = [])
    {
        $views = APP_ROOT . '/app/views';
        $cache = APP_ROOT . '/app/cache';

        $blade = APP_MODE == "DEV" ? new BladeOne($views, $cache, BladeOne::MODE_DEBUG) : new BladeOne($views, $cache);

//        $blade->aliasClasses += ['Parts', 'Parts'];

        try {
            echo $blade->run($view, $data);
        } catch (Exception $e) {
            APP_MODE != 'DEV' ? dd($e) : ErrorHandling::ThrowCustom(404);
        }
    }
}
