<?php 

namespace core;

Class Config {

	private $config;
	
	private $isLoaded = false;

	public function __construct($file){

		if(!$this->isLoaded){

			if(!file_exists($file)) die("in '".getcwd()."' not found '".$file."'");

			$vars=parse_ini_file($file,true); 

			$this->config = $vars;

			$this->isLoaded=true;

		}

	}

	public function getConfig($enviroment="local"){

		$array = $this->config;

		if($enviroment=="local"){

			$vars=array_merge(
				$array['LOCAL'],
				$array['LOCAL_FTP'],
				$array['LOCAL_MYSQL']
				);

		} elseif($enviroment=="remote"){

			$vars=array_merge(
				$array['REMOTE'],
				$array['REMOTE_FTP'],
				$array['REMOTE_MYSQL']
				);

		}	

		$vars=array_merge(
			$vars,
			$array['GENERAL'],
			$array['INTERNO']
			);

		return $vars;

	}
	
}