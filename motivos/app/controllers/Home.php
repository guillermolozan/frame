<?php 
namespace controllers;

class Home extends Controller {

	function __construct($params){

		parent::__construct($params);

	}

	function index($params){		

		// banner
		// $id_banner=dato("id","banners_fotos","where name='banner_main'",0);

		$banner_dad=fila(
			"id",
			"banners_fotos",
			"where name='banner_main'"
			// 0,
			// [
			// 	'img'=>['get_archivo'=>[
			// 								'carpeta'=>'banfotm_imas',
			// 								'fecha'=>'{fecha_creacion}',
			// 								'file'=>'{file}',
			// 								'tamano'=>'0'
			// 								]
			// 							]	
			// ]									
			);

		$id_banner=$banner_dad['id'];
		// $im_banner=$banner_dad['img'];


		$banner=select(
			"fecha_creacion,bg,bgmovil,file,foto_descripcion as name,url,filecentro",
			"banners_fotos_fotos",
			"where id_grupo=".$id_banner."  and visibilidad=1 order by weight desc limit 0,30",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'banfot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										],
				'bg'=>['get_archivo'=>[
											'carpeta'=>'banbg_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{bg}',
											'tamano'=>'0'
											]
										],
				'bgmovil'=>['get_archivo'=>[
											'carpeta'=>'banbgmovil_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{bgmovil}',
											'tamano'=>'0'
											]
										],

				'filecentro'=>['get_archivo'=>[
											'carpeta'=>'banfotcen_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{filecentro}',
											'tamano'=>'0'
											]
										]											

																														
			]									
			);

		// prin($banner);

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
				'head_title'   => $this->title.' - Regalos Personalizados',

				//banner
				// "slides_img"	=> $im_banner,
				"slides"    	=> $banner,

				//popup
				"popup"    		=> $popup,				

				'opengraph'		=> true

			]

		);

		$this->view->render('layout_home');


	}

}