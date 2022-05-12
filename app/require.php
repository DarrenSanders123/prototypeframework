<?php
// region Includes
use eftec\PdoOne;
use Env\Dotenv;
use Klein\Klein;

// endregion

define('APP_ROOT', dirname(__FILE__, 2));

// region Autoloader
include "vendor/autoload.php"; // Load composer Autoloader
include "./autoload.php"; // Load custom autoloader

// endregion

// region ENV variables
(new Dotenv('.env')); // Load the .env file, and automatically set the $_ENV var to those
include_once "app/config/env_config.php"; // Load the file that declares all the $_ENV files to php Define functions
// endregion

// region Database connection
$pdoOne = new PdoOne("mysql", DB_HOST, DB_USER, DB_PASS, DB_NAME, ""); // Set all the config vars
$pdoOne->logLevel = 3; // It is for debug purpose, and it works to find problems.
$pdoOne->connect(); // Connect to the Database
// endregion

// region Routing
$router = new Klein(); // New router instance

include_once APP_ROOT . "/app/routes/web.php"; // Load all the WEB routes

include_once APP_ROOT . "/app/routes/api.php"; // Load all the API routes
// endregion

if ((new \DS\UrlFormatter())->get_parts()[0] !== 'api') { // If url isn't api load styling

    echo <<<HTML
    <script src='https://code.jquery.com/jquery-3.6.0.js' integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=' crossorigin='anonymous'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
    HTML;
}

$router->dispatch(); // run router



