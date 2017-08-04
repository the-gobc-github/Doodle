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

$db = new \App\Database('doodle_db');
$user_form = new \App\Form();
session_start();

ob_start();
if ($p === 'home')
    require '../pages/home.php';
if ($p === 'connexion')
    require '../pages/connexion.php';
if ($p === 'connexion_post')
    require '../pages/tools/connexion_post.php';
if ($p === 'inscription')
    require '../pages/inscription.php';
if ($p === 'inscription_post')
    require '../pages/tools/inscription_post.php';
if ($p === 'calendar')
    require '../pages/calendar.php';
if ($p === 'backcalendar')
    require '../pages/tools/backcalendar.php';
	

/* if ($p === 'administration') */
/*     require '../pages/administration.php'; */
/* if ($p === 'reinit') */
/*     require '../pages/reinit.php'; */
/* if ($p === 'reinit_change') */
/*     require '../pages/reinit_change.php'; */
/* if ($p === 'user') */
/*     require '../pages/user.php'; */
/* if ($p === 'single') */
/*     require '../pages/single.php'; */
$content = ob_get_clean();
require '../pages/templates/default.php';
