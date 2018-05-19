<?php //á

	$object=array();
	//MULITPLE SLIDESHOW ITEMS 	
	$object['header']=array(
							'nombre'=>'Centro Informativo',
							'url'=>procesar_url("index.php?modulo=items&tab=textos_items&acc=list")
							);

	$object['footer']=array(
							'nombre'=>'Todos los artículos',
							'url'=>procesar_url("index.php?modulo=items&tab=textos_items&acc=list")
							);	
		
	$object['items']=select(
		array(
			'id',
			'titulo as nombre',
			),
			'paginas',
			"where pagina='donde-nos-encontramos' limit 0,1",
			0,
		array(
			'url'=>array('url'=>array("index.php?modulo=app&tab=pages&page=donde-nos-encontramos")),
			'fecha'=>'',			
			'nivel'=>'menu_nivel_1',
			'esquema'=>'nombre',
		)		
	);
	
	$object['items']=array_merge($object['items'],select(
		array(
			'id',
			'fecha',
			'nombre',
			),
			'textos_items',
			'where 1 limit 0,100',0,
		array(
			'url'=>array('url'=>array("index.php?modulo=items&tab=textos_items&acc=file&id={id}&friendly={nombre}")),
			'fecha'=>array('fecha'=>array('{fecha}','5')),			
			'nivel'=>'menu_nivel_1',
			'esquema'=>'fecha,nombre',
		)		
	));
	
	$object['grupos'][]=$object;

	//MULTIPLE SLIDESHOW SETTINGS						
	$object['settings']=array(
			'label'=>$PARAMS['conector'],	
			'width'=>"208",
			'height'=>"201",
			'itemsporpagina'=>"1x4",
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
	
	foreach($object['grupos'] as &$item){
		$item=web_render_Slider_PreProceso2(array_merge($object['settings'],array(
												'label'=>$object['settings']['label'],
												'titulo'=>$item['nombre']
												//'interval'=>'7000',
												)),$item);
	}
	unset($item);
	//prin($object['grupos']);
	$OBJECT[$PARAMS['this']]=$object['grupos'];
	
	$REMOOZZ=1;	
	

?>