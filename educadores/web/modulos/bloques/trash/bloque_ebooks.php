<?php //á

$LISTA = paginacionnumerada(
        array(
            'separador'=>""
            ,'porpag'=>"0"
            ,'anterior'=>"«anterior"
            ,'siguiente'=>"siguiente»"
            ,'enlace'=>"index.php?modulo=items&tab=ebooks&pag="
            ,'procesar_url'=>1
            //,'onclick'=>"?pag="
        )
        ,"id,titulo,fecha,texto"
        ,"ebooks"
        ,"where 1 and  visibilidad='1' order by id asc"
        ,0
        ,array(
				'fecha'=>array('fecha_formato'=>array(
											'fecha'=>'{fecha}'
											,'formato'=>'6'
											)
										)
                ,'titulo'=>array('limit_string'=>array(
                                            'string'=>'{titulo}'
                                            ,'limit'=>'77'
                                            )
                                        )
                ,'texto'=>array('limit_string'=>array(
                                            'string'=>'{texto}'
                                            ,'limit'=>'120'
                                            )
                                        )
			    ,'link'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=ebooks&id={id}&friendly={titulo}"))
				
			)							
        );		


$_GET['id']=($_GET['id'])?$_GET['id']:$LISTA['filas'][0]['id'];

//prin($LISTA);

$LISTA['vacio']  = $VACIO;

$LISTA['titulo'] = "E-books";

//$LISTA['menu'] = $MENU_FILTROS;

$LISTADO[$PARAMS['conector']]=$LISTA;

	
?>