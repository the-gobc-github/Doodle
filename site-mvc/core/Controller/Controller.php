<?php

namespace Core\Controller;
use Core\Tools\Tools;

class Controller{

	protected $viewPath;
	protected $template;
	protected $form = 'form';

	public function isconnected(){
		return isset($_SESSION['login']);

	}

	public function render($view, $variables = []){

		session_start();
		ob_start();
		#extract variables to make them available for require
		extract($variables);

		require($this->viewPath . $view . '.php');

		$content = ob_get_clean();

		require($this->viewPath . 'templates/' . $this->template . '.php');


	}


	public function render_form($view, $variables = [],$label=False){

		$tools = new Tools();
		session_start();
		ob_start();
		#extract variables to make them available for require
		extract($variables);
		if ($label != False) {
			extract($label);
		}
		require($this->viewPath . $this->form . '.php');
		$content = ob_get_clean();

		require($this->viewPath . 'templates/' . $this->template . '.php');


	}

}

?>
