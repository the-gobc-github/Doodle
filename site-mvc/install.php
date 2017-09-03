<?php


if (isset($_GET['delete'])) {
		$connection = mysqli_connect('localhost', 'root', 'root');
		if (!$connection)
		{
			die("Connection Failed".mysqli_connect_error());
		}

		$sql = "DROP DATABASE doodle_db";

		if (mysqli_query($connection, $sql))
			echo "Database successfully destroy\n";
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
	echo "    Database successfully create\n";
else
{
	echo "       DataBase creation fail ".mysqli_error($connection);
	echo "\n";
}
mysqli_close($connection);

// CONNECTION TO DATABASE
$connection = mysqli_connect('localhost', 'root', 'root', $database_name);
$statement = "CREATE TABLE users(
UserID int(6) AUTO_INCREMENT PRIMARY KEY,
password VARCHAR(200) NOT NULL,
login VARCHAR(50) NOT NULL,
valid int(6) default 1
);";

if (mysqli_query($connection, $statement))
		echo "      TABLE USER CREAte";
else
		echo "      error creating table user".mysqli_error($connection);

$statement = "INSERT INTO `users` (`UserID`, `login`, `password`) VALUES (NULL, 'a','a'), (NULL, 'b','b')
,(NULL, 'c','c'), (NULL, 'd','d'),(NULL, 'e','e'), (NULL, 'f','f');";

if (mysqli_query($connection, $statement))
		echo "      User ADDED";
else
		echo "       error adding User".mysqli_error($connection);



$statement = "CREATE TABLE groups (
    ID int(6)  AUTO_INCREMENT PRIMARY KEY,
		GroupID int(6) NOT NULL ,
    UserID int(6) NOT NULL,
		CONSTRAINT fk_UserID
			FOREIGN KEY (UserID)
			REFERENCES users(UserID)
			ON DELETE CASCADE
);";

if (mysqli_query($connection, $statement))
		echo "       TABLE groups CREAte";
else
		echo "        error creating table groups".mysqli_error($connection);


$statement = "INSERT INTO `groups` (`GroupID`, `UserID`) VALUES ('1', '1'), ('1', '2'),('2', '3'), ('2', '4');";

if (mysqli_query($connection, $statement))
	echo "        Groups ADDED";
else
	echo "         error adding groups".mysqli_error($connection);

$statement = "CREATE TABLE events (
    ID int(6)  AUTO_INCREMENT PRIMARY KEY,
		EventID int(6) NOT NULL,
    GroupID int(6) NOT NULL);";

if (mysqli_query($connection, $statement))
		echo "       TABLE event CREAte";
else
		echo "        error creating table event".mysqli_error($connection);

$statement = "ALTER TABLE events
	ADD CONSTRAINT fk_groupid
	FOREIGN KEY (GroupID)
	REFERENCES groups(ID)
	ON DELETE CASCADE";

if (mysqli_query($connection, $statement))
		echo "       TABLE adding CONSTRAINT";
else
		echo "        error adding CONSTRAINT".mysqli_error($connection);
?>
