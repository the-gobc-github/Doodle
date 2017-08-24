<?php

namespace App\Controller;
use Core\Controller\Controller;
use App\Controller\AppController;
use App\Models\UsersModel;

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
			$ref_field = '?p=users/inscription';
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

	public function preferences() {

	if ($this->isconnected()){

		$a = $_GET['a']; #frontend action
		if (isset($_GET['a'])){
			echo ' prefs action is : ' . $a . ' ';
			$this->render('users/' . $a);
			} else {
				$this->render('users/preferences');
			}
		} else {
			$this->connexion_form();
		}

	}

	public function add_friend() {

		if ($this->isconnected()){
			echo 'add friend';
		}
	}

	public function create_group() {

		if ($this->isconnected()){
			echo 'create group';
		}
	}
	public function add_mbr() {

		if ($this->isconnected()){
			echo 'add member';
		}
	}
	public function create_event() {

		if ($this->isconnected()){
			echo 'create event';
		}
	}
	public function delete_mbr() {

		if ($this->isconnected()){
			echo 'delete mbr';
		}
	}

	public function delete_grp() {

		if ($this->isconnected()){
			echo 'delete group';
		}
	}
	public function rename_grp() {

		if ($this->isconnected()){
			echo 'rename group';
		}
	}
	public function quit_grp() {

		if ($this->isconnected()){
			echo 'quit group';
		}
	}

	public function disconnect(){
		unset($_SESSION['login']);
		$this->connexion_form();
	}


}



?>
