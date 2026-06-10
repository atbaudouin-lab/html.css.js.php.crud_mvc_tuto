<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];

define('ROOT', $root . '/testmvc/');
define('HOST', 'http://' . $host . '/testmvc/');

define('CONTROLLERS_PATH', ROOT . 'controllers/');
define('CLASSES_PATH', ROOT . 'classes/');
define('MODELS_PATH', ROOT . 'models/');
define('VIEWS_PATH', ROOT . 'views/');
define('FUNCTIONS_PATH', ROOT . 'public/functions/');
define('ASSETS_PATH', HOST . 'public/assets/');
define('CSS_PATH', ASSETS_PATH . 'css/');
define('JS_PATH', ASSETS_PATH . 'js/');
define('FONTS_PATH', ASSETS_PATH . 'fonts/');
define('IMAGES_PATH', ASSETS_PATH . 'images/');

define('COMPONENTS_PATH', ROOT . 'public/components/');
define('CONFIG_PATH', ROOT . 'config/');

