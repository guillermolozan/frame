<?php //á
   		
	$NOOB=array(
			'label'=>'banner_fotos',	
			'width'=>"850",
			'height'=>"200", 
			'itemsporpagina'=>"3x1",
			'vacio'=>"aún no hay fotos",
			'titulo'=>"",	
			'autoplay'=>"true",//[true,false]
			'mode'=>"horizontal", //[horizontal,vertical]	
			'buttons'=>"0"
			);

	$NOOB['items'] = select(
		"id,file,fecha_creacion",
		"paquetes_fotos",
		"where 1 and  visibilidad='1' order by id asc limit 0,100"
		,0
      ,array(
        	               
                'carpeta'=>'paqfot_imas'
                ,'tamano'=>'3'
                ,'dimensionado'=>'301x200'
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
                ,'get_archivo'=>array('get_archivo'=>array(
                                            'carpeta'=>'{carpeta}'
                                            ,'fecha'=>'{fecha_creacion}'
                                            ,'file'=>'{file}'
                                            ,'tamano'=>'{tamano}'
                                            )
                                        )
              	    
    
              )		
    );


	$NOODSLICE[$PARAMS['conector']]=web_render_slider_preproceso($NOOB);
	
	//prin($NOODSLICE['banner_fotos']);
	
?>