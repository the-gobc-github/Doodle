<?php

if(isset($_SESSION['login']))
{
    $path = $_GET['pic'];
    $id = $_GET['id'];

    $statement = "DELETE FROM `comment` WHERE `photo_id`='$id'";
    $db->simple_query($statement);
    $statement = "DELETE FROM `like_table` WHERE `photo_id`='$id'";
    $db->simple_query($statement);
    $statement = "DELETE FROM `articles` WHERE `photo`='$path'";
    $db->simple_query($statement);
    unlink($path);
    header('Location: index.php?p=user&c=success');
}
else {
    header('Location: index.php?p=user&c=fail');
}


?>