<?php //á

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

	$object=array();

	$object['menu']=array(
						array('label'=>"Noticias", 		'onclick'=>";",'id'=>'1','class'=>'selected'),
						array('label'=>"Actividades", 	'onclick'=>";",'id'=>'2'),
						array('label'=>"Fotos", 		'onclick'=>";",'id'=>'3'),
						array('label'=>"Videos", 		'onclick'=>";",'id'=>'4','class'=>'ultimo'),
					 );
					 

	$object['grupos']['notas']['items']=select("id,nombre,texto,fecha,foto as file,fecha_creacion",'blog_noticias','where 1 order by fecha desc limit 0,100',0,
		array(
			'nombre'=>array('limit'=>array('{nombre}','70')),
			'texto'=>array('limit'=>array('{texto}','135')),
			'fecha'=>array('fecha'=>array('{fecha}','5')),			
			'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=blog_noticias&acc=file&id={id}&friendly={nombre}")),
			'foto:atributos'=>array('atributos'=>'blonot_imas,{fecha_creacion},{file},2,250x140,1'),			
			'esquema'=>'nombre:h2,fecha,foto,texto',			
			
		)		
	);
	
	$object['grupos']['notas']['footer']=array(
											'nombre'=>'Todas las noticias',
											'url'=>procesar_url("index.php?modulo=items&tab=blog_noticias&acc=list")
											);



	$object['grupos']['actividades']['items']=select("id,nombre,texto,fecha,foto as file,fecha_creacion",'blog_actividades','where 1 order by fecha desc limit 0,100',0,
		array(
			'nombre'=>array('limit'=>array('{nombre}','70')),		
			'texto'=>array('limit'=>array('{texto}','135')),		
			'fecha'=>array('fecha'=>array('{fecha}','5')),			
			'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=blog_actividades&acc=file&id={id}&friendly={nombre}")),
			'foto:atributos'=>array('atributos'=>'bloact_imas,{fecha_creacion},{file},2,250x140,1'),			
			'esquema'=>'nombre:h2,fecha,foto,texto',				
		)		
	);
	$object['grupos']['actividades']['footer']=array(
											'nombre'=>'Todas las Actividades',
											'url'=>procesar_url("index.php?".$filtro_param."modulo=items&tab=blog_actividades&acc=list")
											);
											
												
	$object['grupos']['fotos']['items']=select("id,nombre,fecha",'blog_fotos','where 1 order by id desc limit 0,100',0,
		array(
			'nombre'=>array('limit'=>array('{nombre}','70')),	
			'fecha'=>array('fecha'=>array('{fecha}','5')),				
			'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=blog_fotos&acc=file&id={id}&friendly={nombre}")),
			'foto'=>array('foto'=>array("id,file,foto_descripcion,fecha_creacion|blog_fotos_fotos|where id_grupo='{id}' and visibilidad='1' order by id asc limit 0,1",
						"blofot_imas",
						array('atributos'=>'2,250x140,1')
						)),
			'esquema'=>'nombre:h2,fecha,foto',				
		)		
	);
	
	$object['grupos']['fotos']['footer']=array(
											'nombre'=>'Todos los Albumes',
											'url'=>procesar_url("index.php?".$filtro_param."modulo=items&tab=blog_fotos&acc=list")
											);
											
												
	
	$object['grupos']['videos']['items']=select("id,nombre,fecha",'blog_videos','where 1 order by id desc limit 0,100',0,
		array(
			'nombre'=>array('limit'=>array('{nombre}','70')),	
			'fecha'=>array('fecha'=>array('{fecha}','5')),							
			'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=blog_videos&acc=file&id={id}&friendly={nombre}")),
			'foto'=>array('fila'=>array("id,codigo","blog_videos_videos","where id_grupo='{id}' and visibilidad='1' order by id asc limit 0,1",0,
				array('atributos'=>'src="http://i4.ytimg.com/vi/{codigo}/default.jpg" width="50" height="50" ')
						)),
			'esquema'=>'foto,fecha,nombre',						
		)		
	);
	
	$object['grupos']['videos']['footer']=array(
											'nombre'=>'Todos los Albumes',
											'url'=>procesar_url("index.php?".$filtro_param."modulo=items&tab=blog_videos&acc=list")
											);	

	//MULTIPLE SLIDESHOW SETTINGS						
	$object['settings']=array(
			'label'=>$PARAMS['conector'],	
			'width'=>"466",
			'height'=>"302",
			'itemsporpagina'=>"1x1",
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
												'titulo'=>$item['nombre'],
												//'interval'=>'7000',
												)),$item);
		}
		if(in_array($each,array('fotos','videos'))){
		$item=web_render_Slider_PreProceso2(array_merge($object['settings'],array(
												'label'=>$object['settings']['label']."_".$each,
												'titulo'=>$item['nombre'],
												'itemsporpagina'=>'1x1'												
												//'interval'=>'7000',
												)),$item);
		}	
	}
	unset($item);
	
	$object['menu'] = web_re_procesar_menu($object['menu'],$SERVER['URL']);
						 
	$object=array($object);
		
	$OBJECT[$PARAMS['this']]=$object;	
	
?>