<?php
// region Includes
use Env\Dotenv;
use eftec\PdoOne;
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
$pdoOne = new PdoOne("mysql",DB_HOST,DB_USER,DB_PASS,DB_NAME,""); // Set all the config vars
$pdoOne->logLevel=3; // It is for debug purpose, and it works to find problems.
$pdoOne->connect(); // Connect to the Database
// endregion

$router = new Klein();

include_once APP_ROOT . "/app/routes/web.php";

$router->dispatch();

