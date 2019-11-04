<?php

namespace core;

// use mysqli as mysqli;

class Connection {


	/*
	public function connec0() {

		global $conf;

		$co = $conf->getConfig(Server::environment());

		$db = mysqli_connect($co['MYSQL_HOST'], $co['MYSQL_USER'], $co['MYSQL_PASS'], $co['MYSQL_DB']);

		if (!$db) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$db->query("SET NAMES 'utf-8';");
		// date_default_timezone_set('America/Lima');
		$db->query("SET `time_zone` = '".date('P')."'");	


		return $db;
		
 	}
	*/
	
	static function connect($co){

		$link = mysqli_connect(
			$co['MYSQL_HOST'],
			$co['MYSQL_USER'],
			$co['MYSQL_PASS'],
			$co['MYSQL_DB']
		);
		
		mysqli_set_charset($link,"utf8");
		date_default_timezone_set('America/Lima');
		mysqli_query($link,"SET `time_zone` = '".date('P')."'");
		
		// mysql_query("SET `time_zone` = '".date('P')."'");
		if (!$link) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			exit;
		}
		
		// @$link=mysql_connect (
		// 	$co['MYSQL_HOST'],
		// 	$co['MYSQL_USER'],
		// 	$co['MYSQL_PASS']) or die ('error de conexion:'.mysql_error());
		// mysql_select_db ( $co['MYSQL_DB'],$link);

		// mysql_query("SET NAMES 'utf8'",$link);
		// date_default_timezone_set('America/Lima');
		// mysql_query("SET `time_zone` = '".date('P')."'");

		return $link;

	}
	

}