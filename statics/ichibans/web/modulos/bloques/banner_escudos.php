<?php //á

$object=array();

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];
$filtro_where='';
$filtro_param='';
$filtro_nombre=''; 

$object['p']=array(
			//'ids'=>array("1"),
			't'=>'2','w'=>'180','h'=>'132',
			);
			
$ids=select('id','banners2_fotos',"where visibilidad='1' $filtro_where ",0,array('ids'=>"id='{id}'"));
foreach($ids as $idss){	$object['p']['ids'][]=$idss['ids']; }			

//prin($object['p']);exit();
			
$object['settings']=array(
		'label'=>$PARAMS['conector'],	
		'width'	=>$object['p']['w'],
		'height'=>$object['p']['h'],
		'itemsporpagina'=>"1x1",
		'vacio'=>"aún no hay fotos",
		'titulo'=>"",	
		'interval'=>"7000",	
		'autoplay'=>"true",//[true,false]
		'mode'=>"horizontal", //[horizontal,vertical]	
		//'handles'=>"0",
		//'buttons'=>"1",
		);
					
foreach($object['p']['ids'] as $ii=>$ID){				

	$grupo=fila('nombre,id','banners2_fotos',"where $ID and visibilidad='1' ",0);
	if(!$grupo){ continue; }
	
	$oGrupo['header']=$grupo;
	
	$oGrupo['items']= select(
			"id,file,fecha_creacion,url"
			,"banners2_fotos_fotos"
			,"where 1 and id_grupo ='".$grupo['id']."' and  visibilidad='1' order by id asc limit 0,100"
			,0
			,array(
				'foto:url'=>'{url}',
				'foto:atributos'=>array('atributos'=>'banfot2_imas,{fecha_creacion},{file},'.$object['p']['t'].',180x132,1'),
				'esquema'=>'foto'
				)	  
			);
			
	$oGrupo=web_render_Slider_PreProceso2(array_merge($object['settings'],array(
												'label'=>$object['settings']['label']."_".$ii,
												'titulo'=>$item['nombre']
												//'interval'=>'7000',
												)),$oGrupo);
	$oGrupos[]=$oGrupo; unset($oGrupo);
	
}
		

	$object=array('items'=>$oGrupos); unset($oGrupos);
	
	$object['panel']='banners2_fotos,banners2_fotos_fotos';
	
	$object['styles']='arbol_1'; 

	$object['classStyle']='arbol_1';	

	$OBJECT[$PARAMS['this']]=$object;
	
	$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;
		


?>