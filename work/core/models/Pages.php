<?php 
namespace core\models;

class Pages extends \core\Models {


	function __construc(&$scope){

		parent::__construct($scope);

	}



	function getConfig(){

		$config=[
			'items'=>[
				'table' =>'paginas',
				'fields'=>"name,text,html,fecha_creacion,foto,id_grupo",
				'dir'   =>'pag_imas',
				'url'	  =>'pagina/',
				'filter'=>NULL,
			],
			'groups'=>[
				'table' =>'paginas_groups',
			]
		];

		foreach($this->config as $one=>$two)
			foreach($two as $three=>$four)
				$config[$one][$three]=$four;

		return $config;

	}

	function getBreadcrumb($params=[]){

		global $start;
		// prin($this->view->vars);
		$config=$this->getConfig();

		$params=array_merge($this->params,$params);

		$bs[]=['name'=>'Inicio','url'=>'./'];

		$bs[]=[
				'name'=>dato('name',$config['groups']['table'],'where id='.$params['item'])
				];

		$bs[]=[
				'name'   =>dato('name',$config['items']['table'],'where id='.$params['id']),
				'class' =>'active',
				'url'    =>$params['uri']
				];

		return $bs;

	}

	function getLinks($params=['num'=>'7']){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);

		if($this->data_test){

			return $this->data_tests->getData([
				
				'name'  =>'Noticias',
				'items' =>'gallery?name=50&number=4&url=noticia-noticia/[N]',

			]);
			
		}

		// news
		$items=[
		'name'=>'Noticias',
		'items'=>select(
			"name,id,id_grupo",
			$config['items']['table'],
			"where 1 ".
			( (isset($config['items']['filter']))?$config['items']['filter']:'')." ".
			"order by weight desc
			limit 0,".$params['num'],
			0,
			[
			'group'=>['dato'=>['url',$config['groups']['table'],'where id={id_grupo}',0]]
			]
		),
		'more'=>[
					'name'=>'ver más noticias',
					'url'=>'noticias'
					]
		];	

		// prin($items);

		foreach($items['items'] as $ii=>$item){
			$group=(isset($item['group']))?$item['group']."/":$config['items']['url'];
			$items['items'][$ii]['url']=procesar_url($group.$item['name']."/".$item['id']);
		}

		return $items;


	}


	function getPage($params=[]){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);

		//only for data test
		if($this->data_test){

			if("/"==substr($params['uri'], 0,1)) $params['uri']=substr($params['uri'],1);

			$parts=explode('/',str_replace('-','/',$params['uri']));

			$url=$parts[0];

			$cut=substr($params['uri'], strlen($url),1);

			$grouppart1=explode('/',substr($params['uri'], strlen($url.$cut)));

			$grouppart2=explode('-',$grouppart1['0']);

			$id_group=end($grouppart2);

			$id_group=(is_numeric($id_group))?$id_group:'';

			$name = $url." ".$grouppart2['1']." ".$grouppart1['1'];

			// prin($parts);

			return array_merge(
				$this->data_tests->getData(
					'post?name='.$name.'&text&img=800x600'
				),
				['id_grupo'=>$id_group]
			);

		}



		if(is_numeric($params['item'])){
			$where="where id='".$params['item']."'";
		} else {
			$where="where url='".$params['item']."'";
		}


		//post
		$post=fila(
			$config['items']['fields'],
			$config['items']['table'],
			$where,
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>$config['items']['dir'],
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'0'
											]
										]
			]
		);


		return [				
			'name'     =>$post['name'],
			'html'     =>$post['html'],
			'img'      =>$post['img'],
			'id_grupo' =>$post['id_grupo'],
		];


	}


	function getGroup($params=[]){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);

		return dato(
						"name",
						$config['groups']['table'],
						"where id='".$params['item']."'"
						,0
						);

	}


	function getMenu($params=[]){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);
		
		// prin($params);

		//only for data test
		if($this->data_test){

			if("/"==substr($params['uri'], 0,1)) $params['uri']=substr($params['uri'],1);

			$parts=explode('/',str_replace('-','/',$params['uri']));

			$url=$parts[0];

			$cut=substr($params['uri'], strlen($url),1);

			$cut=(empty($cut))?'/':$cut;

			// $params['uri']=$parts[0];			
			// prin($params);
			// prin($url);
			return $this->data_tests->getData(
				'gallery'.
				'?name='.$url. (($params['item'] and is_numeric($params['item']))?' '.$params['item']:'').' [N]'.
				'&url='.$url.$cut.$url. ( ($params['item'] and is_numeric($params['item'])) ? '-'.$params['item']:'' ) .'/[N]'
			);

		}


		if($params['item']!='')
			$where="where id_grupo='".$params['item']."'";
		else
			$where='';


		$items=select(
							"name,id,id_grupo",
							$config['items']['table'],
							$where.
							" and visibilidad=1".
							' order by weight desc'.
							' '.((isset($config['items']['filter']))?$config['items']['filter']:''),
							0,
							[
							'group'=>['dato'=>['url',$config['groups']['table'],'where id={id_grupo}',0]]
							]
							);
		
		foreach($items as $ii=>$item){

			$group             =(isset($item['group']))?$item['group']."/":$config['items']['url'];

			$url = procesar_url($group.trim($item['name'])."/".$item['id']);

			if("/"==substr($url, 0,1)) $url=substr($url,1);
			
			$items[$ii]['url'] = $url;


		}

		return $items;


	}	

}