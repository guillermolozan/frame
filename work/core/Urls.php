<?php

namespace core;

class Urls {

	private $urls = [];
	// var $controller;
	// var $method;
	// var $uri;
	// var $disabled;
	// var $params     = [];


	function __construct(){

		// global $start;
		
		$this->urls = require APP.'/config/urls.php';
		// $this->add_route(['/meta'=>'controller=Meta&method=index']);
		// $this->add_route(['/download/(:any)$'=>'controller=Runtime&method=download&item=$1']);

		// $this->disabled=$start['disabled'];

	}

	function add_url($urls=[]){
		
		foreach($urls as $i=>$url)
			$this->urls[$i]=$url;

	}

	function getItems(){

		return $this->urls;

	}

}