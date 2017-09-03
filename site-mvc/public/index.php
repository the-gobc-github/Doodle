<?php

echo "caca";
session_start();
echo $_SERVER['SCRIPT_NAME'];
/* define('ROOT', str_replace('/doomvc/site-mvc/public/index.php','..',$_SERVER['SCRIPT_NAME'])); */
define('ROOT', str_replace('/public/index.php','..',$_SERVER['SCRIPT_NAME']));

require(ROOT . '/core/Controller/Controller.php');
//
require(ROOT . '/core/Model/Model.php');
require(ROOT . '/app/Autoloader.php');
require(ROOT . '/core/Tools/Tools.php');
echo "prout";
//
App\Autoloader::register();
//
if(isset($_GET['p'])) {
    $page = $_GET['p'];
}
else {
    $page = 'users/calendar';
}
//
$page = explode('/',$page);
$action = $page[1];
$controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
echo ' => controller creation...     ';
$controller = new $controller();
echo 'controller created !    ';
$controller->$action();

?>
