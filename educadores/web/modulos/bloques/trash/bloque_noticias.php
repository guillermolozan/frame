<?php //á

$LISTA = paginacionnumerada(
        array(
            'separador'=>""
            ,'porpag'=>"0"
            ,'anterior'=>"«anterior"
            ,'siguiente'=>"siguiente»"
            ,'enlace'=>"index.php?modulo=items&tab=noticias&pag="
            ,'procesar_url'=>1
            //,'onclick'=>"?pag="
        )
        ,"id,titulo,fecha,texto"
        ,"noticias"
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

			    ,'link'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=noticias&id={id}&friendly={titulo}"))

			)							
        );		


$_GET['id']=($_GET['id'])?$_GET['id']:$LISTA['filas'][0]['id'];

//prin($LISTA);

$LISTA['vacio']  = "aún no hay noticias publicadas";

$LISTA['titulo'] = "Actualidad";

//$LISTA['menu'] = $MENU_FILTROS;

$LISTADO[$PARAMS['conector']]=$LISTA;

	
?>