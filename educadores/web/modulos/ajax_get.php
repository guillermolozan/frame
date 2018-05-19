<?php //á
switch($_GET['get']){
case "modelos":
$items= select(
        "id as i,nombre as n"
        ,"modelos"
        ,"where id_marca='".$_GET['id']."' and  visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(		
			'n'=>array('ucfirst'=>array(
			  							'string'=>'{n}'
			  							)
			 			   )
			)			 
        );
//prin($items);		
echo json_encode($items);		
break;
case "subcategorias":
$ID=select_dato("id","productos_grupos","where nombre='".url_decode_seo($_GET['id'])."'");
$items= select(
        "id as i,nombre as n"
        ,"productos_subgrupos"
        ,"where id_grupo='".$ID."' and  visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
			'i'=>array('url_encode_seo'=>array(
			  							'string'=>'{n}'
			  							)
			 			   )		
			,'n'=>array('ucfirst'=>array(
			  							'string'=>'{n}'
			  							)
			 			   )
			)			 
        );
//prin($items);		
echo json_encode($items);		
break;
case "provincias":
$items= select(
        "id as i,nombre as n"
        ,"geo_provincias"
        ,"where id_departamento='".$_GET['id']."' and  visibilidad='1' order by id asc limit 0,100"
        ,0	 
        );
//prin($items);		
echo json_encode($items);		
break;
case "distritos":
$items= select(
        "id as i,nombre as n"
        ,"geo_distritos"
        ,"where id_provincia='".$_GET['id']."' and  visibilidad='1' order by id asc limit 0,100"
        ,0				
        );
echo json_encode($items);
break;
case "shipping":
$item= select_fila(
        "id as i,nombre as n,shipping as s"
        ,"geo_distritos"
        ,"where id='".$_GET['id']."' "
        ,0			
        );
echo json_encode($item);
break;
case "contar":
$num= contar(
        $_GET['t']
        ,"where ".$_GET['w']."='".$_GET['v']."'"
        ,0				
        );
echo json_encode(array('n'=>$num));
break;
}

?>