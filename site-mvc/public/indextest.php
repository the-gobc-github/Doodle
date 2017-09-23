<?php
echo 'go';
session_start();
if(isset($_SESSION['test'])){
	echo $_SESSION['test'];
} else{
	echo "My sessions are not working!";
} ?>
