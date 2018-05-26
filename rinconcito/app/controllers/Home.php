<?php 
namespace controllers;

class Home extends Controller {

	function __construct($params){

		parent::__construct($params);

	}

	function index2($params){

		// banner
		$id_banner=dato("id","banners_fotos","where name='banner_main'",0);

		$banner=select(
			"fecha_creacion,file,foto_descripcion as name",
			"banners_fotos_fotos",
			"where id_grupo=".$id_banner." order by weight desc",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'banfot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
			]									
		);

		$banner=array_map(function($value){

			$class=['left-align','right-align','center-align'];
			$value['class']=$class[array_rand($class)];
			return $value;

		},$banner);


		$this->view->assign(["banner"=> $banner]);

		// //banner
		// $Banner=$this->loadModel('Banners');

		// $banner=$Banner->getItems();



		// locales
		$locales['items']=select("id,url,nombre as name,foto,foto_descripcion,fecha_creacion,facebook","locales","",0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'loc_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'0'
											]
										]	
			]);



		foreach($locales['items'] as $ii=>$hab){

			$items=explode("\n",$hab['text4']);
			$htm='<ul>';
			foreach($items as $item){
				if($item!='')
					$htm.='<li>'.$item.'</li>';
			}
			$htm.='</ul>';
			$locales['items'][$ii]['text4']=$htm;


			$locales['items'][$ii]['photos']=
			[
				$hab['img'],
				$hab['img'],
				$hab['img']
			];

			unset($locales['items'][$ii]['img']);
			// $habitaciones['items'][$ii]['photos']
			// $photos=filas(
			// 	'file,fecha_creacion',
			// 	'projects_photos',
			// 	'where id_grupo='.$hab['id'].' and visibilidad=1',0,[
			// 		'get_archivo'=>['get_archivo'=>[
			// 									'carpeta'=>'profot_imas',
			// 									'fecha'=>'{fecha_creacion}',
			// 									'file'=>'{file}',
			// 									'tamano'=>'0'
			// 									]			
			// 				]
			// 		]
			// );

			// foreach($photos as $jj=>$photo){

			// 	$locales['items'][$ii]['photos'][]=$photo['get_archivo'];

			// }


		}


		// prin($locales);


		$this->view->assign(["locales"=> $locales]);


		// popup
		$popup=fila(
			"fecha_creacion,file,name",
			"local_popups",
			"where id_grupo is NULL and visibilidad=1",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'locpop_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
			]									
			);		

		$this->view->assign(["popup"=> $popup]);


		$this->view->assign(
			[

				'is_home'              => true,

				'title'			=> $this->title,

				//head
				'head_title'   => $this->title.' - Restaurant Peña Campestre',

			]

		);

		$this->view->render('layout_home2');


	}

	function index($params){		

		// banner
		$id_banner=dato("id","banners_fotos","where name='banner_main'",0);

		$banner=select(
			"fecha_creacion,file,foto_descripcion as name",
			"banners_fotos_fotos",
			"where id_grupo=".$id_banner." order by weight desc",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'banfot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
			]									
		);

		$banner=array_map(function($value){

			$class=['left-align','right-align','center-align'];
			$value['class']=$class[array_rand($class)];
			return $value;

		},$banner);


		// //banner
		// $Banner=$this->loadModel('Banners');

		// $banner=$Banner->getItems();



		// locales
		$locales=select("id,url,nombre as name,foto,foto_descripcion,fecha_creacion,facebook","locales","",0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'loc_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{foto}',
											'tamano'=>'0'
											]
										]	
			]);



		// popup
		$popup=fila(
			"fecha_creacion,file,name",
			"local_popups",
			"where id_grupo is NULL and visibilidad=1",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'locpop_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
			]									
			);		


		$this->view->assign(
			[

				'is_home'              => true,

				'title'			=> $this->title,

				//head
				'head_title'   => $this->title.' - Restaurant Peña Campestre',

				//banner
				"banner"               => $banner,

				//locales
				"locales"      => $locales,

				//popup
				"popup"    		=> $popup,				

			]

		);

		$this->view->render('layout_home');


	}

}