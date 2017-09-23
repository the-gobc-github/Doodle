<?php

namespace Core\Model;

use App\App;

class Model{

	protected static $table;

	public function __construct(){

		/* session_start(); */
	}

	private static function getTable(){

		if (self::$table == null) {
			/* var_dump(str_replace('App/Models/Model','',get_called_class())); */
			self::$table = str_replace('App\Models\\','',get_called_class());
			self::$table = strtolower(str_replace('Model','',self::$table));
		/* 	die(self::$table); */
		}
		return self::$table;
	}

	/* public function get_where($what,$where,$value){ */

	/* 	$statement = 'SELECT ' . $what . ' FROM ' . self::getTable() . */
	/* 		' WHERE ' . $where . '=' . "'" . $value . "'"; */
	/* 	$res = App::query($statement); */

	/* 	return $res; */
        /* } */

	public function get_where_and($array){
		//where is the database column
		//array is the argument for PDO. It contains key that are used in the query
		$w_arr = array();
		$v = '';
		$cpt = 0;
		foreach ($array as $key => $value) {
			if ($cpt>0) {
				$v =  $v . ' AND ' . $key . '= :' . $key;
			} else {
				$v = $key . '= :' . $key;
			}
			$cpt+=1;
		}
		$statement = 'SELECT * FROM ' . self::getTable() . ' WHERE (' . $v . ')';
		$res = App::query($statement,$array);
		return $res;
    }

	/* public function get($what){ */
	/* 	$statement = 'SELECT ' . $what . ' FROM ' . self::getTable(); */
	/* 	App::query($statement); */
	/* 	return $res; */

	/* } */

	/* public function delete($where,$value){ */

	/* $statement = 'DELETE FROM `' . self::getTable() . '` WHERE `' . $where . '`=:d'; */
	/* App::query($statement,array(':d' => $value)); */

	/* } */

	/* public function update($what,$value,$where,$v_where){ */

	/* 	$statement = "UPDATE " . self::getTable() . " SET " . $what . "= :u WHERE " . $where . "='" . $v_where . "'"; */
	/* 	App::query($statement,array(':u' => $value)); */
	/* } */

	/* public function insert($rows,$array){ */
	/* 	$r = ''; */
	/* 	$v = ''; */
	/* 	$cpt = 0; */
	/* 	foreach ($rows as $row) { */
	/* 		if ($cpt>0) { */
	/* 			$r =  $r . ', ' . $row; */
	/* 		} else { */
	/* 			$r = $row; */
	/* 			$cpt += 1; */
	/* 		} */
	/* 	} */
	/* 	$cpt = 0; */
	/* 	foreach ($array as $key => $value) { */
	/* 		if ($cpt>0) { */
	/* 			$v =  $v . ', ' . $key; */
	/* 		} else { */
	/* 			$v = $key; */
	/* 			$cpt += 1; */
	/* 		} */
	/* 	} */
	/* 	$statement = 'INSERT INTO ' . self::getTable() . ' (' . $r . ') VALUES (' . $v')'; */
	/* 	App::query($statement,$array); */
	/* } */

}

?>
