<?php //á

$THIS=$PARAMS['this'];
$object=array();
/************************************************/
/*********         FOOTER          **************/
/************************************************/
				
$object=array(
		'by'=>"by <a href='http://prodiserv.com' title='Diseño y Desarrollo'>Prodiserv</a>",
		'info'=>array(
				//'direccion'=>$COMMON['datos']['direccion_publica'],
				'contacto'=>"Email <a href='mailto:".$COMMON['datos']['emails_publicos']."'>".$COMMON['datos']['emails_publicos']."</a>",
				//'telefonos'=>"Teléfonos ".$COMMON['datos']['telefonos_publicos'],
				//'copy'=>strtoupper($COMMON['datos_root']['nombre_empresa'])." &reg; ".date("Y")." Copyright Todos los Derechos Reservados",
				//'copy'=>"&reg; ".date("Y")." - ".( strtoupper($COMMON['datos_root']['nombre_empresa']) )." - Lima - Perú - Todos los derechos reservados",				
				'copy'=>"&reg; ".date("Y")." - ".( strtoupper($COMMON['datos_root']['nombre_empresa']) )." - Todos los derechos reservados",				
				),
			);

/*

$object['menu']=array_merge($COMMON['menu'],array(
												array(
														'url'	=>'index.php?modulo=formularios&tab=compre_en_usa'
														,'label'=>'Compre en USA'	
													)
												,array(
														'url'	=>'index.php?modulo=formularios&tab=compre_en_lima'
														,'label'=>'Compre en Lima'	
													)
												,array(
														'url'	=>'index.php?modulo=formularios&tab=compramos_por_ti'
														,'label'=>'Compramos por Ti'
													)
												,array(
														'url'	=>'index.php?modulo=app&tab=pages&page=compre-en-nuestra-tienda'
														,'label'=>'Compre en Nuestra Tienda'
													)
											)
										);
*/			
			
$OBJECT[$THIS]=$object;

?>