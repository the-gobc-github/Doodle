<?php


if (isset($_GET['name'])) {
		$database_name = $_GET['name'];
}
else {
		$database_name = "doodle_db";
}

// CONNECTION TEST
$connection = mysqli_connect('localhost', 'root', 'root');
if (!$connection)
{
	// exit if failed
	die("Connection Failed".mysqli_connect_error());
	echo "\n";
}

// CREATE DATABASE
$sql = "CREATE DATABASE $database_name";
if (mysqli_query($connection, $sql))
	echo "Database successfully create\n";
else
{
	echo "DataBase creation fail ".mysqli_error($connection);
	echo "\n";
}
mysqli_close($connection);

// CONNECTION TO DATABASE
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

$statement = "CREATE TABLE days(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
days int(6) NOT NULL,
userid int(6) NOT NULL,
groups int(6) NOT NULL
)";

if (mysqli_query($connection, $statement))
{
	echo "table days create";
	echo "\n";
}
else
{
	echo "error creating table user".mysqli_error($connection);
	echo "\n";
}

$statement = "CREATE TABLE friends(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
member_id int(6) NOT NULL,
friend_id int(6) NOT NULL
)";

if (mysqli_query($connection, $statement))
{
	echo "table friends created";
	echo "\n";
}
else
{
	echo "error creating table user".mysqli_error($connection);
	echo "\n";
}
mysqli_close($connection);


?>
