<?php //á


	$object=array();

	$object['menu']=array(
						array('label'=>"Notas", 		'onclick'=>";",'id'=>'1','class'=>'selected'),
						array('label'=>"Actividades", 	'onclick'=>";",'id'=>'2'),
						array('label'=>"Fotos", 		'onclick'=>";",'id'=>'3'),
						array('label'=>"Videos", 		'onclick'=>";",'id'=>'4','class'=>'ultimo'),
					 );
					 

	$object['grupos']['notas']['items']=select("id,nombre,texto,fecha",'blog_noticias','where 1 order by fecha desc limit 0,100',0,
		array(
			'nombre'=>array('limit'=>array('{nombre}','70')),
			'texto'=>array('limit'=>array('{texto}','135')),
			'fecha'=>array('fecha'=>array('{fecha}','5')),			
			'url'=>array('url'=>array("index.php?modulo=items&tab=blog_noticias&acc=file&id={id}&friendly={nombre}")),
			'esquema'=>'fecha,nombre:h2,texto',			
			
		)		
	);
	
	
	$object['grupos']['notas']['footer']=array(
											'nombre'=>'Todas las notas',
											'url'=>procesar_url("index.php?modulo=items&tab=blog_noticias&acc=list")
											);



	$object['grupos']['actividades']['items']=select("id,nombre,texto,fecha",'blog_actividades','where 1 order by fecha desc limit 0,100',0,
		array(
			'nombre'=>array('limit'=>array('{nombre}','70')),		
			'texto'=>array('limit'=>array('{texto}','135')),		
			'fecha'=>array('fecha'=>array('{fecha}','5')),			
			'url'=>array('url'=>array("index.php?modulo=items&tab=blog_actividades&acc=file&id={id}&friendly={nombre}")),
			'esquema'=>'fecha,nombre:h2,texto',						
		)		
	);
	$object['grupos']['actividades']['footer']=array(
											'nombre'=>'Todas las Actividades',
											'url'=>procesar_url("index.php?modulo=items&tab=blog_actividades&acc=list")
											);
											
												
	$object['grupos']['fotos']['items']=select("id,nombre,fecha",'blog_fotos','where 1 order by id desc limit 0,100',0,
		array(
			'nombre'=>array('limit'=>array('{nombre}','70')),	
			'fecha'=>array('fecha'=>array('{fecha}','5')),				
			'url'=>array('url'=>array("index.php?modulo=items&tab=blog_fotos&acc=file&id={id}&friendly={nombre}")),
			'foto'=>array('foto'=>array("id,file,foto_descripcion,fecha_creacion|blog_fotos_fotos|where id_grupo='{id}' and visibilidad='1' order by id asc limit 0,1",
						"blofot_imas",
						array('atributos'=>'2,50x50,1')
						)),
			'esquema'=>'foto,fecha,nombre',						
		)		
	);
	
	$object['grupos']['fotos']['footer']=array(
											'nombre'=>'Todos los Albumes',
											'url'=>procesar_url("index.php?modulo=items&tab=blog_fotos&acc=list")
											);
											
												
	
	$object['grupos']['videos']['items']=select("id,nombre,fecha",'blog_videos','where 1 order by id desc limit 0,100',0,
		array(
			'nombre'=>array('limit'=>array('{nombre}','70')),	
			'fecha'=>array('fecha'=>array('{fecha}','5')),							
			'url'=>array('url'=>array("index.php?modulo=items&tab=blog_videos&acc=file&id={id}&friendly={nombre}")),
			'foto'=>array('fila'=>array("id,codigo","blog_videos_videos","where id_grupo='{id}' and visibilidad='1' order by id asc limit 0,1",0,
				array('atributos'=>'src="http://i4.ytimg.com/vi/{codigo}/default.jpg" width="50" height="50" ')
						)),
			'esquema'=>'foto,fecha,nombre',						
		)		
	);
	
	$object['grupos']['videos']['footer']=array(
											'nombre'=>'Todos los Albumes',
											'url'=>procesar_url("index.php?modulo=items&tab=blog_videos&acc=list")
											);	

	//MULTIPLE SLIDESHOW SETTINGS						
	$object['settings']=array(
			'label'=>$PARAMS['conector'],	
			'width'=>"259",
			'height'=>"223",
			'itemsporpagina'=>"1x2",
			'vacio'=>"aún no hay textos",
			'titulo'=>"",	
			'interval'=>"7000",	
			'autoplay'=>"false",//[true,false]
			'mode'=>"horizontal", //[horizontal,vertical]	
			//'handles'=>"0",
			'buttons'=>"1",
				'prev'=>"",
				'next'=>"",
				'title_prev'=>"anterior",
				'title_next'=>"siguiente",
			);			
	
	foreach($object['grupos'] as $each=>&$item){
		if(in_array($each,array('actividades','notas'))){
		$item=web_render_Slider_PreProceso2(array_merge($object['settings'],array(
												'label'=>$object['settings']['label']."_".$each,
												'titulo'=>$item['nombre']
												//'interval'=>'7000',
												)),$item);
		}
		if(in_array($each,array('fotos','videos'))){
		$item=web_render_Slider_PreProceso2(array_merge($object['settings'],array(
												'label'=>$object['settings']['label']."_".$each,
												'titulo'=>$item['nombre'],
												'itemsporpagina'=>'1x4'												
												//'interval'=>'7000',
												)),$item);
		}	
	}
	unset($item);
						 
	$object=array($object);
		
	$OBJECT[$PARAMS['this']]=$object;	
	
?>