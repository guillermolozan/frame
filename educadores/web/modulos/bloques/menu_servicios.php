<?php //á
//prin ($PARAMS);

$object=array();

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$ID=($_GET['tab']=='textos_items')?$_GET['id']:'';
	

$gru=array();
	
	$gru['menu']=select(
			'id,nombre',
			'servicios_items',
			"where visibilidad='1' $filtro_where order by id asc, id asc ",
			0,
				array(
				    'url'=>array('procesar_url'=>array('url'=>"index.php?".$filtro_param."modulo=items&tab=servicios_items&acc=file&id={id}&friendly={nombre}")),							
					'nivel'=>array('match'=>array('{id_subgrupo}','','menu_nivel_2','menu_nivel_2')),
					'class'=>array('match'=>array('{id}',$ID,'selected','')),
				)
			);

	$gru['header']['nombre']='Servicios';
	
	$object['items'][]=$gru; unset($gru);
	

/*
if($_GET['sec']!='cgtp'){
	$object['items']['0']['menu'][]=array(
										'nombre'=> '<b>Informes Legales</b>',
										'id_subgrupo'=>'',
										'url' => 'index.php?modulo=items&tab=publicaciones2_items&acc=list',
										'nivel' => 'menu_nivel_2',
										//'class' => ($_GET['modulo']=='app' and $_GET['tab']=='stats_consultas')?'selected':'',
										);	
}									
*/

// prin($object);

$object['panel']='servicios_items';

$object['styles']='arbol_1';

$object['classStyle']='arbol_1';

//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($ITEMS);

$OBJECT[$PARAMS['this']]=$object; 
	
?>