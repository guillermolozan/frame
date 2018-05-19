<?php 
namespace core\models;

class Links extends \core\Models {

	function __construc(&$scope){

		parent::__construct($scope);

	}

	function getConfig(){

		$config=[
			'items'=>[
				'table' =>'links',
				'fields'=>"name,url",
				'dir'   =>'links_imas',
				'name'	=>'Enlaces'
			],
			// 'groups'=>[
			// 	'table' =>'paginas_groups',
			// ]
		];

		foreach($this->config as $one=>$two)
			if(is_array($two))
				foreach($two as $three=>$four)
					$config[$one][$three]=$four;
			else
				$config[$one]=$two;

		return $config;

	}

	function getLinks($params=['num'=>'7']){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);

		// if($this->data_test){

		// 	return $this->data_tests->getData([
		// 		'name'  =>'Enlaces',
		// 		'items' =>'gallery?name=25&number='.$params['num'].'&url&target=_blank',		
		// 	]);
			
		// }

		// links
		$links=[
			'name'  =>$config['items']['name'],
			'items' =>select(
				$config['items']['fields'],
				$config['items']['table'],
				"where 1
				order by weight desc
				limit 0,".$params['num'],
				0,
				[
				// 'target'=>'_blank'
				]
			)
		];	

		if(enhay($config['items']['fields'],'file'))
		foreach($links['items'] as $ii=>$item){

			if($config['items']['target']=='_blank')
				$links['items'][$ii]['target']='_blank';
			$links['items'][$ii]['img']=get_imagen(
				$config['items']['dir'], 
				$item['fecha_creacion'], 
				$item['file']);
		}

		return $links;


	}





}
