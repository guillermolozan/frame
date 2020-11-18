<?php 
namespace controllers;

class Home extends Controller {


	function __construct($params){

		parent::__construct($params);

	}

	function index($params){

		
		/*
		########     ###    ##    ## ##    ## ######## ########
		##     ##   ## ##   ###   ## ###   ## ##       ##     ##
		##     ##  ##   ##  ####  ## ####  ## ##       ##     ##
		########  ##     ## ## ## ## ## ## ## ######   ########
		##     ## ######### ##  #### ##  #### ##       ##   ##
		##     ## ##     ## ##   ### ##   ### ##       ##    ##
		########  ##     ## ##    ## ##    ## ######## ##     ##
		*/

		
		$Banner=$this->loadModel('Banners');
		$banner=$Banner->getItems(['item'=>$this->this_banner]);
		
		$this->view->assign(["banner" => $banner]);

	




		/*
		########  ########   #######  ########  ##     ##  ######  ########  #######   ######
		##     ## ##     ## ##     ## ##     ## ##     ## ##    ##    ##    ##     ## ##    ##
		##     ## ##     ## ##     ## ##     ## ##     ## ##          ##    ##     ## ##
		########  ########  ##     ## ##     ## ##     ## ##          ##    ##     ##  ######
		##        ##   ##   ##     ## ##     ## ##     ## ##          ##    ##     ##       ##
		##        ##    ##  ##     ## ##     ## ##     ## ##    ##    ##    ##     ## ##    ##
		##        ##     ##  #######  ########   #######   ######     ##     #######   ######
		*/
		
		$importaciones['name'] =$this->other_web;
		$importaciones['url']  =$this->other_url.'modelos';
		$importaciones['target'] = "_blank";

		$importaciones['items']=select(
			[
				"id",
				"nombre as name",
				// "descripcion as text",
				// "ficha as text2",
				"id_grupo",
				"id_tipo"
			],
			"productos_items",
			" where 1 ".
			" and id_grupo=".$this->other_group." ".
			// " abd ver_home=1 ".
			// " order by weight desc".
			"",
			0,
			[
				'url'=>['url'=>['modelo-{name}/{id}']],
			]);

		foreach($importaciones['items'] as $ii=>$hab){

			$marca=dato("nombre","productos_grupos","where id=".$hab['id_grupo']);
			$tipo=dato("nombre","productos_tipos","where id=".$hab['id_tipo']);
			$importaciones['items'][$ii]['name']="$marca $tipo ".$hab['name'];
						
			$items=explode("\n",$hab['text4']);
			$htm='<ul>';
			foreach($items as $item){
				if($item!='')
					$htm.='<li>'.$item.'</li>';
			}
			$htm.='</ul>';
			$importaciones['items'][$ii]['text4']=$htm;

			// $importaciones['items'][$ii]['photos']
			$photos=filas(
				'file,fecha_creacion',
				'productos_fotos',
				'where id_item='.$hab['id'].' and visibilidad=1  limit 0,1',
				0,
				[
					'get_archivo'=>['get_archivo'=>[
												'carpeta'=>'profot_fot',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]			
							]
					]
			);

			foreach($photos as $jj=>$photo){

				$importaciones['items'][$ii]['img']=$photo['get_archivo'];

				

			}

			$importaciones['items'][$ii]['url']=$this->other_url.$hab['url'];
			$importaciones['items'][$ii]['target'] = "_blank";

		}


		
		// $importaciones['more']=[
		// 	'url'  =>'modelos',
		// 	'name' =>'ver más modelos'
		// ];

		// prin($importaciones);

		$this->view->assign(["importaciones"=>$importaciones]);



		
		/*
		 ######  ######## ########  ##     ## ####  ######  ####  #######   ######
		##    ## ##       ##     ## ##     ##  ##  ##    ##  ##  ##     ## ##    ##
		##       ##       ##     ## ##     ##  ##  ##        ##  ##     ## ##
		 ######  ######   ########  ##     ##  ##  ##        ##  ##     ##  ######
		      ## ##       ##   ##    ##   ##   ##  ##        ##  ##     ##       ##
		##    ## ##       ##    ##    ## ##    ##  ##    ##  ##  ##     ## ##    ##
		 ######  ######## ##     ##    ###    ####  ######  ####  #######   ######
		*/
		$servicios['name'] ='Modelos';
		$servicios['url']  ='modelos';

		$servicios['items']=select(
			[
				"id",
				"nombre as name",
				"descripcion as text",
				"ficha as text2",
				"texto2 as text3",
				"id_grupo",
				"id_tipo"
			],
			"productos_items",
			" where 1 ".
			" and id_grupo=".$this->this_group." ".
			" and ver_home=1 ".
			// " abd ver_home=1 ".
			// " order by weight desc".
			"",
			0,
			[
				'url'=>['url'=>['modelo-{name}/{id}']],
			]);

		foreach($servicios['items'] as $ii=>$hab){

			$marca=dato("nombre","productos_grupos","where id=".$hab['id_grupo']);
			$tipo=dato("nombre","productos_tipos","where id=".$hab['id_tipo']);
			$servicios['items'][$ii]['name']="$marca $tipo ".$hab['name'];
						
			$items=explode("\n",$hab['text4']);
			$htm='<ul>';
			foreach($items as $item){
				if($item!='')
					$htm.='<li>'.$item.'</li>';
			}
			$htm.='</ul>';
			$servicios['items'][$ii]['text4']=$htm;

			// $servicios['items'][$ii]['photos']
			$photos=filas(
				'file,fecha_creacion',
				'productos_fotos',
				'where id_item='.$hab['id'].' and visibilidad=1',
				0,
				[
					'get_archivo'=>['get_archivo'=>[
												'carpeta'=>'profot_fot',
												'fecha'=>'{fecha_creacion}',
												'file'=>'{file}',
												'tamano'=>'0'
												]			
							]
					]
			);

			foreach($photos as $jj=>$photo){

				$servicios['items'][$ii]['photos'][]=$photo['get_archivo'];

			}

		}

		$servicios['more']=[
			'url'  =>'modelos',
			'name' =>'ver más modelos'
		];


		$this->view->assign(["habitaciones"=>$servicios]);





		/*
		##     ## #### ########  ########  #######   ######
		##     ##  ##  ##     ## ##       ##     ## ##    ##
		##     ##  ##  ##     ## ##       ##     ## ##
		##     ##  ##  ##     ## ######   ##     ##  ######
		 ##   ##   ##  ##     ## ##       ##     ##       ##
		  ## ##    ##  ##     ## ##       ##     ## ##    ##
		   ###    #### ########  ########  #######   ######
		*/
		$Videos=$this->loadModel('Videos');

			// $gallery=$Videos->getItem([
			// 	'item'  =>'1',
			// 	'limit' =>'0,4',
			// 	// 'type'  =>'videos'
			// ]);


			$gallery2=$Videos->getItem([
				'item' =>$this->this_group ,
				// 'where'  =>' and id_grupo='.$this->this_group,
				'limit' =>'0,4',
			]);

			$gallery['name']='galería de videos';
			
			$gallery['type']='videos';
		
			$gallery['items']=$gallery2['items'];

			// unset($gallery['type']);

			$gallery['more']=[
				'url'  =>maskUrl('videos'),
				'name' =>'ver más'
			];


		$this->view->assign(["block_gallery_videos" => $gallery]);











		/*
		##       #### ##    ## ##    ##  ######
		##        ##  ###   ## ##   ##  ##    ##
		##        ##  ####  ## ##  ##   ##
		##        ##  ## ## ## #####     ######
		##        ##  ##  #### ##  ##         ##
		##        ##  ##   ### ##   ##  ##    ##
		######## #### ##    ## ##    ##  ######
		*/
		$Links=$this->loadModel('Links');

		$Links->setConfig([
					'items'=>[
						'fields'=>'name,url,fecha_creacion,file',
						'target'=>'_blank'
					],
				]);

		$links=$Links->getLinks();	
		$links['name']='Enlaces';
		
		// $this->view->assign(["links" => $links]);









         


		/*
		######## #### ##    ##    ###    ##       ##       ##    ##
		##        ##  ###   ##   ## ##   ##       ##        ##  ##
		##        ##  ####  ##  ##   ##  ##       ##         ####
		######    ##  ## ## ## ##     ## ##       ##          ##
		##        ##  ##  #### ######### ##       ##          ##
		##        ##  ##   ### ##     ## ##       ##          ##
		##       #### ##    ## ##     ## ######## ########    ##
		*/

		$this->view->assign(
			[
				'is_home'    => true,
				
				'title'      => $this->title,
				
				//head
				'head_title' => $this->title . ( ($this->view->vars['web_slogan'])? ' - '.$this->view->vars['web_slogan']:'' ),				
				
				//menu
				// 'menu_left'    => $this->menu_left,



				



			]

		);




		$this->view->render('layout_home');


	}

}