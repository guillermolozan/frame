<?php //á

/*BLOQUE MARCAS 2*/

	/*STYLE*/
	
	$HEAD['INCLUDES']['style'][]='#bloque_nuestras_marcas2_elemento_0 { float:left;margin:0px 0px 0px 15px;  }';
	
	/*OBJETO*/
	
	$NOOB=array(
			'label'=>'marcas2',	
			'width'=>"170",
			'height'=>"145",
			'itemsporpagina'=>"1x1",
			'vacio'=>"aún no hay marcas",
			'titulo'=>"",	
			'autoplay'=>"true",//[true,false]
			'mode'=>"horizontal", //[horizontal,vertical]	
			'buttons'=>"0"
			);
	
	$NOOB['items'] = select(
        "id,file,fecha_creacion"
        ,"marcas2"
        ,"where visibilidad='1' order by id asc limit 0,100"
        ,0
        ,array(              
                'carpeta'=>'mar2_imas'
                ,'tamano'=>'2'
                ,'dimensionado'=>'170x145'
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
				,'nom'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
										)				
				,'link'=>array('procesar_url'=>array(
											'url'=>'index.php?modulo=item&tab=productos&id={nom}'
											)
										)
				,'nombre'=>array('strtoupper'=>array(
											'string'=>'{nombre}'
											)
										)											            	    
    			,'alt'=>'{nombre}'				
				,'title'=>'{nombre}'
				
				
              )
        );
				
	$NOODSLICE['marcas2']=web_render_slider_preproceso($NOOB);		
	
?>