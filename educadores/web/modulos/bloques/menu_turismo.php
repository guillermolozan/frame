<?php //á
//prin ($PARAMS);

$ID_ITEM=$_GET['id'];

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$object=array();

// $object['menu']=array(
// 					array(
// 							'label'=>"Notas",
// 							'url'=>'index.php?'.$filtro_param.'modulo=items&tab=blog_noticias&acc=list',
// 					),
// 					array(
// 							'label'=>"Actividades",
// 							'url'=>'index.php?'.$filtro_param.'modulo=items&tab=blog_actividades&acc=list',
// 					),
// 					array(
// 							'label'=>"Fotos",
// 							'url'=>'index.php?'.$filtro_param.'modulo=items&tab=blog_fotos&acc=list'
// 					),
// 					array(
// 							'label'=>"Videos",
// 							'url'=>'index.php?'.$filtro_param.'modulo=items&tab=blog_videos&acc=list',
// 					),
// 				 );
								 
// $object['menu']=web_procesar_menu($object['menu']);



	$object['header']=array(
						'nombre'=>'Turismo',
						'url'=>procesar_url('index.php?'.$filtro_param.'modulo=items&tab=turismo_fotos&acc=list'),
					  );

	$object['items']= select(
		array(
			'id',
			'nombre',
			'fecha',
		),
		"turismo_fotos",
		"where 1 $filtro_where and  visibilidad='1' order by id desc limit 0,15",
		0,
		array(
			'fecha'=>array('fecha'=>array('{fecha}','5')),	
			'nivel'=>'menu_nivel_2',
			'selected'=>array('match'=>array($ID_ITEM,'{id}','selected','')),	
			'url'=>array('url'=>array("index.php?".$filtro_param."modulo=items&tab=turismo_fotos&acc=file&id={id}&friendly={nombre}")),
			'foto'=>array('foto'=>array("id,file,foto_descripcion,fecha_creacion|turismo_fotos_fotos|where id_grupo='{id}' and visibilidad='1' order by id asc limit 0,1",
						"turfot_imas",
						array('atributos'=>'2,50x50,1')
						)),
						
			'esquema'=>'foto,fecha,nombre:h2',
			)
		);
	$object['footer']=array(
						'nombre'=>'Ver Todos los Albumes',
						'url'=>procesar_url('index.php?'.$filtro_param.'modulo=items&tab=turismo_fotos&acc=list'),
						);	





//prin($object);

$OBJECT[$PARAMS['this']]=$object;
	
?>