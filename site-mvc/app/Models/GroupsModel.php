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

					$what = 'UserID';
					$value = 'a';//$login
					$from = 'users';//$Model
					$array = array("login"=>"a");
					$userid = Model::get_where($array,$what,$from)->fetch();
					$state = array("name"=>"X","UserID"=>1);
					try {
							$res = Model::insert_into($state);
					}
					catch(Exception $e)
					{
							die('Erreur : '.$e->getMessage());
					}
			}

			else {
				echo 'not conform to the fields';
			}

	}

	public function group_invite() {

			if($_SESSION['log'] != NULL AND $_POST['friendname'] != NULL AND $_POST['groupname'] != NULL)
			{
					$login = $_SESSION['log'];
					$friendname = $_POST['friendname'];
					$groupname = $_POST['groupname'];

					//GET USER AND FRIEND IDs
					$what = 'UserID';
					$from = 'users';//Model
					$userarray = array("login"=>"a");//$login
					$friendarray = array("login"=>"c");//$friendname
					$userid = Model::get_where($userarray,$what,$from)->fetch();
					$friendid = Model::get_where($friendarray,$what,$from)->fetch();

					//GET THE GROUP - IF EMPTY REQUEST THEN STOP INVITATION
					$state = array("UserID"=>1,"name"=>"first");//$userid and $groupname
					$grouparray = Model::get_where_and($state)->fetch();
					if ($grouparray) {//if grouparray is not empty
					/* 	//GET GROUP ID */
						$groupid = $grouparray['GroupID'];
						$state = array("name"=>"first","UserID"=>3,"GroupID"=>0);//$groupname and $friendid and $groupid
						try {
							$res = Model::insert_into($state);
						}
						catch(Exception $e)
						{
								echo 'prout';
								die('Erreur : '.$e->getMessage());
						}
					}

			} else {
				echo 'not conform to the fields';
			}

	}
}
?>
