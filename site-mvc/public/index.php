<?php
session_start();
echo $_SERVER['SCRIPT_NAME'];
define('ROOT', str_replace('/doomvc/site-mvc/public/index.php','..',$_SERVER['SCRIPT_NAME']));
// define('ROOT', str_replace('/public/index.php','..',$_SERVER['SCRIPT_NAME']));

echo "==============================" . ROOT;
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

$controller = new $controller();
$controller->$action();

?>
