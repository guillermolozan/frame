<?php //á


chdir("../");
include("lib/include_base.php");

$item = select_fila(
        "id,id_grupo,id_subgrupo,id_filtro"
        ,"productos_items"
        ,"where id='".$_GET['id']."'"
        ,0
        ,array(
        	'grupo'=>array('sub_select_dato'=>array(
                			    		'campo'=>"nombre"
                                	    ,'tabla' =>"productos_grupos"
                                	    ,'donde' =>"where id='{id_grupo}'"
                                       	    ,'debug' =>0
                                            )
                                        ),
        	'subgrupo'=>array('sub_select_dato'=>array(
                			    		'campo'=>"nombre"
                                	    ,'tabla' =>"productos_subgrupos"
                                	    ,'donde' =>"where id='{id_subgrupo}'"
                                       	    ,'debug' =>0
                                            )
                                        ),
        	'filtro'=>array('sub_select_dato'=>array(
                			    		'campo'=>"nombre"
                                	    ,'tabla' =>"productos_filtros"
                                	    ,'donde' =>"where id='{id_filtro}'"
                                       	    ,'debug' =>0
                                            )
                                        )  										  
    
              )
        );


	
	update(
			array(	'tags'=>$item['grupo'].",".$item['subgrupo'].",".$item['filtro']
				  )
			  ,"productos_items"
			  ,"where id='".$_GET['id']."'"
			  ,0
			);			



?>