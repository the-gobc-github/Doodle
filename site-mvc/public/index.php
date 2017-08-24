<?php
session_start();
echo $_SERVER['SCRIPT_NAME'];
/* define('ROOT', str_replace('/doodlemvc2/site-mvc/public/index.php','..',$_SERVER['SCRIPT_NAME'])); */
define('ROOT', str_replace('/public/index.php','..',$_SERVER['SCRIPT_NAME']));

require(ROOT . '/core/Controller/Controller.php');
require(ROOT . '/core/Model/Model.php');
require '../app/Autoloader.php';
require '../core/Tools/Tools.php';

App\Autoloader::register();

if(isset($_GET['p'])) {
    $page = $_GET['p'];
}
else {
    $page = 'users/calendar';
}


$page = explode('/',$page);
$action = $page[1];
$controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
$tools = new Tools;

echo 'ok';
$controller = new $controller();
echo 'ok';
$controller->$action();

?>
