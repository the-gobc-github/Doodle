<?php

namespace App\Models;

use Core\Model\Model;
use App\App;

/* Controlled by UsersController */
class GroupsModel extends Model{

	public function create_group() {

			if($_SESSION['log'] != NULL AND $_POST['name'] != NULL)
			{
					$login = $_SESSION['log'];
					$name = $_POST['name'];
					try {
							$what = 'UserID';
							$where = 'login';
							$value = 'a';
							$from = 'users';

							$array = array("login"=>"a");
							/* Model::get_where($array,$what,$from); */
							$userid = Model::get_where($array,$what,$from)->fetch();
							var_dump($user_id);
							/* $state = array("name"=>"X","UserID"=>1); */
							/* $res = Model::insert_into($state); */
							/* $res = $db->query('INSERT INTO users (login, password, valid) VALUES(:login, :password, :valid)', array( */
							/* 		':login' => $login, */
							/* 		':password' => $password, */
							/* 		':valid' => $valid)); */
					}
					catch(Exception $e)
					{
							echo 'prout';
							die('Erreur : '.$e->getMessage());
					}
			}

			else {
				echo 'not conform to the fields';
			}

	}
}
?>
