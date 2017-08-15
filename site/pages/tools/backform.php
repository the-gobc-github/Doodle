<?php
session_start();
ini_set('display_errors','on');
error_reporting(E_ALL);
$a = $_GET['a'];

switch ($a) {
    case 'connexion':
		if ($_POST['login'] != NULL && $_POST['password'] != NULL)		{
				$login = $_POST['login'];
				/* $password = md5($_POST['password']); */
				$password = $_POST['password'];
				$datas = $db->query('SELECT * FROM users WHERE
				(login = :login AND password = :password)',
				['login' => $login, 'password' => $password])->fetch();
				if ($datas[0]) {
					if($datas[6] == 1){
							$_SESSION['login'] = $login;
							include('../pages/calendar.php');
					}
					else {
								include('../pages/home.php');
								echo 'for the moment the connexion does not require mail confirmation - this means you have succesfully confirmed your email';
					}

				}
				else {
						include('../pages/home.php');
						echo 'not registered';
				}
			}
        break;

		case 'inscription':

			if($_POST['login'] != NULL AND $_POST['password'] != NULL AND $_POST['password_confirm'] != NULL  AND  $_POST['password'] == $_POST['password_confirm'])
			{
					$login = $_POST['login'];
					/* $password = md5($_POST['password']); */
					$password = $_POST['password'];
					$email = $_POST['email'];
					$cle = md5(microtime(TRUE)*100000);
					$valid = 1;
					try {
							$res = $db->query('INSERT INTO users (login, cle, email, password, valid) VALUES(:login, :cle, :email, :password, :valid)', array(
									':login' => $login,
									':password' => $password,
									':email' => $email,
									':cle' => $cle,
									':valid' => $valid));
							include('../pages/home.php');
					}
					catch(Exception $e)
					{
							echo 'prout';
							die('Erreur : '.$e->getMessage());
					}
			}

			if($_POST['login'] == NULL)
			{
					/* header('Location: index.php?p=inscription&c=fail&err=1'); */
			}
			if($_POST['password'] == NULL)
			{
					/* header('Location: index.php?p=inscription&c=fail&err=2'); */
			}
			if($_POST['password_confirm'] == NULL)
			{
					/* header('Location: index.php?p=inscription&c=fail&err=3'); */
			}
			if($_POST['password'] != $_POST['password_confirm'])
			{
					/* header('Location: index.php?p=inscription&c=fail&err=4'); */
			}
						break;

		case 'send_verif':
			//to implement
						break;

		case 'confirm_reinit':
			//to implement
						break;
}
?>
