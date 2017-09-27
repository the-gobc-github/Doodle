<?php

namespace App\Controller;
use Core\Controller\Controller;
use App\Controller\AppController;
use App\Models\UsersModel;
use App\Models\GroupsModel;

class UsersController extends AppController{
/* class UsersController { */

	public function calendar(){
		#This should be in CalendarController
		if ($this->isconnected()) {
			$this->render('users/calendar');
		}
		else {
			$this->connexion_form();
		}
	}

	public function connexion_form(){

		if ($this->isconnected()){
			$this->render('users/calendar');
		} else {
			$name_field	= 'login';
			$pwd_field = 'password';
			$ref_field = '?p=users/inscription_form';
			$text_field = 'Inscris toi !';
			$this->render_form('users/connexion',compact('name_field','pwd_field'),compact('ref_field','text_field'));
		}
	}


	public function inscription_form(){

		if ($this->isconnected()){
			$this->render('users/calendar');
		} else {
			$name_field	= 'login';
			$email_field = 'email';
			$pwd_field = 'password';
			$pwd_conf_field = 'password_confirm';
			$this->render_form('users/inscription',compact('name_field','email_field','pwd_field','pwd_conf_field'));
		}
	}

	public function connexion(){

		$model = new UsersModel();

		echo 'connexion';
		$model->connexion();
		if ($this->isconnected()){
			$this->render('users/calendar');
		} else {

			$this->connexion_form();
		}
	}

	public function inscription(){

		$model = new UsersModel();
		$model->inscription();

		if ($this->isconnected()){
			$this->render('users/calendar');
		} else {
			$this->inscription_form();
		}
	}

	//PREFERENCES
	public function preferences() {

	if ($this->isconnected()){
		$a = $_GET['a']; #frontend action
		if (isset($_GET['a'])){
			$this->render('users/' . $a);
			} else {
				$this->render('users/preferences');
			}
		} else {

			$this->connexion_form();
		}

	}

	//*************** FRIENDS ***************
	//
	//ADD FRIEND
	public function add_friend_form() {

		if ($this->isconnected()){
			$this->render('users/calendar');
		} else {
			$name_field	= 'login';
			$this->render_form('users/add_friend',compact('name_field'));
		}

	}

	public function add_friend(){

		$model = new UsersModel();
		$model->add_friend();

		if ($this->isconnected()){
			$this->render('users/preferences');
		} else {
			$this->connexion_form();
		}
	}

	public function delete_friend_form() {

		if ($this->isconnected()){
			$this->render('users/preferences');
		} else {
			$name_field	= 'login';
			$this->render_form('users/delete_friend',compact('name_field'));
		}
	}

	public function delete_friend(){

		$model = new UsersModel();
		$model->inscription();

		if ($this->isconnected()){
			$this->render('users/calendar');
		} else {
			$this->inscription_form();
		}
	}


	//*************** GROUPS ***************
	//
	//CREATE GROUP
	public function create_group_form() {

		if ($this->isconnected()){
			$name_field	= 'name';
			$this->render_form('users/create_group',compact('name_field'));
		} else {
			$this->render('users/connexion_form');
			}

	}
	public function create_group() {

		$model = new GroupsModel();
		$model->create_group();

		if ($this->isconnected()){
			$this->render('users/preferences');
		} else {
			$this->inscription_form();
		}
	}

	//INVITE FRIEND IN GROUP
	public function group_invite_form() {

		if ($this->isconnected()){
			$name_field	= 'friendname';
			$group_field	= 'groupname';
			$this->render_form('users/group_invite',compact('name_field','group_field'));
		} else {
			$this->render('users/connexion_form');
			}
	}
	public function group_invite() {

		$model = new GroupsModel();
		$model->group_invite();

		if ($this->isconnected()){
			$this->render('users/preferences');
		} else {
			$this->inscription_form();
		}
	}

	/* //CREATE EVENT */
	public function create_event_form() {

		if ($this->isconnected()){
			$name_field	= 'title';
			$group_field = 'name';
			$start_field = 'start';
			$end_field = 'end';
			$this->render_form('users/create_event',compact('name_field','group_field','start_field','end_field'));
		} else {
			$this->render('users/connexion_form');
			}
	}
	public function create_event() {

		if ($this->isconnected()){
			echo 'create event';
		}
	}

	//DELETE MEMBER
	public function delete_mbr_form() {

		if ($this->isconnected()){
			$name_field	= 'friendname';
			$group_field = 'groupname';
			$this->render_form('users/delete_mbr',compact('group_field','name_field'));
		} else {
			$this->render('users/connexion_form');
			}
	}
	public function delete_mbr() {

		echo 'delete member';

	}

	//DELETE GROUP
	public function delete_grp_form() {

		if ($this->isconnected()){
			$name_field	= 'groupname';
			$this->render_form('users/delete_grp',compact('name_field'));
		} else {
			$this->render('users/connexion_form');
			}

	}
	public function delete_grp() {

		echo 'delete group';
	}

	//RENAME GROUP
	public function rename_grp_form() {

		if ($this->isconnected()){
			$name_field	= 'name';
			$new_name_field	= 'new_name';
			//need to parse new_login
			$this->render_form('users/rename_grp',compact('name_field','new_name_field'));
		} else {
			$this->render('users/connexion_form');
			}
	}
	public function rename_grp() {
		echo 'rename group';
	}

	//QUIT GROUP
	public function quit_grp_form() {

		if ($this->isconnected()){
			$name_field	= 'groupname';
			$this->render_form('users/quit_grp',compact('name_field'));
		} else {
			$this->render('users/connexion_form');
			}
	}
	public function quit_grp() {
		echo 'quit group';
	}


	//DISCONNECT
	public function disconnect(){
		#FIX IT
		session_destroy();
		session_start();
		$this->connexion_form();
	}


}



?>
