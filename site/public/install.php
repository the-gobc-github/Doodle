<?php


if (isset($_GET['delete'])) {
		$connection = mysqli_connect('localhost', 'root', 'root');
		if (!$connection)
		{
			die("Connection Failed".mysqli_connect_error());
		}

		$sql = "DROP DATABASE doodle_db";

		if (mysqli_query($connection, $sql))
			echo "Database successfully destroy";
		else
			echo "DataBase destruction fail ".mysqli_error($connection);
}

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
grouplist VARCHAR(200) NOT NULL,
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
eventid VARCHAR(200) NOT NULL,
groups int(6) NOT NULL
)";

if (mysqli_query($connection, $statement))
{
	echo "table days create";
	echo "\n";
}
else
{
	echo "error creating table days".mysqli_error($connection);
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
	echo "error creating table friends".mysqli_error($connection);
	echo "\n";
}

$statement = "CREATE TABLE groups(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(200) NOT NULL,
admin VARCHAR(200) NOT NULL,
members VARCHAR(200) NOT NULL,
events VARCHAR(200) NOT NULL
)";

if (mysqli_query($connection, $statement))
{
	echo "table groups created";
	echo "\n";
}
else
{
	echo "error creating table groups".mysqli_error($connection);
	echo "\n";
}

$statement = "CREATE TABLE events(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(200) NOT NULL,
startdate int(6) NOT NULL,
enddate int(6) NOT NULL
)";

if (mysqli_query($connection, $statement))
{
	echo "table groups created";
	echo "\n";
}
else
{
	echo "error creating table groups".mysqli_error($connection);
	echo "\n";
}

$statement = "INSERT INTO `users` (`id`, `login`, `password`, `email`, `cle`,
`grouplist`, `valid`) VALUES (NULL, 'a', 'a', 'a', 'a', '1,', '1'),
							(NULL, 'b', 'b', 'b', 'b', '1,', '1'),
							(NULL, 'c', 'c', 'c', 'c', '1,', '1'),
							(NULL, 'd', 'd', 'd', 'd', '1,', '1'),
							(NULL, 'e', 'e', 'e', 'e', '1,', '1'),
							(NULL, 'f', 'f', 'f', 'f', '2,', '1'),
							(NULL, 'g', 'g', 'g', 'g', '2,', '1'),
							(NULL, 'h', 'h', 'h', 'h', '2,', '1'),
							(NULL, 'i', 'i', 'i', 'i', '2,', '1'),
							(NULL, 'j', 'j', 'j', 'j', '2,', '1'),
							(NULL, 'k', 'k', 'k', 'k', '2,', '1'),
							(NULL, 'l', 'l', 'l', 'l', '2,', '1')";

if (mysqli_query($connection, $statement))
{
	echo "Users added";
	echo "\n";
}
else
{
		echo "\n";

	echo "error creating test user".mysqli_error($connection);
	echo "\n";
}


$statement = "INSERT INTO `groups` (`id`, `name`, `admin`, `members`) VALUES (NULL, 'group1', '1', '1,2,3,4,5,'), (NULL, 'group2', '6', '6,7,8,9,10,11,')";

if (mysqli_query($connection, $statement))
{
	echo "groups added";
	echo "\n";
}
else
{
	echo "\n";
	echo "error creating test groups".mysqli_error($connection);
	echo "\n";
}


mysqli_close($connection);


?>
