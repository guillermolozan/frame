<?php 
namespace core\models;

class Links extends \core\Models {

	function __construc(&$scope){

		parent::__construct($scope);

	}

	function getLinks($params=['num'=>'7']){


		if($this->data_test){

			return $this->data_tests->getData([
				'name'  =>'Enlaces',
				'items' =>'gallery?name=25&number='.$params['num'].'&url&target=_blank',		
			]);
			
		}

		// links
		$links=[
			'name'  =>'Enlaces',
			'items' =>select(
				"name,url",
				"links",
				"where 1
				order by weight desc
				limit 0,".$params['num'],
				0,
				[
				'target'=>'_blank'	
				]
			)
		];	

		return $links;


	}





}
