<?php
echo $_SERVER['SCRIPT_NAME'];
define('ROOT', str_replace('/public/index.php','..',$_SERVER['SCRIPT_NAME']));

require(ROOT . '/core/Controller/Controller.php');
require '../app/Autoloader.php';

App\Autoloader::register();

if(isset($_GET['p'])) {
    $page = $_GET['p'];
}

else {
    $page = 'users/home';
}

$page = explode('/',$page);
$action = $page[1];
$controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
$controller = new $controller();
$controller->$action();

?>
