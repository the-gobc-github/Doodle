<?php

namespace App\Controller;
use Core\Controller\Controller;
use App\Controller\AppController;
use App\Models\UsersModel;

class UsersController extends AppController{
/* class UsersController { */

	public function home(){
		#This should be in CalendarController
		if ($this->isconnected()) {
			$this->render('users/home');
		}
		else {
			$this->connexion_form();
		}
	}

	public function connexion_form(){

		if ($this->isconnected()){
			$this->render('users/home');
		} else {
			$name_field	= 'login';
			$pwd_fied = 'password';
			$this->render('users/connexion',compact('name_field','pwd_field'));
		}
	}

	public function connexion(){

		$model = new UsersModel();
		$model->connexion();
		if ($this->isconnected()){
			$this->render('users/home');
		} else {
			$this->connexion_form();
		}
	}


}



?>

