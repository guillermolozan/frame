<?php //á

	
$LISTA = paginacionnumerada(
        array(
            'separador'=>""
            ,'porpag'=>"0"
            ,'anterior'=>"«".$lang['anterior']
            ,'siguiente'=>$lang['siguiente']."»"
            ,'enlace'=>"index.php?modulo=items&tab=fotos_albumes&pag="
			,'procesar_url'=>"1"
            //,'onclick'=>"?pag="
        )
		,"id,nombre"
        ,"fotos_grupos"
        ,"where 1  and  visibilidad='1' $order_by "
        ,0
        ,array(
        	'foto'=>array('sub_select_fila'=>array(
													'campos'=>"nombre,file,fecha_creacion"
													,'tabla' =>"fotos_items"
													,'donde' =>"where id_grupo='{id}' and visibilidad='1' order by id asc limit 0,1"
													,'debug' =>0
													,'opciones'=>array(
																		'carpeta'=>'prodite_imas'
																		,'tamano'=>'2'
																		,'dimensionado'=>'80x80'
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
																			
															
																	  )													
															)
												 )      	    

			  ,'link'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=fotos&id={id}&friendly={nombre}"))
			  							
              )
        );
		

$_GET['id']=($_GET['id'])?$_GET['id']:$LISTA['filas'][0]['id'];

$_GET['friendly']=($_GET['friendly'])?$_GET['friendly']:$LISTA['filas'][0]['nombre'];

//prin($LISTA);

$LISTA['vacio']  = "todavía no hay noticias publicadas";

$LISTA['titulo'] = "Noticias";

//$LISTA['menu'] = $MENU_FILTROS;

$LISTADO[$PARAMS['conector']]=$LISTA;


?>