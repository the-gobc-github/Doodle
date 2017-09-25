<?php

namespace App\Models;

use Core\Model\Model;
use App\App;

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
							$in = 'users';
							$userid = Model::get_where($what,$where,$value,$in);
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
