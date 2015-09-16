<?php

namespace core;

class Models {

	// var $array=array();
	private $models;
	
	private $isLoaded = false;

	public function __construct( $file ){

		if(!$this->isLoaded){

			require_once($file);
			
			$this->models = $objeto_tabla;
			
			$this->isLoaded=true;

		}

	}

	public function listModels(){

		$list=array();
		foreach($this->models as $index => $m){
			$list[] = $index;
		}
		return $list;

	}

	public function getModels(){

		return $this->models;

	}

	public function getModelByIndex($model){

		return $this->models[$model];

	}

	public function getModelByUrl($url){

		foreach($this->models as $index => $m){
			if($m['archivo']==$url) return $m;
		}
		return NULL;

	}




}

