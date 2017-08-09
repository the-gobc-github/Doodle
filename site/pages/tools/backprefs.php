<?php
	session_start();
	$a = $_GET['a'];
	switch($a) {
	case 'disconnect':
		unset($_SESSION['login']);
		include('../home.php');
		break;
	}
?>
