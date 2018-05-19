<?php //á

/*BLOQUE PUBLICIDAD*/


$items= select(
        "id,nombre,fecha_creacion"
        ,"publicidad_fotos"
        ,"where id in ('3') and  visibilidad='1' order by id asc limit 0,100"
        ,0
        ,array(
        	'sub_select'=>array('sub_select'=>array(
                			    		'campos'=>"id,id_grupo,file,foto_descripcion,fecha_creacion,url as link"
                                	    ,'tabla' =>"publicidad_fotos_fotos"
                                	    ,'donde' =>"where id_grupo='{id}' and visibilidad='1' order by id asc limit 0,100"
                                       	,'debug' =>0
										,'opciones'=>array(
											'carpeta'=>'pubfot_imas'
											,'tamano'=>'2'
											,'dimensionado'=>'108x160'
											,'centrado'=>'1'
											,'get_atributos'=>array('get_atributos'=>array(
																		'carpeta'=>'{carpeta}'
																		,'fecha'=>'{fecha_creacion}'
																		,'file'=>'{file}'
																		,'tamano'=>'{tamano}'
																		,'dimensionado'=>'{dimensionado}'
																		,'centrado'=>'{centrado}'
																		)										
																	)
											,'link'=>array('url_externa'=>array('link'=>'{link}'))
                                            )
                                        )    
								)    
              )
        );
			
						
	$NOOB=array(
			'label'=>$PARAMS['conector'],	
			'width'=>"107",
			'height'=>"160",
			'itemsporpagina'=>"1x1",
			'vacio'=>"aún no hay fotos",
			'titulo'=>"",	
//			'interval'=>"7000",	
			'autoplay'=>"true",//[true,false]
			'mode'=>"horizontal", //[horizontal,vertical]	
			'buttons'=>"1"
			);
	
	$NOOB_S=array();
	foreach($items as $ii=>$filas){
	
		$noobst=$NOOB;
		$noobst['label']=$NOOB['label'].'_'.$ii;
		$noobst['titulo']=$filas['nombre'];
		$noobst['interval']=$ii*1000+7000;
		$noobst['items']=$filas['sub_select'];
		$NOOB_S[]=web_render_slider_preproceso($noobst);		
		
	}
	

	$NOODSLICE[$PARAMS['conector']]=$NOOB_S;

	$REMOOZZ=1;
	
	//$SEXYLIGHTBOX=1;
	
?>