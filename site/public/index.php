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

$db = new \App\Database('blog');
$user_connect = new \App\User_function();
session_start();

ob_start();
if ($p === 'home')
    require '../pages/home.php';
if ($p === 'stickers')
    require '../pages/tools/stickers.php';
if ($p === 'logout')
    require '../pages/tools/logout.php';
if ($p === 'connexion')
    require '../pages/connexion.php';
if ($p === 'inscription')
    require '../pages/inscription.php';
if ($p === 'administration')
    require '../pages/administration.php';
if ($p === 'reinit')
    require '../pages/reinit.php';
if ($p === 'reinit_change')
    require '../pages/reinit_change.php';
if ($p === 'reinit_post')
    require '../pages/tools/reinit_post.php';
if ($p === 'admin')
    require '../pages/tools/admin.php';
if ($p === 'delete')
    require '../pages/tools/delete_pic.php';
if ($p === 'delete_com')
    require '../pages/tools/delete_com.php';
if ($p === 'comment')
    require '../pages/tools/comment.php';
if ($p === 'effect')
    require '../pages/tools/effect.php';
if ($p === 'connexion_post')
    require '../pages/tools/connexion_post.php';
if ($p === 'inscription_post')
    require '../pages/tools/inscription_post.php';
if ($p === 'validation')
    require '../pages/tools/validation.php';
if ($p === 'user')
    require '../pages/user.php';
if ($p === 'webcam')
    require '../pages/webcam.php';
if ($p === 'single')
    require '../pages/single.php';
if ($p === 'like')
    require '../pages/tools/like.php';
$content = ob_get_clean();
require '../pages/templates/default.php';
