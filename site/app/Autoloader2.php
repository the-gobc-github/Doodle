<?php

class Autoloader{

	public function register() {
		spl_autoload_register(array(__CLASS__, 'autoload'))
	}
}

?>
