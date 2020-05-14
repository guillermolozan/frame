<?php 
namespace core\models;

class Pages extends \core\Models {

	var $post;

	function __construc(&$scope){

		parent::__construct($scope);

	}



	function getConfig(){

		$config=[
			'items'=>[
				'table' =>'paginas',
				'fields'=>"id,name,text,html,fecha_creacion,foto,id_grupo",
				'dir'   =>'pag_imas',
				'url'	  =>'pagina/',
				'filter'=>NULL,
			],
			'groups'=>[
				'table' =>'paginas_groups',
				'fields'=>'id,name,url',
			],
			'debug'=>0
		];

		foreach($this->config as $one=>$two)
			if(is_array($two))
				foreach($two as $three=>$four)
					$config[$one][$three]=$four;
			else
				$config[$one]=$two;

		return $config;

	}


	function getPage($params=[]){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);

					//only for data test
					// if($this->data_test){

					// 	if("/"==substr($params['uri'], 0,1)) $params['uri']=substr($params['uri'],1);

					// 	$parts=explode('/',str_replace('-','/',$params['uri']));

					// 	$url=$parts[0];

					// 	$cut=substr($params['uri'], strlen($url),1);

					// 	$grouppart1=explode('/',substr($params['uri'], strlen($url.$cut)));

					// 	$grouppart2=explode('-',$grouppart1['0']);

					// 	$id_group=end($grouppart2);

					// 	$id_group=(is_numeric($id_group))?$id_group:'';

					// 	$name = $url." ".$grouppart2['1']." ".$grouppart1['1'];

					// 	// prin($parts);

					// 	return array_merge(
					// 		$this->data_tests->getData(
					// 			'post?name='.$name.'&text&img=800x600'
					// 		),
					// 		['id_grupo'=>$id_group]
					// 	);

					// }


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
			$config['debug'],
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>$config['items']['dir'],
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'0'
											]
										],
				'sub'=>['fecha'=>['{fecha}','2']]

			]
		);


		// prin($post['id_grupo']);

		// $id_grupo=dato('id_grupo',$config['groups']['table'],'where id='.$post['id_grupo']);

		// prin($id_grupo);

		// if( is_numeric($id_grupo) and $id_grupo>0){

		// 	$post['id_grupo']=$id_grupo;

		// }

		// prin($post);

		$this->post=$post;

		return $post;


	}
		

	function setVisited($params=[]){

		$config=$this->getConfig();

		$post=($post)?$post:$this->post;

		update(['viewed'=>'++'],$config['items']['table'],'where id='.$post['id'],0);

	}

	function getBreadcrumb($params=[]){

		global $start;
		// prin($this->view->vars);
		$config=$this->getConfig();

		$params=array_merge($this->params,$params);


		$bs1[]=['name'=>'Inicio','url'=>'./'];


		$bs2[]=[
				'name'=>dato('name',$config['groups']['table'],'where id='.$params['item'])
				];

		$id_grupo=dato('id_grupo',$config['groups']['table'],'where id='.$params['item']);

		if( is_numeric($id_grupo) and $id_grupo>0){

			$bs2[]=[
					'name'=>dato('name',$config['groups']['table'],'where id='.$id_grupo)
					];


			$id_grupo=dato('id_grupo',$config['groups']['table'],'where id='.$id_grupo);

			if( is_numeric($id_grupo) and $id_grupo>0){
	
				$bs2[]=[
						'name'=>dato('name',$config['groups']['table'],'where id='.$id_grupo)
						];
	
			}

		}



		$bs2=array_reverse($bs2);

		$bs3[]=[
				'name'   =>dato('name',$config['items']['table'],'where id='.$params['id']),
				'class' =>'active',
				'url'    =>$params['uri']
				];


		return array_merge($bs1,$bs2,$bs3);

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
			$config['debug'],
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



	function getIdGroup($params=[]){

		$config=$this->getConfig();

		// $params=array_merge($this->params,$params);

		$id_grupo=dato('id_grupo',$config['groups']['table'],'where id='.$params['id_grupo']);

		if( is_numeric($id_grupo) and $id_grupo>0)

			return $id_grupo;

		return $params['id_grupo'];

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

	function getTitle($post=null){

		$post=($post)?$post:$this->post;
		// return ucfirst(strtolower(trim($post['name'])))." | ".$this->title;
		return trim($post['name'])." | ".$this->title;

	}

	function getDescription($post=null,$more=null){

		$post=($post)?$post:$this->post;

		if($more!=null) {
			
			$text=$more;

		} else {

			$text=str_replace("\n"," ",trim($post['text']));

			if($text=='')
				$text=str_replace("\n"," ",trim(strip_tags(html_entity_decode($post['html']))));

		}

		$text = explode("\n",wordwrap($text,156));
		return $text[0];

	}

	function getKeywords($post=null,$more=null){

		$post=($post)?$post:$this->post;

		// echo '<textarea>'
		// .str_replace("\n"," ",strip_tags(html_entity_decode($post['html'])))
		// .'</textarea>';
		// prin(extractCommonWords(str_replace("\n"," ",strip_tags(html_entity_decode($post['html'])))));

		$text=trim(str_replace("\n"," ",strip_tags(html_entity_decode($post['name'].' '.$post['html']))).' '.$more);

		return implode(",",array_keys(extractCommonWords($text)));

	}

	function getCanonical($array){
		// prin($array);
		$url = $this->view->vars['baseurl'];
		
		$url2='';
		if($array['group'])
			$url2.='/'.procesar_url($array['group']);

		if($array['name'])
			$url2.='/'.procesar_url($array['name']);

		if($array['id'])
			$url2.='/'.$array['id'];

		return maskUrl($url.substr($url2,1));

	}

	function getMenuGroup($params=[],$debug=0){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);

		// prin($params);

		if($params['deep']==null)
			$params['deep']=1;
		else
			$params['deep']=$params['deep']+1;

		

			$where =' where visibilidad=1 and ';

			if($params['where']!='')
				$where.=$params['where'];

			$where.=" order by weight desc ";


		$groups=select(
						$config['groups']['fields'],
						$config['groups']['table'],
						"where ".$params['where']."
						and visibilidad=1
						order by weight desc",0);

		// if($debug)						
		// 	prin($groups);

		return $groups;


	}

	function getMenu($params=[],$debug=0){

		$config=$this->getConfig();

		$params=array_merge($this->params,$params);


		if($params['deep']==null)
			$params['deep']=1;
		else
			$params['deep']=$params['deep']+1;


		// if($debug){

		// 	prin([
		// 		'config'=>$config,
		// 		'params'=>$this->params,
		// 	]);

		// }		


						// //only for data test
						// if($this->data_test){

						// 	if("/"==substr($params['uri'], 0,1)) $params['uri']=substr($params['uri'],1);

						// 	$parts=explode('/',str_replace('-','/',$params['uri']));

						// 	$url=$parts[0];

						// 	$cut=substr($params['uri'], strlen($url),1);

						// 	$cut=(empty($cut))?'/':$cut;

						// 	// $params['uri']=$parts[0];			
						// 	// prin($params);
						// 	// prin($url);
						// 	return $this->data_tests->getData(
						// 		'gallery'.
						// 		'?name='.$url. (($params['item'] and is_numeric($params['item']))?' '.$params['item']:'').' [N]'.
						// 		'&url='.$url.$cut.$url. ( ($params['item'] and is_numeric($params['item'])) ? '-'.$params['item']:'' ) .'/[N]'
						// 	);

						// }

		// if($params['item']==19) $params['item']=4;



		if($params['item']!=''){

			$where =" where id_grupo='".$params['item']."'";
			$where.=" and visibilidad=1";

		} else {

			$where =' where visibilidad=1';
			
		}



		$params['more_fields']=($params['more_fields'])?','.$params['more_fields']:'';

		// $debug=($params['item']=='76');


		$items=select(
			"name,id,id_grupo ".$params['more_fields'],
			$config['items']['table'],
			$where.
			' order by weight desc'.
			' '.((isset($config['items']['filter']))?$config['items']['filter']:''),
			$debug
			// ,[
			// 'group'=>['dato'=>['url',$config['groups']['table'],'where id={id_grupo}',0]]
			// ]
		);

		

		// prin($config['items']);
		// prin($params);
		// prin($items);

		if($debug)
			prin($params);
		
		
		foreach($items as $ii=>$item){

			// $group             =	($params['uri'])
			// 							?$params['uri'].'/'
			// 							:( (isset($item['group']))?$item['group']."/":$config['items']['url'] );

			$group             =	 (isset($params['uri']))?$params['uri']."/":$config['items']['url'] ;
			// $group             =	 (isset($item['group']))?$item['group']."/":$config['items']['url'] ;

			$url = procesar_url($group.trim($item['name'])."/".$item['id']);

			if("/"==substr($url, 0,1)) $url=substr($url,1);

	
			
			$items[$ii]['url'] = maskUrl($url);



			// if($item['id_grupo']!=''){

			// 	// $items[$ii]['items']='trompa '.$item['id'];
			// 	if($item['id']=='76'){

			// 		$items[$ii]['items']=$this->getMenu([
			// 			'item' =>$item['id'],
			// 			'uri'  =>'pagina'
			// 		]);

			// 	}

			// }

		}


		// prin('los items');
		// prin($items);
		// prin($params['sub']);
			
		if($params['sub']!=''){
			
			// prin('pin');
			// prin($items);

			$items_groups=$this->getMenuGroup([

				'uri'  =>$params['uri'].'/'.$group['url'],

				'deep' =>$params['deep'],

				'where'=>procesar_llaves(
					[
						'id_grupo'=>$params['item']
					],
					$params['sub']
					)

				],$debug);


			
			if($debug){
				prin('sub');
				prin($items_groups);
			}
			// prin($group);


			foreach($items_groups as $rr=>$group){

				$items_groups[$rr]['url']='#';


				$items_groups[$rr]['items']=$this->getMenuGroup(
					[
						'where'=>'id_grupo = '.$group['id']
					],$debug
				);

				

				if($debug)
					prin($items_groups[$rr]['items']);


				foreach($items_groups[$rr]['items'] as $rr2=>$group2){

					$items_groups[$rr]['items'][$rr2]['url']='#';

					if($debug){
						prin('submenu');
						prin($params['uri'].'/'.$group['url']);
					}
						
					$items_groups[$rr]['items'][$rr2]['items']=$this->getMenu(
						[
							'item' =>$group2['id'],
							'uri'  =>$params['uri'].'/'.$group['url'].'/'.$group2['url'],
							'deep' =>$params['deep'],
							// 'sub'	 => "id_grupo={id_grupo}",
							// 'items'=>$Page->getMenu(
							// 	[
							// 		'item' =>$group['id'],
							// 		'uri'  =>'pagina',
							// 	]
							// )
						],$debug
					);

				}

				$items_groups[$rr]['items']=array_merge($this->getMenu(
					[
						'item' =>$group['id'],
						'uri'  =>$params['uri'].'/'.$group['url'],
						'deep' =>$params['deep'],
						'sub'  =>$params['sub'],
						// 'sub'	 => "id_grupo={id_grupo}",
						// 'items'=>$Page->getMenu(
						// 	[
						// 		'item' =>$group['id'],
						// 		'uri'  =>'pagina',
						// 	]
						// )
					],$debug
				),$items_groups[$rr]['items']);				


			}

			// prin($items_groups);
			// prin($items);

			// if($items)
				$items=array_merge($items,$items_groups);
			// else
			// 	$items=$items_groups;


		}		

		// prin($items);

		return $items;


	}	

}