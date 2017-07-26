<?php

// CREATE DATABASE

if (isset($_GET['name'])) {
		$database_name = $_GET['name'];
}
else {
		$database_name = "blog";
}

$connection = mysqli_connect('localhost', 'root', 'root');
if (!$connection)
{
	die("Connection Failed".mysqli_connect_error());
	echo "\n";
}

$sql = "CREATE DATABASE $database_name";

if (mysqli_query($connection, $sql))
	echo "Database successfully create\n";
else
{
	echo "DataBase creation fail ".mysqli_error($connection);
	echo "\n";
}

mysqli_close($connection);
$connection = mysqli_connect('localhost', 'root', 'root', $database_name);
$statement = "CREATE TABLE users(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(50) NOT NULL,
password VARCHAR(200) NOT NULL,
email VARCHAR(200) NOT NULL,
cle VARCHAR(200) NOT NULL,
valid int(6) NOT NULL
)";

if (mysqli_query($connection, $statement))
{
	echo "table users create";
	echo "\n";
}
else
{
	echo "error creating table user".mysqli_error($connection);
	echo "\n";
}

$statement = "CREATE TABLE articles (
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
photo VARCHAR(500) NOT NULL,
login VARCHAR(255) NOT NULL,
nb_like int(11) NOT NULL
)";

if (mysqli_query($connection, $statement))
{
	echo "table Produits create\n";
}
else
{
	echo "error creating table articles  ".mysqli_error($connection);
	echo "\n";
}

$statement = "CREATE TABLE comment (
`com_id` int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`photo_id` INT NOT NULL ,
`user_login` VARCHAR(255) NOT NULL ,
`content` LONGTEXT NOT NULL ,
`date_creation` DATETIME NOT NULL )";

if (mysqli_query($connection, $statement))
{
    echo "table comment create\n";
}
else
{
    echo "error creating table produit  ".mysqli_error($connection);
    echo "\n";
}

$connection = mysqli_connect('localhost', 'root', 'root', $database_name);
$statement = "CREATE TABLE like_table(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
photo_id int(11) NOT NULL,
user_login VARCHAR(200) NOT NULL
)";

if (mysqli_query($connection, $statement))
{
    echo "table like create";
    echo "\n";
}
else
{
    echo "error creating like user".mysqli_error($connection);
    echo "\n";
}

mysqli_close($connection);


?>
