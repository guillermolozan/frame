<?php //á

require_once('class.phpmailer.php');


chdir("../");
//include("lib/includes.php");
	include("lib/global.php");	
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");	
	include("config/tablas.php");
//	include("lib/sesion.php");	
	include("lib/playmemory.php");
	
	require_once( "lib/ini_manager.php" );
	
	$id_campain=$_GET['id'];

chdir("base2");

set_time_limit(0);

	$campain_datos = select_fila(
			"id,nombre,asunto,fronname,replayto,enviar_texto,enviar_firma,texto,file,publicado,n_solicitados,n_enviados,n_leidos,n_linkeados,fecha_creacion"
			,"campains"
			,"where id='".$id_campain."' "
			,0
			,array(          
					'carpeta'=>'camp_imas'
					,'tamano'=>'2'
					,'dimensionado'=>'800x10000'
					,'centrado'=>'0'
					,'get_atributos'=>array('get_atributos'=>array(
												'carpeta'=>'{carpeta}'
												,'fecha'=>'{fecha_creacion}'
												,'file'=>'{file}'
												,'tamano'=>'{tamano}'
												,'dimensionado'=>'{dimensionado}'
												,'centrado'=>'{centrado}'
												)
											)
					,'get_archivo'=>array('get_archivo'=>array(
												'carpeta'=>'{carpeta}'
												,'fecha'=>'{fecha_creacion}'
												,'file'=>'{file}'
												,'tamano'=>'{tamano}'
												)
											)
					,'bloques'=>array('sub_select'=>array(
												'campos'=>"id,id_grupo,file,link,fecha_creacion,bloque"
												,'tabla' =>"campains_fotos"
												,'donde' =>"where id_grupo='{id}' and visibilidad=1 order by id asc"
												,'debug' =>0
												,'opciones'=>array(
													'carpeta'=>'camfot_imas'
													,'dimensionado'=>'400x500'
													,'centrado'=>'0'
													,'get_atributos'=>array('get_atributos'=>array(
																				'carpeta'=>'{carpeta}'
																				,'fecha'=>'{fecha_creacion}'
																				,'file'=>'{file}'
																				,'tamano'=>'{tamano}'
																				,'dimensionado'=>'{dimensionado}'
																				,'centrado'=>'{centrado}'
																				)
																			)
													,'get_archivo_3'=>array('get_archivo'=>array(
																				'carpeta'=>'{carpeta}'
																				,'fecha'=>'{fecha_creacion}'
																				,'file'=>'{file}'
																				,'tamano'=>'3'
																				)
																			)	
													,'get_archivo_2'=>array('get_archivo'=>array(
																				'carpeta'=>'{carpeta}'
																				,'fecha'=>'{fecha_creacion}'
																				,'file'=>'{file}'
																				,'tamano'=>'2'
																				)
																			)																															
												)
											  )
										)
										
					  )   		
			);	


//prin($campain_datos);
//$campain_datos['enviar_texto']=0;

$NINGUN_TEXTO=true;

echo makeHtml($campain_datos,$email);	
				
function makeHtml($campain,$email){

global $NINGUN_TEXTO;
global $SERVER;
global $ENABLED;

$Array_Meses1=array(1=>"enero","febrero","marzo","abril","mayo","junio","julio","agosto","setiembre","octubre","noviembre","diciembre");
$unix=date("U");

$html='';
$html.='<body  topmargin="0" marginheight="0" ><table width="850" height="100%" border="0" cellpadding="0" cellspacing="0"><tr><td>';

if(!$NINGUN_TEXTO){
	//Saludo
	if($email['email']['nombre']!=''){ 
		$html.='Hola '.ucwords($email['email']['nombre'])."<br><br>"; 
	} else {
		$html.="Estimado(a) Amigo(a)<br><br>";
	}
	//
	if($campain['enviar_texto']){
	//	$html.="<br><br>Lima, Perú " . ( date("j",$unix)." de ".ucfirst($Array_Meses1[date("n",$unix)])." de ".date("Y",$unix) ) . "<br><br>";
		$html.=utf8_decode($campain['texto']);
		$html.='<br />';
	} else {
		$html.="La siguiente Información podría ser de su interés:<br><br>";
	}

}

$html.='<table border="0" align="center" cellpadding="0" cellspacing="0"><tr><td  valign="top"><table  border="0" cellspacing="0" cellpadding="0">';

if(!$NINGUN_TEXTO){

$html.='<tr><td height="23" style="font-family:Arial, Helvetica, sans-serif;font-size:12px" colspan="2">						
			<div align="center">
			si no puede visualizar este mensaje, 
        	<a href="'.$SERVER['BASE'].'show.php?id='.$campain['id'].'">pulse aqu&iacute;</a>
        	</div>
			</td></tr>';

}			
if($campain['file']){
	$html.='<tr><td colspan="2">
				<img src="'.$campain['get_archivo'].'"  border="0"/>
			</td></tr>';
}
			if(sizeof($campain['bloques'])>0){
				$ttt=0;
				foreach($campain['bloques'] as $t=>$bloque){
					
					if($bloque['bloque']=='2'){	

						if($ttt==0){ $html.='<tr>'; }
						$html.='<td>';
						if(trim($bloque['link'])!=''){ $html.='<a href="'.$bloque['link'].'">'; }
						$html.='<img src="'.$bloque['get_archivo_2'].'"  border="0"/>';
						if(trim($bloque['link'])!=''){ $html.='</a>'; }
						$html.='</td>';
						//if($ttt%2==1 or $t==sizeof($campain['bloques'])-1){ $html.='</tr>'; }
						if($ttt==1){ $html.='</tr>'; }
												
						if($ttt==1){ $ttt=0; } else { $ttt=1; }

					} elseif($bloque['bloque']=='1') {
						
						if($ttt==1){ $html.='</tr>'; $ttt=0; }
						
						$html.='<tr>';
						$html.='<td colspan="2">';
						if(trim($bloque['link'])!=''){ $html.='<a href="'.$bloque['link'].'">'; }
						$html.='<img src="'.$bloque['get_archivo_3'].'"  border="0"/>';
						if(trim($bloque['link'])!=''){ $html.='</a>'; }
						$html.='</td>';
						$html.='</tr>';		
					}
				
				}
				//if($campain['enviar_firma']!='0'){
				$html.='<tr><td colspan="2">
					<a href="http://calandriatravel.com"><img src="http://calandriatravel.com/panel/base2/pieflyer.jpg"  border="0"/></a>
				</td></tr>';			
				//}
			}
$html.='</table>
		</td></tr></table>';
if(!$NINGUN_TEXTO){		
$html.='<table  border="0" align="center" cellpadding="0" cellspacing="0"><tr><td height="144">';
$html.='<table width="100%" height="150" border="0" cellpadding="0" cellspacing="0"><tr><td  height="150" style="font-family:Arial, Helvetica, sans-serif;font-size:11px">
			  <div align="center">Si nuestra publicidad le ha sido remitida por error o no resulta de su inter&eacute;s y no desea recibirla m&aacute;s, le agradeceremos hacer click <a href="http://calandriatravel.com/panel/base2/exclusiones.php?bloquear='.$email['email']['address'].'">aqu&iacute;</a> y especificar su email. El presente e-mail respeta las normas del ART 5 de la <br />
LEY 28493 Ley que regula el uso de correo electr&oacute;nico comercial no solicitado (SPAM) publicado en el diario oficial <br />
El Peruano el 12 de abril del 2005<br/>
<br/></div>
			</td></tr></table>';
$html.=	 '</td></tr></table> ';
}
$html.=  '</td></tr></table>';
$html.= '</body>
<img width="1" height="1" src="'.$SERVER['BASE'].'open.php?id='.$email['id'].'&id2='.$email['email']['id'].'" style="display:" />
';
return $html;

}		

?>