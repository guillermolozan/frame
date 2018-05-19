<?php //á

/**********************************************/
//////////////////////INCLUDES//////////////////
/**********************************************/

$HEAD['INCLUDES']['js'][]='js/mootools-1.2.3.1-more.js';
$HEAD['INCLUDES']['js'][]='js/_class.noobSlide.packed.js';

/**********************************************/
/////////////home_bloque_banner2.php//////////////
/**********************************************/

//////////////////////////////////////////////////
/////////////////////*OFERTAS*////////////////////
//////////////////////////////////////////////////

	if(
		(in_array($_GET['modulo'],array("home"))) 
	){	
	
	$Nombre="ofertas";
	$NOODSLICE[$Nombre]['label']=$Nombre;	
	$NOODSLICE[$Nombre]['width']="290";
	$NOODSLICE[$Nombre]['height']="185";
	$NOODSLICE[$Nombre]['autoplay']="false";//[true,false]
	$NOODSLICE[$Nombre]['itemsporpagina']="2";
	$NOODSLICE[$Nombre]['modosubbloque']="columnas"; //[filas,columnas]
	$NOODSLICE[$Nombre]['mode']="horizontal"; //[horizontal,vertical]	
	$NOODSLICE[$Nombre]['buttons']="1";
	$NOODSLICE[$Nombre]['vacio']="aún no hay ofertas";
		
	$NOODSLICE[$Nombre]['items'] = select(
        "id,id_grupo,nombre,base,home,recomendado,oferta,descripcion,precio,file,foto_descripcion,fecha_creacion"
        ,"productos_items"
        ,"where oferta='1' and  visibilidad='1' order by id asc limit 0,100"
        ,0
        ,array(              
                'carpeta'=>'prodite_imas'
                ,'tamano'=>'2'
                ,'dimensionado'=>'137x117'
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
		
	$NOODSLICE[$Nombre]['width_bloque']=($NOODSLICE[$Nombre]['modosubbloque']=='columnas')?intval($NOODSLICE[$Nombre]['width']/$NOODSLICE[$Nombre]['itemsporpagina']):$NOODSLICE[$Nombre]['width'];
	$NOODSLICE[$Nombre]['height_bloque']=($NOODSLICE[$Nombre]['modosubbloque']=='filas')?intval($NOODSLICE[$Nombre]['height']/$NOODSLICE[$Nombre]['itemsporpagina']):$NOODSLICE[$Nombre]['height'];			
	
	}
	
/////////////////////////////////////////////////////////////	
/////////////////////////*RECOMENDADOS*//////////////////////
/////////////////////////////////////////////////////////////

	if(
		(in_array($_GET['modulo'],array("home","item","pagina-app","pagina-formulario"))) 
	){	
	
	$Nombre="recomendados";
	$NOODSLICE[$Nombre]['label']=$Nombre;	
	if($_GET['modulo']=='home'){
		$NOODSLICE[$Nombre]['width']="204";
		$NOODSLICE[$Nombre]['itemsporpagina']="1";
	} else {
		$NOODSLICE[$Nombre]['width']="288";	
		$NOODSLICE[$Nombre]['itemsporpagina']="2";
	}
	
	$sql_parte="recomendado='1'";		
	$NOODSLICE[$Nombre]['vacio']="aún no hay recomendados";
	$NOODSLICE[$Nombre]['titulo']="Te recomendamos";
	if($_GET['modulo']=='home' and $GET_ID_GRUPO!='' ){
		$sql_parte=" recomendado_grupo='1' and id_grupo='".$GET_ID_GRUPO."' ";		
		$NOODSLICE[$Nombre]['vacio']="aún no hay recomendados para esta categoría";
		$NOODSLICE[$Nombre]['titulo']="Te recomendamos en ". $dato = ucfirst(select_dato("nombre","productos_grupos","where id='".$GET_ID_GRUPO."'",0));
	}
	if($_GET['modulo']=='item' and $ITEM['datos']['id_grupo']!='' ){
		$sql_parte=" recomendado_grupo='1' and id_grupo='".$ITEM['datos']['id_grupo']."' ";		
		$NOODSLICE[$Nombre]['vacio']="aún no hay recomendados para esta categoría";				
		$NOODSLICE[$Nombre]['titulo']="Te recomendamos en ".$dato = ucfirst(select_dato("nombre","productos_grupos","where id='".$ITEM['datos']['id_grupo']."'",0));		
	}	
	
	$NOODSLICE[$Nombre]['height']="140";
	$NOODSLICE[$Nombre]['autoplay']="false";//[true,false]
	$NOODSLICE[$Nombre]['modosubbloque']="columnas"; //[filas,columnas]
	$NOODSLICE[$Nombre]['mode']="horizontal"; //[horizontal,vertical]	
	$NOODSLICE[$Nombre]['buttons']="1";
		
	$NOODSLICE[$Nombre]['items'] = select(
        "id,id_grupo,nombre,base,home,recomendado,oferta,descripcion,precio,file,foto_descripcion,fecha_creacion"
        ,"productos_items"
        ,"where $sql_parte and  visibilidad='1' order by id asc limit 0,100"
        ,0
        ,array(              
                'carpeta'=>'prodite_imas'
                ,'tamano'=>'2'
                ,'dimensionado'=>'137x117'
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
		
	$NOODSLICE[$Nombre]['width_bloque']=($NOODSLICE[$Nombre]['modosubbloque']=='columnas')?intval($NOODSLICE[$Nombre]['width']/$NOODSLICE[$Nombre]['itemsporpagina']):$NOODSLICE[$Nombre]['width'];
	$NOODSLICE[$Nombre]['height_bloque']=($NOODSLICE[$Nombre]['modosubbloque']=='filas')?intval($NOODSLICE[$Nombre]['height']/$NOODSLICE[$Nombre]['itemsporpagina']):$NOODSLICE[$Nombre]['height'];	


	}
		
?>