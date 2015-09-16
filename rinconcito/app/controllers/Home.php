<?php 
namespace controllers;

class Home extends Controller {

	function __construct($params){

		parent::__construct($params);

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
				'title'			=> $this->title,

				//head
				'head_title'   => $this->title.' - Restaurant Peña Campestre',

				//banner
				"slides"    	=> $banner,

				//locales
				"locales"      => $locales,

				//popup
				"popup"    		=> $popup,				

			]

		);

		$this->view->render('layout_home');


	}

}