<?php //á

$object=array();
/*
$object['header']=array(
						'nombre'=>'Publicidad'
					  );
*/
$object['items']= select(
        "id,file,fecha_creacion,url,foto_descripcion as titulo"
        ,"banners_fotos_fotos"
        ,"where 1 and id_grupo='4' and  visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
			'foto:url'=>'{url}',
			'foto:atributos'=>array('atributos'=>'banfot_imas,{fecha_creacion},{file},2,200x150,1'),
			'esquema'=>'titulo,foto'
			)	   
        );
		

	$object['grupos'][]=$object;
			
						
	$object['settings']=array(
			'label'=>$PARAMS['conector'],	
			'width'=>"200",
			'height'=>"180",
			'itemsporpagina'=>"1x1",
			'vacio'=>"aún no hay fotos",
			'titulo'=>"",	
			'interval'=>"7000",	
			'autoplay'=>"true",//[true,false]
			'mode'=>"horizontal", //[horizontal,vertical]	
			//'handles'=>"0",
			'buttons'=>"1",
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