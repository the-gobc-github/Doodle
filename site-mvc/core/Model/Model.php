<?php

namespace Core\Model;

class Model(){

	protected static $table;

	private static function getTable(){

		if (self::$table == null) {
			self::$table = strtolower(str_replace('Model','',get_called_class());
			/* die(self::$table); */
		}
		return self::$table;
	}

	public static function get_where(){

#Use getTable to know which Model has called and use it to SELECT WHERE in TABLE
	}
}

?>
