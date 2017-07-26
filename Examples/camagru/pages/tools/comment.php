<?php

$id = $_GET['id'];
$comment = $_POST['comment'];
$login = $_SESSION['login'];
$date_create = date("Y-m-j H:i:s");

if (!empty($comment)) {
    $db->query('INSERT INTO comment (photo_id, user_login, content, date_creation)
     VALUES(:photo_id, :user_login, :content, :date_creation)', array(
        ':photo_id' => $id,
        ':user_login' => $login,
        ':content' => $comment,
        ':date_creation' => $date_create));

    header("Location: $_SERVER[HTTP_REFERER]");
}
else {
    $location = $_SERVER[HTTP_REFERER] . "&c=fail";
    header("Location: $location");
}


?>