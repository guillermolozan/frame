<?php //á
//prin ($PARAMS);


$ID_ITEM=$_GET['id'];

$object=array();

switch($_GET['tab']){
case "textos_items":	

	$object['header']=array(
						'nombre'=>'Centro Informativo',
						'url'=>procesar_url('index.php?modulo=items&tab=textos_items&acc=list'),
						);	

	$object['items']= select(
		array(
		"id",
		"nombre",
		"fecha"
		),
		"textos_items",
		"where 1 and  visibilidad='1' order by id desc limit 0,4",
		0,
		array(
			'nivel'=>'menu_nivel_2',
			'fecha'=>array('fecha'=>array('{fecha}','5')),				
			'url'=>array('url'=>array('index.php?modulo=items&tab=textos_items&acc=file&id={id}&friendly={nombre}')),
			'selected'=>array('match'=>array($ID_ITEM,'{id}','selected','')),
			'esquema'=>'fecha,nombre'
			)
		);
		
	$object['footer']=array(
						'nombre'=>'Ver Todos los Textos',
						'url'=>procesar_url('index.php?modulo=items&tab=textos_items&acc=list'),
						);		
break;
}

$OBJECT[$PARAMS['this']]=$object;
	
?>