<?php //á

	$object=array();
	//MULITPLE SLIDESHOW ITEMS 		
								
	$object['grupos']=select(
		array(
		  "id",
		  "nombre"
		  ),'productos_grupos','where 1 limit 0,6',0,
		array(
			'header:nombre'=>'{nombre}',
			'header:url'=>array('url'=>array("index.php?modulo=items&tab=productos&acc=list&gru={id}&friendly={nombre}")),
			'items'=>array('filas'=>array('id,nombre','productos_items','where id_grupo={id}',0,
			array(
				'url'=>array('url'=>array("index.php?modulo=items&tab=productos&acc=file&id={id}&friendly={nombre}")),
				'foto'=>array('foto'=>array("id,file,foto_descripcion,fecha_creacion|productos_fotos|where id_item='{id}' and visibilidad='1' order by id asc limit 0,1",
											"profot_imas",
											array('atributos'=>'2,154x110,1')
											)),
				'esquema'=>'foto,nombre:a'
				)
			))
		)
	);
	

	//MULTIPLE SLIDESHOW SETTINGS						
	$object['settings']=array(
			'label'=>$PARAMS['conector'],	
			'width'=>"154",
			'height'=>"136",
			'itemsporpagina'=>"1x1",
			'vacio'=>"aún no hay fotos",
			'titulo'=>"",	
			//'interval'=>"7000",	
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
												'label'=>$object['settings']['label'].'_'.$item['id'],
												'titulo'=>$item['nombre']
												//'interval'=>'7000',
												)),$item);
	
	}
	unset($item);

	$OBJECT[$PARAMS['this']]=$object['grupos'];
	
	$REMOOZZ=1;	
	
		
?>