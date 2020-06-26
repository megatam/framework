<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../vendor/autoload.php';
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    $dotenv = [];
}
$ROUTER = new \Mezon\Router\Router();
$CONFIG = $dotenv;
$CONFIG['app_path'] = realpath(__DIR__ . '/../');
$CONFIG['cache_path'] = $CONFIG['app_path'].'/storage/cache/';
$view = new Jenssegers\Blade\Blade($CONFIG['app_path'].'/views', $CONFIG['cache_path'].'views' );


include($CONFIG['app_path'] . '/routes.php');
$html= $routerTest2->callRoute($_SERVER['REQUEST_URI']);
echo $html;
