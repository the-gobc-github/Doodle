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
				$datas = App::query('SELECT * FROM users WHERE
				(login = :login AND password = :password)',
				['login' => $login, 'password' => $password])->fetch();
				if ($datas[0]) {
					if($datas[6] == 1){
							$_SESSION['login'] = $login;
					} else {echo 'vous n\'avez pas valider votre compte';}
				}
				} else { echo 'login ou pwd';}
		}
}

?>
