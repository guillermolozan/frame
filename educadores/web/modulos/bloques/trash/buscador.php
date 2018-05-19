<?php //á

/**********************************************/
//////////////buscador.php/////////////////
/**********************************************/


$BUSCADOR['tipos'] = select(
        "id,nombre"
        ,"productos_grupos"
        ,"where 1 and  visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
			'id'=>array('url_encode_seo'=>array(
			  							'string'=>'{nombre}'
			  							)
			 			   )
			,'selected'=>array('match'=>array(
			  							'a'=>'{id}'
										,'b'=>$_GET['tipo']
										,'equal'=>'selected'
										,'else'=>''
			  							)
			 			   )						   
			)	        
		);

$BUSCADOR['departamentos'] = select(
        "id,nombre"
        ,"geo_departamentos"
        ,"where 1 and  visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
			'id'=>array('url_encode_seo'=>array(
			  							'string'=>'{nombre}'
			  							)
			 			   )
			,'selected'=>array('match'=>array(
			  							'a'=>'{id}'
										,'b'=>$_GET['departamento']
										,'equal'=>'selected'
										,'else'=>''
			  							)
			 			   )						   
			)	  		
        );

if($_GET['departamento']!=''){		
$ID=select_dato("id","geo_departamentos","where nombre='".url_decode_seo($_GET['departamento'])."'");
$BUSCADOR['provincias'] = select(
        "id,nombre"
        ,"geo_provincias"
        ,"where id_departamento='".$ID."' and visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
			'id'=>array('url_encode_seo'=>array(
			  							'string'=>'{nombre}'
			  							)
			 			   )
			,'selected'=>array('match'=>array(
			  							'a'=>'{id}'
										,'b'=>$_GET['provincia']
										,'equal'=>'selected'
										,'else'=>''
			  							)
			 			   )						   
			)	  		
        );	
}			
		
if($_GET['provincia']!=''){		
$ID=select_dato("id","geo_provincias","where nombre='".url_decode_seo($_GET['provincia'])."'");
$BUSCADOR['distritos'] = select(
        "id,nombre"
        ,"geo_distritos"
        ,"where id_provincia='".$ID."' and  visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
			'id'=>array('url_encode_seo'=>array(
			  							'string'=>'{nombre}'
			  							)
			 			   )
			,'selected'=>array('match'=>array(
			  							'a'=>'{id}'
										,'b'=>$_GET['distrito']
										,'equal'=>'selected'
										,'else'=>''
			  							)
			 			   )
			)				  		
        );		
}
		
//prin($BUSCADOR['distritos']);		
?>		