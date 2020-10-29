<?php //á

$object=array();

$object['items']= select(
        "id,file,foto_descripcion,fecha_creacion,url"
        ,"banners_fotos_fotos"
        ,"where 1 and id_grupo='3' and  visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
			'foto:url'=>'{url}',
			'foto:atributos'=>array('atributos'=>'banfot_imas,{fecha_creacion},{file},6,180x150,1'),
			'esquema'=>'foto'
			)	  
        );
		
// prin($object['items']);


	$object['grupos'][]=$object;
			
						
	$object['settings']=array(
			'label'=>$PARAMS['this'],	
			'width'=>"210",
			'height'=>"150",
			'itemsporpagina'=>"1x1",
			'vacio'=>"aún no hay fotos",
			'titulo'=>"",	
//			'interval'=>"7000",	
			'autoplay'=>"true",//[true,false]
			'mode'=>"horizontal", //[horizontal,vertical]	
			//'handles'=>"0",
			'buttons'=>"1",
				// 'prev'=>"",
				// 'next'=>"",
				// 'title_prev'=>"anterior",
				// 'title_next'=>"siguiente",
			);

	foreach($object['grupos'] as &$item){
		$item=web_render_Slider_PreProceso2(array_merge($object['settings'],array(
												'label'=>$object['settings']['label'],
												'titulo'=>$item['nombre']
												//'interval'=>'7000',
												)),$item);
	}
	unset($item);

	$OBJECT[$PARAMS['this']]=$object['grupos'];
	
	$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;
		
?>