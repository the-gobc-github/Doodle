<?php

namespace Core\Controller;

class Controller{

	protected $viewPath;
	protected $template;

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

}

?>
