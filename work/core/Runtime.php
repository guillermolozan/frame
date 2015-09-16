<?php 
namespace core;

class Runtime {


	function __construct(){


	}

	function generatejsons($params){


		global $vars_array;
		// prin($params);

		$runtimejson=$_SERVER['REQUEST_URI'];

		$host='http:'.Server::base();

		$urls= require 'urltests.php';


		$route=new Routes();

		$vars=[];

		foreach($urls as $url){

	    	$_SERVER['REQUEST_URI']=str_replace('//','/',str_replace('/runtime/jsons',"/".$url."/",$runtimejson))."?array";
	    	// prin($_SERVER['REQUEST_URI']);
	    	$route->response();

		}
		// echo json_encode($vars_array);
		echo (file_put_contents("json/data.json",json_encode($vars_array)))?'json/data.json created':'nada';

	}


	function updatedatabase($params){

		$geturl='http:'.str_replace('frame','sistemapanel',Server::base()).'panel/maquina.php?accion=importdb&tablas=';

		echo "$geturl
";
		// echo file_get_contents($geturl);

	}

}