<?php

namespace App\Controller;
use Core\Controller\Controller;
use App\Controller\AppController;

class UsersController extends AppController{
/* class UsersController { */

	public function home(){
		#This should be in CalendarController
		if ($this->isconnected()) {
			 this->render('users/home');
		} else {
			$this->connexion();
		}
	}

	public function connexion(){

		if ($this->isconnected()){
			$this->render('users/home');
		} else {
			$name_field	= 'var1';
			$pwd_fied = 'var2';
			$this->render('users/connexion',compact('var1','var2'));
		}
	}



}



?>

