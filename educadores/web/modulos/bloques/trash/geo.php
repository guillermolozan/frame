<?php //á

$BASE_PAIS_CATEGORIAS="index.php?modulo=pagina-items&tab=categorias";

if($_GET['id_distrito']!=''){

$PARAM_GEO='&id_departamento='.$_GET['id_departamento'].'&id_provincia='.$_GET['id_provincia'].'&id_distrito='.$_GET['id_distrito'];

$BASE_URL=$BASE_PAIS_CATEGORIAS."&id_departamento=".$_GET['id_departamento']."&id_provincia=".$_GET['id_provincia'];

$id_provincia = select_dato("id_provincia","geo_distritos","where nombre='".url_decode_seo($_GET['id_distrito'])."'",0);

$nombre_departamento = url_decode_seo($_GET['id_departamento']);
$nombre_provincia = url_decode_seo($_GET['id_provincia']);
$nombre_distrito = url_decode_seo($_GET['id_distrito']);


$ITEMS['geos']['titulo']='Seleccione un distrito';
$ITEMS['geos']['path']='<a href="'.$BASE_PAIS_CATEGORIAS.'">Perú</a> >>
					    <a href="'.$BASE_PAIS_CATEGORIAS.'&id_departamento='.$_GET['id_departamento'].'">'.$nombre_departamento.'</a> >>
					    <a href="'.$BASE_PAIS_CATEGORIAS.'&id_departamento='.$_GET['id_departamento'].'&id_provincia='.$_GET['id_provincia'].'">'.$nombre_provincia.'</a> >>
					    <a href="'.$BASE_PAIS_CATEGORIAS.'&id_departamento='.$_GET['id_departamento'].'&id_provincia='.$_GET['id_provincia'].'&id_distrito='.$_GET['id_distrito'].'">'.$nombre_distrito.'</a>
					   ';
$ITEMS['geos']['items'] = select(
        "id,nombre"
        ,"geo_distritos"
        ,"where 1 and id_provincia='".$id_provincia."' and visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
				'id'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
							   )		
				,'link'=>array('procesar_url'=>array(
											'url'=>$BASE_URL.'&id_distrito={id}'
											)
										)		
			)			
        );
} elseif($_GET['id_provincia']!=''){

$PARAM_GEO='&id_departamento='.$_GET['id_departamento'].'&id_provincia='.$_GET['id_provincia'];

$BASE_URL=$BASE_PAIS_CATEGORIAS."&id_departamento=".$_GET['id_departamento']."&id_provincia=".$_GET['id_provincia'];

$nombre_departamento = url_decode_seo($_GET['id_departamento']);
$nombre_provincia = url_decode_seo($_GET['id_provincia']);

$id_provincia = select_dato("id","geo_provincias","where nombre='".url_decode_seo($_GET['id_provincia'])."'",0);


$ITEMS['geos']['titulo']='Seleccione un distrito';
$ITEMS['geos']['path']='<a href="'.$BASE_PAIS_CATEGORIAS.'">Perú</a> >>
					    <a href="'.$BASE_PAIS_CATEGORIAS.'&id_departamento='.$_GET['id_departamento'].'">'.$nombre_departamento.'</a> >>
					    <a href="'.$BASE_PAIS_CATEGORIAS.'&id_departamento='.$_GET['id_departamento'].'&id_provincia='.$_GET['id_provincia'].'">'.$nombre_provincia.'</a>
					   ';
$ITEMS['geos']['items'] = select(
        "id,nombre"
        ,"geo_distritos"
        ,"where 1 and id_provincia='".$id_provincia."' and visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
				'id'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
							   )		
				,'link'=>array('procesar_url'=>array(
											'url'=>$BASE_URL.'&id_distrito={id}'
											)
										)		
			)		
        );
} elseif($_GET['id_departamento']!=''){

$PARAM_GEO='&id_departamento='.$_GET['id_departamento'];

$BASE_URL=$BASE_PAIS_CATEGORIAS."&id_departamento=".$_GET['id_departamento'];

$nombre_departamento = url_decode_seo($_GET['id_departamento']);

$id_departamento = select_dato("id","geo_departamentos","where nombre='".url_decode_seo($_GET['id_departamento'])."'",0);

$ITEMS['geos']['titulo']='Seleccione una provincia';
$ITEMS['geos']['path']='<a href="'.$BASE_PAIS_CATEGORIAS.'">Perú</a> >>
					    <a href="'.$BASE_PAIS_CATEGORIAS.'&id_departamento='.$_GET['id_departamento'].'">'.$nombre_departamento.'</a>
					   ';
$ITEMS['geos']['items'] = select(
        "id,nombre"
        ,"geo_provincias"
        ,"where 1 and id_departamento='".$id_departamento."' and visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
				'id'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
							   )		
				,'link'=>array('procesar_url'=>array(
											'url'=>$BASE_URL.'&id_provincia={id}'
											)
										)		
			)			
        );
} else {

$PARAM_GEO='';

$BASE_URL=$BASE_PAIS_CATEGORIAS;

$ITEMS['geos']['path']='<a href="'.$BASE_URL.'">Perú</a>';
$ITEMS['geos']['titulo']='Seleccione un departamento';
$ITEMS['geos']['items'] = select(
        "id,nombre"
        ,"geo_departamentos"
        ,"where 1 and  visibilidad='1' order by id asc limit 0,100"
        ,0
		,array(
				'id'=>array('url_encode_seo'=>array(
											'string'=>'{nombre}'
											)
							   )		
				,'link'=>array('procesar_url'=>array(
											'url'=>$BASE_URL.'&id_departamento={id}'
											)
										)		
			)		
        );



		
}		

?>		