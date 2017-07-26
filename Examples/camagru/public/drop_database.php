<?php

$database_name = $_GET['name'];

$connection = mysqli_connect('localhost', 'root', 'root');
if (!$connection)
{
	die("Connection Failed".mysqli_connect_error());
}

$sql = "DROP DATABASE IF EXISTS $database_name";

if (mysqli_query($connection, $sql))
	echo "Database successfully destroy";
else
	echo "DataBase destruction fail ".mysqli_error($connection);

 ?>
