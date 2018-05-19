<?php //á

$object=array();

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$ID=($_GET['tab']=='textos_items')?$_GET['id']:'';

// $extra=select("nombre as label,url","blog_links_adicionales","where 1 $filtro_where and visibilidad='1'",0,array('nivel'=>'menu_nivel_2'));

$object['items'][]=array(
						'header'=>array(
								'nombre'=>'Blog',
								),
						'menu'=>array_merge(array(
										array(
												'label'=>"Notas",
												'url'=>'index.php?'.$filtro_param.'modulo=items&tab=blog_noticias&acc=list',
												'nivel'=>'menu_nivel_2',												
										),
										array(
												'label'=>"Actividades",
												'nivel'=>'menu_nivel_2',												
												'url'=>'index.php?'.$filtro_param.'modulo=items&tab=blog_actividades&acc=list',
										),
										array(
												'label'=>"Fotos",
												'url'=>'index.php?'.$filtro_param.'modulo=items&tab=blog_fotos&acc=list',
												'nivel'=>'menu_nivel_2',												
										),
										array(
												'label'=>"Videos",
												'url'=>'index.php?'.$filtro_param.'modulo=items&tab=blog_videos&acc=list',
												'nivel'=>'menu_nivel_2',												
										),																													
									),(($extra)?$extra:array()))
						);
						
					
//prin($object['items']);
$object['styles']='arbol_1';

$object['classStyle']='arbol_1';

//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($ITEMS);

$OBJECT[$PARAMS['this']]=$object; 
	
?>