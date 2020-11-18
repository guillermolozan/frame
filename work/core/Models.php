<?php

namespace core;

class Models {

	var $params;

	public function __construct(&$scope){

		$this->params     =$scope->params;
		
		$this->data_test  =$scope->data_test;
		
		$this->data_tests =$scope->data_tests;
		
		$this->title      =$scope->title;
		
		$this->view       =$scope->view;

		$this->pipe       =$scope->pipe;

		$this->config     =[];

	}

	function setConfig($config=[]){

		$this->config=array_merge($this->config,$config);

	}

}

