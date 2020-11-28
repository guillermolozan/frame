<?php 
namespace models;

class Pages extends \core\models\Pages {

	function __construc(&$scope){

		parent::__construct($scope);

	}

	function getDescription($post=null,$more=null){

		$post=($post)?$post:$this->post;
		
		return dato("meta_description","paginas","where id=".$post['id']);

	}

	function getCanonical($array){

		return dato("url","paginas","where id=".$array['id']);

	}	

}