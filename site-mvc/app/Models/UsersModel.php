<?php

namespace App\Models;

use Core\Model\Model;
use App\App;

class UsersModel extends Model{

	/* protected static $table = 'users'; */
	protected static $table;
	/* public $App = new App; */

	public function connexion(){

		if ($_POST['login'] != NULL && $_POST['password'] != NULL)		{
				$login = $_POST['login'];
		/* 		/1* $password = md5($_POST['password']); *1/ */
				$password = $_POST['password'];
				/* $datas = App::query('SELECT * FROM users WHERE */
				/* (login = :login AND password = :password)', */
				/* ['login' => $login, 'password' => $password])->fetch(); */
				/* $state = array("login" => $login, "password" => $password); */
				$state = array("login"=>"a","password"=>"a");
				$datas = Model::get_where_and($state)->fetch();
				if ($datas[0]) {
					if($datas[3] == 1){
							$_SESSION['log'] = $login;
					} else {echo 'vous n\'avez pas validé votre compte';}
				}
				} else { echo 'login ou pwd';}
		}


	/* public function inscription() { */

			/* if($_POST['login'] != NULL AND $_POST['password'] != NULL AND $_POST['password_confirm'] != NULL  AND  $_POST['password'] == $_POST['password_confirm']) */
			/* { */
			/* 		$login = $_POST['login']; */
			/* 		/1* $password = md5($_POST['password']); *1/ */
			/* 		$password = $_POST['password']; */
			/* 		$email = $_POST['email']; */
			/* 		$cle = md5(microtime(TRUE)*100000); */
			/* 		$valid = 1; */
			/* 		try { */
			/* 				$res = $db->query('INSERT INTO users (login, cle, email, password, valid) VALUES(:login, :cle, :email, :password, :valid)', array( */
			/* 						':login' => $login, */
			/* 						':password' => $password, */
			/* 						':email' => $email, */
			/* 						':cle' => $cle, */
			/* 						':valid' => $valid)); */
			/* 				include('../pages/home.php'); */
			/* 		} */
			/* 		catch(Exception $e) */
			/* 		{ */
			/* 				echo 'prout'; */
			/* 				die('Erreur : '.$e->getMessage()); */
			/* 		} */
			/* } */

			/* if($_POST['login'] == NULL) */
			/* { */
			/* 		/1* header('Location: index.php?p=inscription&c=fail&err=1'); *1/ */
			/* } */
			/* if($_POST['password'] == NULL) */
			/* { */
			/* 		/1* header('Location: index.php?p=inscription&c=fail&err=2'); *1/ */
			/* } */
			/* if($_POST['password_confirm'] == NULL) */
			/* { */
			/* 		/1* header('Location: index.php?p=inscription&c=fail&err=3'); *1/ */
			/* } */
			/* if($_POST['password'] != $_POST['password_confirm']) */
			/* { */
			/* 		/1* header('Location: index.php?p=inscription&c=fail&err=4'); *1/ */
			/* } */


	/* } */
}

?>
