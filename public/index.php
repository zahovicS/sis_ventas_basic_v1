<?php

use App\Libs\Router;
use App\Libs\Session;

session_start();
date_default_timezone_set('America/Lima');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$folderPath = dirname($_SERVER['SCRIPT_NAME']);
$urlPath = $_SERVER['REQUEST_URI'];

define('URL', substr($urlPath, strlen($folderPath)));
define('BASE_PATH',dirname(__DIR__));
define('BASE_URL',"http://localhost/mvc-base/");

require_once BASE_PATH . "/vendor/autoload.php";
require_once BASE_PATH . "/app/Helpers/functions.php";

$router = new Router;
$router->run();

Session::unflash();