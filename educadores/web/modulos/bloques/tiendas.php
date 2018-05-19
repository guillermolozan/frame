<?php //á

$contar_usa=contar("tiendas_items","where 1 and visibilidad='1' and ubicacion='2'");					
$usa=ceil($contar_usa/10);

for($i=0;$i<$usa;$i++){
$a=$i*10;	
$item['nombre']='Tiendas en USA';
$item['sub_select']= select(
        "id,id_grupo,file,nombre as foto_descripcion,fecha_creacion,url as link"
        ,"tiendas_items"
        ,"where 1 and visibilidad='1' and ubicacion='2' order by id asc limit $a,10"
        ,0
        ,array(
        	               
                'carpeta'=>'fottie_imas'
                ,'tamano'=>'2'
                ,'dimensionado'=>'146x34'
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
        );
		
$items2[]=$item;
}




$contar_lima=contar("tiendas_items","where 1 and visibilidad='1' and ubicacion='1'");
$lima=ceil($contar_lima/10);

for($i=0;$i<$lima;$i++){
$a=$i*10;	
$item['nombre']='Tiendas en Lima';
$item['sub_select']= select(
        "id,id_grupo,file,nombre as foto_descripcion,fecha_creacion,url as link"
        ,"tiendas_items"
        ,"where 1 and  visibilidad='1' and  ubicacion='1' order by id asc limit $a,10"
        ,0
        ,array(
        	               
                'carpeta'=>'fottie_imas'
                ,'tamano'=>'2'
                ,'dimensionado'=>'146x34'
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
        );
		
$items2[]=$item;
}

$items[0]=$items2;

//prin(sizeof($items2));

//prin($items[0]['sub_select']);		
		
	$NOOB=array(
			'label'=>$PARAMS['conector'],	
			'width'=>"146",
			'height'=>"440",
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
		$noobst['label']	= $NOOB['label'];
		$noobst['titulo']	= "Tiendas";
		$noobst['interval']	= 10000;
		$noobst['items']	= $filas;
		$NOOB_S[]			= web_render_slider_preproceso($noobst);		
		
	}

	$NOODSLICE[$PARAMS['conector']]=$NOOB_S;

	$REMOOZZ=1;	
	//$SEXYLIGHTBOX=1;
		
?>