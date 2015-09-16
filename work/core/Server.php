<?php

namespace core;

class Server {

	public static function name(){

		return $_SERVER['SERVER_NAME'];

	}

	public static function isLocal(){

		$ss=self::name();
		return ( (in_array( $ss,['localhost','127.0.0.1'] )) ||  (substr($ss, 0,7) == '192.168') );

	}

	public static function environment(){

		return ( self::isLocal() )?'local':'remote';

	}

	public static function host(){

		$aaa = explode("/",$_SERVER['SCRIPT_NAME']);
		unset($aaa[sizeof($aaa)-1]);
		return "http://".$_SERVER['HTTP_HOST'].implode("/",$aaa).'/';

	}
		
	public static function base(){

		global $start;

		$aaa = explode("/",$_SERVER['SCRIPT_NAME']);
		unset($aaa[sizeof($aaa)-1]);
		return "//".$_SERVER['HTTP_HOST'].implode("/",$aaa).'/'. ( (isset($start['private']))?$start['private'].'/':'' ) ;

	}

	public static function moduleUrl(){

		$aaa = explode("/m/",$_SERVER['REQUEST_URI']);
		if(!isset($aaa[1])) return NULL;
		$bbb = explode("/",$aaa[1]);
		return $bbb[0];

	}	

	public static function completeUrl(){

		return ((inString('',$_SERVER['SERVER_PROTOCOL']))?'http://':'https://' ). $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	}

	public static function relativePath($dirProject){

		if(substr($dirProject, -1,1)=='/') 
			$dirProject=substr($dirProject, 0,-1);

		$path = self::completeUrl();

		$pathsparts=explode('?',$path);
		if(sizeof($pathsparts)==2){
			$path=$pathsparts[0];
		}


		$path = str_replace($dirProject,'',$path);
		$path = str_replace('//','/',$path);
		
		if(substr($path, -1,1)=='/') 
			$path=substr($path, 0,-1);

		return  $path;

	}

	public static function getVarArray(){

		$complete=self::completeUrl();

		$pathsparts=explode('?',$complete);

		if(sizeof($pathsparts)==2){

			$path=$pathsparts[0];
			$vars=$pathsparts[1];

			parse_str($vars, $output);

			return $output;

		}

		return [];

	}

}