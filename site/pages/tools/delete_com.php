<?php
$path = $_GET['id'];
$statement = "DELETE FROM `comment` WHERE `com_id`='$path'";
$db->simple_query($statement);
$location = $_SERVER[HTTP_REFERER] . "&c=success";
header("Location: $location");

?>