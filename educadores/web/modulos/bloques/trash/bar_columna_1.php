<?php //á

/*ESQUINAS*/

$HEAD['INCLUDES']['css'][]='css/bloques/bloque_cuadro_4/css.css';

/*BARRAS COLUMNA 1*/

	/*ESCTRUCTURA DE BLOQUES*/

	$HEAD['INCLUDES']['style'][]='#bloque_nuestras_marcas .div_borde ,#bloque_publicidad .div_borde {  min-height:0px; }';	
	$HEAD['INCLUDES']['style'][]='#bloque_nuestras_marcas { height: 189px !important; }';
	$HEAD['INCLUDES']['style'][]='#bloque_publicidad { height: 214px !important; }';

/*BLOQUE MARCAS*/

	$HEAD['INCLUDES']['style'][]='#bloque_nuestras_marcas_elemento_0 { float:left;margin:0px 0px 0px 15px;  }';
	
	$NOOB=array(
			'label'=>'marcas',	
			'width'=>"170",
			'height'=>"145",
			'itemsporpagina'=>"1x1",
			'vacio'=>"aún no hay marcas",
			'titulo'=>"",	
			'autoplay'=>"true",//[true,false]
			'mode'=>"vertical", //[horizontal,vertical]	
			'buttons'=>"0"
			);
	
	$NOOB['items'] = select(
        "id,file,fecha_creacion"
        ,"marcas"
        ,"where visibilidad='1' order by id asc limit 0,100"
        ,0
        ,array(              
                'carpeta'=>'mar_imas'
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
				
	$NOODSLICE['marcas']=web_render_slider_preproceso($NOOB);		
	
		
/*BLOQUE MARCAS2*/


	$HEAD['INCLUDES']['style'][]='#bloque_nuestras_marcas2_elemento_0 { float:left;margin:0px 0px 0px 15px;  }';
	
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
	
	
//	web_render_swf("publicidad.swf","bloque_publicidad_elemento_1","","198x175");
	
	
	
?>