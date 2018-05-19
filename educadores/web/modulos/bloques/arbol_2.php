<?php //á
//prin ($PARAMS);

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];

$object=array();

	$ID=($_GET['tab']=='textos_items2')?$_GET['id']:'';

	$gru['menu']=array(
			array(
				'nombre'=>'Seguimiento de envios',
				'nivel'=>'menu_nivel_1',
				'url'=>procesar_url("index.php?sec=".$_GET['sec']."&modulo=app&tab=seguimiento_envios"),
			),
			array(
				'nombre'=>'Programe Sus Recojos',
				'nivel'=>'menu_nivel_1',
				'url'=>procesar_url("index.php?sec=".$_GET['sec']."&modulo=app&tab=programe_sus_recojos"),
			),
			);
	switch($_GET['sec']){
	case "olvacarga":			
	$gru['menu'][]=array(
				'nombre'=>'Cotizaciones',
				'nivel'=>'menu_nivel_1',
				'url'=>procesar_url("index.php?sec=olvacarga&modulo=formularios&tab=cotizaciones_olvacarga"),
				);
	break;
	case "olvaexportimport":			
	$gru['menu'][]=array(
				'nombre'=>'Cotizaciones',
				'nivel'=>'menu_nivel_1',
				'url'=>procesar_url("index.php?sec=olvaexportimport&modulo=formularios&tab=cotizaciones_olvaexportimport"),
				);
	break;
	case "olvati":			
	$gru['menu'][]=array(
				'nombre'=>'Cotizaciones',
				'nivel'=>'menu_nivel_1',
				'url'=>procesar_url("index.php?sec=olvati&modulo=formularios&tab=cotizaciones_olvati"),
				);
	break;
	default:			
	$gru['menu'][]=array(
				'nombre'=>'Cotizaciones',
				'nivel'=>'menu_nivel_1',
				'url'=>procesar_url("index.php?sec=olvacourier&modulo=formularios&tab=cotizaciones"),
				);
	break;			
	}
	$gru['menu'][]=array(
				'nombre'=>'Herramientas',
				'nivel'=>'menu_nivel_1',
				'url'=>procesar_url("index.php?sec=".$_GET['sec']."&modulo=app&tab=herramientas"),
				);
	$gru['menu'][]=array(
				'nombre'=>'Nuestras 283 Oficinas',
				'nivel'=>'menu_nivel_1',
				'url'=>'http://www.olvacourier.com/infoweb/oficinas.php ',
				);
	$gru['menu'][]=array(
				'nombre'=>'Oficinas en el Extranjero',
				'nivel'=>'menu_nivel_1',
				'url'=>'http://www.olva.com.pe/infoweb/ofic_inter.php',													
				);
	if($_GET['sec']=='olvacarga'){
		$gru['menu'][]=array(
					'nombre'=>'Intranet',
					'nivel'=>'menu_nivel_1',
					'url'=>procesar_url("index.php?sec=olvacarga&modulo=app&tab=intranet"),
					);		
	}
			
	$gru['menu']=pre_procesar_tree($gru['menu'],$SERVER['URL']);

	$gru['header']['nombre']='Centro Informativo';
	
	$object['items'][]=$gru; unset($gru);
	


$object['panel']='TEXTOS_ITEMS2';

$object['styles']='arbol_2,olvacarga_arbol_2';

$object['classStyle']=($_GET['sec']=='olvacarga' or $_GET['sec']=='olvati')?'olvacarga_arbol_2':'arbol_2';
//$ITEMS['items']=array($ITEMS['items'][1]);
//prin($ITEMS);

$OBJECT[$PARAMS['this']]=$object; 
	
?>