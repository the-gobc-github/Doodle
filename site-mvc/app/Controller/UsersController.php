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
			$pwd_fied = 'password';
			$this->render('users/connexion',compact('name_field','pwd_field'));
		}
	}


	public function inscription_form(){

		if ($this->isconnected()){
			$this->render('users/calendar');
		} else {
			$name_field	= 'login';
			$pwd_fied = 'email';
			$pwd_fied = 'password';
			$pwd_fied = 'password_confirm';
			$this->render('users/inscription',compact('name_field','email_field','pwd_field','pwd_conf_field'));
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

	}


}



?>
