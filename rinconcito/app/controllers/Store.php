<?php 
namespace controllers;

class Store extends Controller {

	function __construct($params){

		parent::__construct($params);

	}
	
	function index($params){

		$this->name='store';

		//local
		$local=fila("id,url,fecha_creacion,nombre as name,lat,lon,address,phone,foto,foto_descripcion,facebook","locales","where url='".$params['store']."'",0);


		//banner
		$banner=select(
			"fecha_creacion,file,foto_descripcion as name",
			"grupos_banners_fotos",
			"where id_grupo=".$local['id']." order by weight desc",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'locbanfot_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										]	
			]									
			);


		//popup
		$popup=fila(
			"fecha_creacion,file,name",
			"local_popups",
			"where id_grupo=".$local['id']." and visibilidad=1",
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
		// prin($popup);
		//video galleries
		$video_galleries=select(
						"id,nombre as name,fecha as sub",
						"blog_videos",
						"where visibilidad=1 and id_grupo=".$local['id'],0,[
						
						'sub'=>['fecha'=>['fecha'=>'{sub}','formato'=>'2']],
						'items'=>['select'=>['codigo,nombre as name','blog_videos_videos',"where visibilidad=1 and id_grupo={id}",0,
							[
								'img'=>'http://i.ytimg.com/vi/{codigo}/mqdefault.jpg'
							]
						]]
						
						]);


		//photo galleries
		$photo_galleries=select(
						"id,nombre as name,fecha as sub",
						"blog_fotos",
						"where visibilidad=1 and id_grupo=".$local['id'],0,[
						'sub'=>['fecha'=>['fecha'=>'{sub}','formato'=>'2']]
						]);


		$photo_galleries=array_map(function($item){

			return array_merge($item,['items'=>select(
							"fecha_creacion,file,foto_descripcion as name",
							"blog_fotos_fotos",
							"where visibilidad=1 and id_grupo=".$item['id'],
							0,
							[
								'img'=>['get_archivo'=>[
															'carpeta'=>'blofot_imas',
															'fecha'=>'{fecha_creacion}',
															'file'=>'{file}',
															'tamano'=>'0'
															]
														],

							]									
						)]);
					
		},$photo_galleries);

		// prin($photo_galleries);

		//events
		$events=select(

			"fecha_creacion,file,fecha,nombre as name,descripcion as text,popup",
			"eventos",
			"where id_grupo=".$local['id']." order by fecha desc",
			0,
			[
				'img'=>['get_archivo'=>[
											'carpeta'=>'even_imas',
											'fecha'=>'{fecha_creacion}',
											'file'=>'{file}',
											'tamano'=>'0'
											]
										],
				'sub'=>['fecha'=>['fecha'=>'{fecha}','formato'=>'2']]

			]

		);

		$event_dates=$ev2=[];
		foreach($events as $ii=>$event)
		{
			$class=substr($event['fecha'],0,10);
			$events[$ii]['class']=$class;
			$event_dates[$class]=$event['sub'];
		}
		foreach($event_dates as $ii=>$val){
			$ev2[]=['option'=>$ii,'val'=>$val];
		}
		$event_dates=$ev2;


		//map
		$map=[
				'lat'     =>$local['lat'],
				'lon'     =>$local['lon'],
				'name'    =>$local['nombre'],
				'address' =>$local['address'],
				'phone'   =>$local['phone'],
				'text'    =>"<strong>".$local['nombre']."</strong><br>".$local['address']."<br>".$local['phone']
				];


		$this->view->assign(
			[
				'title'			=> $this->name,

				//head
				'head_title'   => $local['name'].' - '.$this->title,

				//banner
				"banner"    	=> $banner,

				//events
				"events"    	=> $events,
				"event_dates"  => $event_dates,

				//popup
				"popup"    		=> $popup,

				//photo galleries
				"photo_galleries"		=> $photo_galleries,

				//video galleries
				"video_galleries"		=> $video_galleries,

				//map
				'map'				=>$map,

				//local
				'local'			=>$local,

			]

		);


		$this->view->render(
			
			'layout_local'

		);


	}

}