<?php

require '../app/Autoloader.php';
App\Autoloader::register();

if(isset($_GET['p'])) {
    $p = $_GET['p'];
}


else {
    $p = 'home';
}

// Init object
#implement include functions here
$db = new \App\Database('doodle_db');
$user_form = new \App\Form();
$date = new \App\Date();

session_start();

ob_start();
if ($p === 'home')
    require '../pages/home.php';
if ($p === 'backform')
    require '../pages/tools/backform.php';
if ($p === 'calendar')
    require '../pages/calendar3.php';
if ($p === 'backcalendar')
    require '../pages/tools/backcalendar.php';
if ($p == 'preferences')
	require '../pages/preferences.php';
$content = ob_get_clean();
require '../pages/templates/default.php';
