<?php //á

$COMODIN_PROPUESTA='<tr><td colspan=3 height=1 style="font-size:1px;">UNO DOS TRES CUATRO</td></tr>';
//include("../formulario_campos.php");

	$Cambio[1][2]=(1/2.9);		// de dolares a soles
	$Cambio[2][1]=2.8;  			// de soles a dolares

	$Simbolos=array(
		 1=>'$'		//dolares
		,2=>'S/.'   //soles
	);	
	$Monedas=array(
		'dolares'=>'1'	//dolares
		,'soles'=>'2'	//soles
	);
	$MonedasLabel=array(
		'dolares'=>'Dólares Americanos'	//dolares
		,'soles'=>'Nuevos Soles'	//soles
	);
	

	
	$LabelHabitacion=array(
		'preciospl'=>'Habitación Simple'
		,'preciosplna'=>'NA'
		,'preciodbl'=>'Adulto'
		,'preciodblna'=>'NA'
		,'preciotpl'=>'Habitación Triple'
		,'preciotplna'=>'NA'
		,'preciocpl'=>'Habitación Cuadruple'
		,'preciocplna'=>'NA'
		,'precioqpl'=>'Habitación Quíntuple'
		,'precioqplna'=>'NA'
		,'precioxpl'=>'Habitación Sextuple'
		,'precioxplna'=>'NA'
		,'precionin'=>'Niño 2-11 años'
		,'precioninna'=>'NA'
		);	
	/*
	$LabelHabitacion=array(
		'preciospl'=>'Habitación Simple'
		,'preciosplna'=>'NA'
		,'preciodbl'=>'precio por persona<br>Habitación Doble o Matrimonial'
		,'preciodblna'=>'NA'
		,'preciotpl'=>'precio por persona<br>Habitación Triple'
		,'preciotplna'=>'NA'
		,'preciocpl'=>'precio por persona<br>Habitación Cuadruple'
		,'preciocplna'=>'NA'
		,'precioqpl'=>'precio por persona<br>Habitación Quintuple'
		,'precioqplna'=>'NA'
		,'precioxpl'=>'precio por persona<br>Habitación Sextuple'
		,'precioxplna'=>'NA'
		,'precionin'=>'Niño 2-11 años'
		,'precioninna'=>'NA'
		);
	*/	


	$PRECIOS=array(
				'1'=>array('h'=>'preciospl','na'=>'preciosplna')
				,'2'=>array('h'=>'preciodbl','na'=>'preciodblna')
				,'3'=>array('h'=>'preciotpl','na'=>'preciotplna')
				,'4'=>array('h'=>'preciocpl','na'=>'preciocplna')
				,'5'=>array('h'=>'precioqpl','na'=>'precioqplna')
				,'6'=>array('h'=>'precioxpl','na'=>'precioxplna')
			);
			
	$Precios=array(
		'preciospl'
		,'preciosplna'
		,'preciodbl'
		,'preciodblna'
		,'preciotpl'
		,'preciotplna'
		,'preciocpl'
		,'preciocplna'
		,'precioqpl'
		,'precioqplna'
		,'precioxpl'
		,'precioxplna'		
		,'precionin'
		,'precioninna'
	);	
	
	$PreciosAdicionales=array(
		'preciosplna'
		,'preciodplna'
		,'preciotplna'
		,'preciocplna'
		,'precioqplna'
		,'precioxplna'
		,'precioninna'
	);	
	
	$HotelesTipos=array(
		'0'=>'Hostal '
		,'1'=>''
	);	

$Saludos['1']=array('Estimado Sr.');
$Saludos['2']=array('Estimada Sra.','Estimada Srta.');

$Textos['despedidas']=array('1'=>'Saludos Cordiales','2'=>'Saludos Afectuosos','3'=>'Sinceramente');

$Textos['introduccion']=array(
 '0'=>'Gracias por comunicarse con nosotros. De acuerdo a lo solicitado por teléfono'
,'1'=>'Gracias por comunicarse con nosotros. De acuerdo a su email'
,'2'=>'Gracias por comunicarse con nosotros. De acuerdo a lo solicitado por web'
);

$VentasCuentas=select("id,nombre,email","ventas_cuentas","where enabled='1' order by id asc");
//prin($VentasCuentas);

$Textos['firma']=array(
 '0'=>"<p>Saludos Cordiales</p><p>Elisa Rocca</p>
 <div><strong>CALANDRIA</strong><strong>TRAVEL S.A.C</strong></div>
 <div>Av. San Felipe 147-Jesús María, Lima- Perú<br />
 Central Telefónica: (+511) 261-8859 / Cel: (+511 ) 997-011728<br />
 Nextel: 606*6560 <br />
 E- Mail 1:&nbsp;<a href=\"mailto:ventas@calandriatravel.com\" >ventas@calandriatravel.com</a>&nbsp;
 E- Mail 2:&nbsp;<a href=\"mailto:elisarocca@calandriatravel.com\" >elisarocca@calandriatravel.com</a><br />
 Web:&nbsp;<a href=\"http://www.calandriatravel.com\" >www.calandriatravel.com</a><br />
 </div>"
 ,'1'=>"<p>Saludos Cordiales</p><p>Guillermo Lozán</p>
 <div><strong>CALANDRIA</strong><strong>TRAVEL S.A.C</strong></div>
 <div>Av. San Felipe 147-Jesús María, Lima-Perú<br />
 Central Telefónica:&nbsp;(+511) 261-8859 / Cel: (+511 ) 994-349284<br />
 Nextel:&nbsp;606*6560 <br />
 E- Mail:&nbsp;<a href=\"mailto:guillermolozan@calandriatravel.com\" >guillermolozan@calandriatravel.com</a><br />
 Web:&nbsp;<a href=\"http://www.calandriatravel.com\" >www.calandriatravel.com</a><br />
 </div>"
 ,'3'=>"<p>Saludos Cordiales</p><p>Pamela Marín</p>
 <div><strong>CALANDRIA</strong><strong>TRAVEL S.A.C</strong></div>
 <div>Av. San Felipe 147-Jesús María, Lima-Perú<br />
 Central Telefónica:&nbsp;(+511) 261-8859 / Cel: (+511 ) 994-349284<br />
 Nextel:&nbsp;606*6560 <br />
 E- Mail:&nbsp;<a href=\"mailto:pamelamarin@calandriatravel.com\" >pamelamarin@calandriatravel.com</a><br />
 Web:&nbsp;<a href=\"http://www.calandriatravel.com\" >www.calandriatravel.com</a><br />
 </div>" 

// '0'=>'prueba'
);



function email_content($datos){
	
global $COMODIN_PROPUESTA;
global $Textos; 
global $Saludos; 
global $Precios; 
global $PRECIOS;


$editable=$datos['opciones']['editable'];
//$editable=1;

$html ="";
$html.="<table width=100% style='font-size:11px;font-family:arial;' border='0' cellpadding='0' cellpadding='0' >";

$html.="<tr>";
$html.="<td width=20 height=1></td>";
$html.="<td width=20 ></td>";
$html.="<td width=300 ></td>";
$html.="<td ></td>";
$html.="<td width=20 ></td>";
$html.="<td width=20 ></td>";
$html.="</tr>";

$html.="<tr>";
$html.="<td align=left valign=top colspan=3><img src='http://calandriatravel.com/web/templates/default/img/particular/header/logo200x63.jpg' /></td>";
$html.="<td align=right valign=top colspan=2>".( fecha_formato("now()",2) )."</td>";
$html.="<td width=20 ></td>";
$html.="</tr>";

$html.="<tr><td colspan=6 heigh=5></td></tr>";

$html.="<tr>";
$html.="<td></td>";
$html.="<td colspan=4 >";

/*
$html.=render_email_opciones($Saludos[$datos['pedido']['genero']]) ." ".$datos['pedido']['nombre']."<br><br>"
		. render_email_opciones($Textos1,$datos['pedido']['via']);
*/
//prin($Saludos[$datos['pedido']['genero']]);

$html.=$Saludos[$datos['pedido']['genero']]['0']." ".$datos['pedido']['nombre']."<br><br>";


$html.=email_textos($Textos,'introduccion',$datos['opciones']['introduccion'],array(
															'editable'=>$editable
															));

$html.="</td>";
$html.="<td></td>";
$html.="</tr>";

$html.="<tr><td heigh=10></td>";
$html.="<td colspan=5 >";
$html.="</td></tr>";
$html.="<tr><td colspan=6 >";


$paquete_numero=0;
$hotel_numero=0;
$bus_numero=0;
$aereo_numero=0;
$comentario_numero=0;

$total_paquetes=0;
$total_aereos=0;
$total_bus=0;
$total_hoteles=0;
$total_comentarios=0;

foreach($datos['seleccion'] as $orden=>$ite){
	switch(key($ite)){
		case "paquete":	$total_paquetes++;	break;
		case "aereo":	$total_aereos++;	break;
		case "bus":		$total_bus++;		break;
		case "hotel":	$total_hoteles++;	break;
		case "comentario":	$total_comentarios++;	break;
	}
}
			
			
foreach($datos['seleccion'] as $orden=>$ite){

	$html.="<table width='100%' style='font-size:11px;font-family:arial;' border='0' cellpadding='0' cellpadding='0' >";
	$html.="<tr>";
	$html.="<td width=20></td>";
	$html.="<td>";

	$item=$ite[key($ite)];
		
	switch(key($ite)){
		
		case "paquete":

			$paquete_numero++;	if($total_paquetes==1) unset($paquete_numero);
															
			$html.=email_editable("Paquete ".$item['nombre'],$ite[key($ite)]['html'],$datos,$orden,$editable,numero_propuesta($paquete_numero));
									
			
		break;
		case "aereo":

			$aereo_numero++;	if($total_aereos==1) unset($aereo_numero);
												
			$html.=email_editable("Aéreo ".$item['nombre'],$ite[key($ite)]['html'],$datos,$orden,$editable,numero_propuesta($aereo_numero)); 

		break;
		case "bus":
		
			$bus_numero++;	if($total_bus==1) unset($bus_numero);		
															
			$html.=email_editable("Bus ".$item['nombre'],$ite[key($ite)]['html'],$datos,$orden,$editable,numero_propuesta($bus_numero)); 

		break;		
		case "hotel":
		
			$hotel_numero++;	if($total_hoteles==1) unset($hotel_numero);

			$html.=email_editable("Hotel ".$item['nombre'],$ite[key($ite)]['html'],$datos,$orden,$editable,numero_propuesta($hotel_numero)); 

		break;
		case "comentario":
		
			$comentario_numero++;	if($total_comentarios==1) unset($comentario_numero);

			$html.=email_editable("Comentario ".$item['nombre'],$ite[key($ite)]['html'],$datos,$orden,$editable,numero_propuesta($comentario_numero)); 

		break;		
		
	}
	
	$html.="</td>"; 
	$html.="<td width=20></td>";
	$html.="</tr>";
	$html.="<tr><td colspan=3 height=10></td></tr>";
	$html.="</table>";
	
}


$html.="</td></tr>";


$html.="<tr>";
$html.="<td></td>";
$html.="<td colspan=4 >";

$html.=email_textos($Textos,'firma',$datos['opciones']['firma'],array(
															'editable'=>$editable
															));

$html.="</td>";
$html.="<td></td>";
$html.="</tr>";


$html.="</table>";

return $html;
}

function email_textos($opciones,$key,$html,$config){

	if($config['editable']=='1'){
	$html2 ="";
	$html2.="<script>
	var items_".$key."=new Array();\n";
	foreach($opciones[$key] as $val=>$opcion){
	$html2.="items_".$key."[$val]=\"".addslashes(str_replace(array("\n","\t","\r")," ",$opcion))."\"\n";	
	}
	$html2.="</script>
	<div class='paquete'>
	<div class='barra'>
	<b>".strtoupper($key)."</b>&nbsp;&nbsp;&nbsp;";
	$html2.="<select style='width:150px;' onchange=\"javascript:".$key.".setContent(items_".$key."[this.value]);\">";
	foreach($opciones[$key] as $val=>$opcion){
	$html2.="<option value='$val'>".addslashes(strip_tags(str_replace(array("\n","\t","\r")," ",substr($opcion,0,200))))."</option>";
	}
	$html2.="</select>";
	$html2.="</div>
	<div class='content'><textarea style='width:100%;height:100px;' id='$key'>".$html."</textarea></div>
	</div>";
	
	$html2.="<script>
		var $key;
		window.addEvent('domready', function(){
				$key=\$('$key').mooEditable({
				actions: 'bold italic underline | formatBlock | insertunorderedlist insertorderedlist | undo redo removeformat | createlink unlink | indent outdent  | toggleview',
				baseCSS: 'html{ height: 100%; cursor: text; } body{ font-family: arial; font-size:11px; }'								
			});							
	
		});
		</script>
	";
	$html=$html2;
		
	}
	
	return $html;
	
}

function numero_propuesta($paquete_numero){
global $COMODIN_PROPUESTA;	
	$html='';
	if(!empty($paquete_numero)){
//	$html.="<table width=100% style='font-size;11px;font-family:arial;border:0;'>";
	$html.="<tr><td align=left>
				<table cellspacing=0 cellpadding=2 border=0><tr><td style='background-color:#ccc;color:#FFF;'>Propuesta ".$paquete_numero."</td></tr></table>
			</td></tr>";
//	$html.="</table>";
	}
	return $html;
	
}

function render_email_opciones($opciones,$selected=NULL){
	
$html ='';
$html.='<select>';
foreach($opciones as $op=>$opcion){
	$html.='<option value="'.$op.'" ';
	$html.=($op==$selected)?"selected":"";
	$html.='>';
	$html.=$opcion;	
	$html.='</option>';	
}
$html.='</select>';	
return $html;

}



function email_paquete($datos,$id_paquete,$opciones2){

global $COMODIN_PROPUESTA;	
if($opciones2['origen']=='destinos'){
	
	
	///	

	
} elseif($opciones2['blank']=='1'){


	
$html ='<table style="font-family: arial; border: 1px solid #CCC;color:#5E5E5E;" width="100%" border="0" cellpadding="0" cellpadding="0" >';

$html.='<tr><td width="10" height="1" style="font-size:1px;">&nbsp;</td><td style="font-size:1px;">&nbsp;</td><td width="10" style="font-size:1px;">&nbsp;</td></tr>';
$html.=$COMODIN_PROPUESTA;

$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:15px; color:#5E5E5E; padding:2px 3px; text-align:center; '>TÍTULO DE PAQUETE EN BLANCO 3 DÍAS/2 NOCHES</div>
</td><td></td></tr>";
//$html.="<tr><td height=2 colspan=3>&nbsp;</td></tr>";
$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Incluye</div>
</td><td></td></tr>";

$html.='<tr><td></td><td>

<div style="font-weight: normal;">';

$html.=email_lista('
	<ul>
	<li>Boleto Aéreo :Lima/Destino/Lima con Aerolínea</li>
	<li>Traslado Aeropuerto Destino/ Hotel Destino-Hotel / Aeropuerto Destino (Servicio compartido)</li>
	<li>3 noches de alojamiento en Destino sistema "Todo Incluído" ( desayunos, almuerzos, cenas, bebidas nacionales )</li>
	<li>Impuesto de seguridad del Destino $ NN.00</li>
	<li>Impuesto de turismo Peruano usd 15.00</li>
	</ul>
	');
	
$html.='</div>

</td><td></td></tr><tr><td colspan="3" height="15"></td></tr>';

$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Información Adicional</div>
</td><td></td></tr>";

$html.='<tr><td></td><td>';

$html.="
<p>
<strong>31 Diciembre: RECEPCIÓN Y CITY TOURS</strong>
<br><br>
Ayacucho fundado por los españoles en 1540 con el nombre de \"San Juan de la Frontera de Huamanga, conocido también como \"Bosque de iglesias\" o \"valle de Iglesias\" goza de fama por la majestuosidad de sus construcciones coloniales que enlaza sus treinta y tres iglesias coloniales con las solariegas y señoriales casonas de influencia barroca y raíces de origen milenaria, como expresión de su grandeza y centro de poder religioso en los siglos XVII y XVII.
</p>

<p>
<strong>01 Enero 2011: EXCURSION WARI-QUINUA (05-06 hrs)</strong>
<br><br>
En la mañana después del desayuno salimos de excursión por carretera asfaltada hacia el complejo arqueológico de Wari -capital del primer Imperio Andino y primera ciudad urbana que floreció entre los siglos VI al XI d.e.-; donde visitaremos su museo de sitio, su extraordinaria arquitectura pétrea -a base de piedra canteada y tallada-, canales de agua y desagüe subterráneas, templo mayor, Tumba Real, Cheqowasi, entre otrosS.
Retorno a Ayacucho. 
</p>";


$html.='</td><td></td></tr>';

$html.='<tr><td></td><td>';

$html.=str_replace("EEE","FCFCFC",email_aereo(array(),array('blank'=>'1','editable'=>'0','precio'=>'0','numero_propuesta'=>0)));

$html.='</td><td></td></tr>';

$html.='<tr><td colspan="3" height="5"></td></tr>';

$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Opciones de Alojamiento</div>
</td><td></td></tr>";

$html.='<tr><td></td><td><div class="bloque_tabla"><div class="area_tab_precios" id="area_tab_precios_dolares"><div>Precios por persona en Dólares Americanos</div>

<table style="border: 1px solid #CCC; font-size: 11px;" width="100%" cellpadding="5" cellspacing="0">
<tr><td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;">
Hoteles

</td><td style="font-weight: bold;  border-left: 1px solid #CCC; background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
Habitación Doble o Matrimonial

</td><td style="font-weight: bold;  background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
TOTAL PARA 2 PERSONAS

</td></tr>';

for($o=0;$o<3;$o++){
$html.='<tr><td class="izq" style="border-bottom: 1px dotted #CCC;">
<strong>Hotel 3*</strong>
</td><td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
$1000
</td><td style="border-bottom: 1px dotted #CCC;" align="right">
$2000
</td></tr>';
}

$html.='</table></div></div></td><td></td></tr>';
$html.='<tr><td colspan="3" height="15"></td></tr>';


$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Condiciones Generales</div>
</td><td></td></tr>";
$html.='<tr><td></td><td>

<div style="font-weight: normal; font-size: 11px; text-align: justify;">
		<span style="font-size: 11px;">';
		$html.=email_lista('
		<ul>
		<li>Precio por persona en dólares americanos en base a una habitación matrimonial o doble ( 2 camas ).</li>
		<li>No incluye tarjeta de Turismo obligatorio para el ingreso a la Isla $ 20.00</li>
		<li>Sujeto a disponibilidad de espacios.</li>
		<li>Reservaciones pueden ser con prepago no reembolsable de $600. En el caso que se solicite dentro de los 25 días al inicio de viaje, se solicitará pago completo.</li>
		</ul>
		',2);
		
		$html.='</span>
</div>


</td><td></td></tr>';
$html.='<tr><td colspan="3" height="15"></td></tr>';


$html.='<tr><td colspan="3" height="15"></td></tr>

</table>';
$html.='';	
	
} else {
	
	$ha0=array();	
	$hoteles_activos=array();	
	//print_r($datos['seleccion']);
	foreach($datos['seleccion'] as $pp=>$sel){
			if($sel['paquete']['id']==$id_paquete){
				$ppp=$pp;
			}
	}
	foreach($datos['seleccion'][$ppp]['paquete']['hoteles'] as $hot){
		$ha0[]="'".$hot['id']."'";
		$hoteles_activos[]=$hot['id'];
	}
	$hoteles_activos_query=implode(",",$ha0);

	//$more_where="and id_hotel in (".$hoteles_activos_query.")";

$item = select_fila(
        "id,nombre,id_proveedor,id_pais,id_lugar,id_grupo,fecha_salida,fecha_retorno,nnoches,comision,incentivo,comision_empresa,variacion_empresa,rangonin,titular,resumen,texto,comentario,fecha_creacion"
        ,"paquetes"
        ,"where id='".$id_paquete."' and  visibilidad='1' "
        ,0
		,array(
		    //'link'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=".$PARAMS['this']."&acc=file&id={id}&friendly={titulo}")),			
			'precios'=>array('sub_select'=>array(
												'campos'=>'id_hotel,id_hotel_habitacion,moneda
												,preciospl,preciosplna
												,preciodbl,preciodblna
												,preciotpl,preciotplna
												,preciocpl,preciocplna
												,precioqpl,precioqplna
												,precioxpl,precioxplna
												,precionin,precioninna
												'
/*
												'campos'=>'id_hotel,id_hotel_habitacion,moneda
												,preciospl
												,preciodbl
												,preciotpl												
												,preciocpl												
												,precionin
												'
*/												,'tabla'=>'paquetes_preciohotel'
												,'donde'=>"where 1
															and id_paquete={id} 
															$more_where
															and  visibilidad='1' 
															order by preciodbl asc"
												,'opciones'=>array(
														 'hotel'=>array('sub_select_fila'=>array('campos'=>'nombre,estrellas,web,tipo','tabla'=>'hoteles','donde'=>'where id={id_hotel}'))
														,'habitacion'=>array('sub_select_fila'=>array('campos'=>'nombre','tabla'=>'hotel_habitacion','donde'=>'where id={id_hotel_habitacion}'))
														)												
												))
														
			)
		
        );	
	
//print_r($item['precios']);		
//$precios_dato[]=		

	
$html ='';
$html.="<table width=100% style='font-size;11px;font-family:arial;border:1px solid #ccc;color:#5E5E5E;' cellpadding='0' cellspacing='0' >";	
$html.=$COMODIN_PROPUESTA;
$html.="<tr><td height=1 width=10 style='font-size:1px;'>&nbsp;</td><td style='font-size:1px;'>&nbsp;</td><td width=10 style='font-size:1px;'>&nbsp;</td></tr>";
$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:15px; color:#5E5E5E; padding:2px 3px; text-align:center; '>".mb_convert_case($item['nombre'], MB_CASE_UPPER, "UTF-8")."</div>
</td><td></td></tr>";
$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px; color:#5E5E5E; padding:2px 3px; text-align:center; '>".$item['titular']."</div>
</td><td></td></tr>";
$html.="<tr><td height=2 colspan=3 style='font-size:1px;'>&nbsp;</td></tr>";
$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Incluye</div>
</td><td></td></tr>";
$html.="<tr><td></td><td><div style='font-color:#000;font-weight:normal;font-size:12;'>".( email_lista($item['resumen']) )."</div></td><td></td></tr>";
$html.="<tr><td height=10 colspan=3></td></tr>";

$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Información Adicional</div>
</td><td></td></tr>";

$html.="<tr><td></td><td><div style='font-color:#000;font-weight:normal;font-size:12;text-align:justify;' class='texto'>".( email_lista(cleantext($item['texto'])) )."</div></td><td></td></tr>";

if(sizeof($item['precios'])>0){
$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>";
$html.=(sizeof($item['precios'])>1)?"Opciones de Alojamiento":"Alojamiento";
$html.="</div>
</td><td></td></tr>";

$html.="<tr><td height=10 colspan=3></td></tr>";
$html.="<tr><td></td>";
$html.="<td>". (
				 turismo_tabla_precios($item['precios'],array(
				 												'n_adultos'=>$datos['pedido']['n_adultos']
																,'n_ninos'=>$datos['pedido']['n_ninos']
																,'n_infantes'=>$datos['pedido']['n_infantes']
																,'precios'=>$precios_dato
																,'rangonin'=>$item['rangonin']
																,'variacion_empresa'=>$item['variacion_empresa']
															),$opciones2) ) . "</td>";
$html.="<td></td></tr>";
$html.="<tr><td height=10 colspan=3></td></tr>";
}

$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Condiciones Generales</div>
</td><td></td></tr>";

$html.="<tr><td></td><td><div style='font-color:#000;font-weight:normal;font-size:11px;text-align:justify;'><span style='font-size:11px;'>".( email_lista(cleantext($item['comentario']),2) )."</span></div></td><td></td></tr>";

$html.="<tr><td height=10 colspan=3></td></tr>";

//prin($hoteles_activos );	

if(sizeof($hoteles_activos)>0){

	$html.="<tr><td></td><td>
	<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>";
	$html.=(sizeof($hoteles_activos)>1)?"Información de Hoteles":"Información del Hotel";
	$html.="</div>
	</td><td></td></tr>";
	
	foreach($hoteles_activos as $id_hotel){
			
		$html.='<tr><td></td><td>';
		
		$html.=email_hotel($datos,$id_hotel,array(
												'editable'=>'0'
												,'fotos'=>'1'
												,'blank'=>'0'
												));
		
		$html.='</td><td></td></tr>';
	
	}

}

$html.="</table>";

}

$html=email_editable("Paquete ".$item['nombre'],$html,$datos,$opciones2['orden'],$opciones2['editable']);

return $html;

}


function email_editable($nombre,$html,$datos,$orden,$editable,$numero){
	
global $COMODIN_PROPUESTA;
	if(!$editable) return str_replace($COMODIN_PROPUESTA,$numero,$html); 
	
	$tipo =key($datos['seleccion'][$orden]);
	
	switch($tipo){
	case "paquete"	: $hh=600;	break;	
	case "hotel"	: $hh=350;	break;	
	case "comentario"	: $hh=200;	break;	
	case "aereo"	: $hh=290;	break;	
	case "bus"		: $hh=260;	break;	
	}
	
	$html="
	<div id='b_".$orden."' class='paquete'>
	<div class='barra'> 
	<b>".$nombre."</b>
	<a href='#' onclick=\"javascript:item('".$datos['pedido']['id']."','$tipo','del','".$orden."');return false;\" class='link delete' ></a>
	<a href='#' onclick=\"javascript:$('b_".$orden."').toggleClass('hid');return false;\" class='link cerrar'></a>
	<a href='#' onclick=\"javascript:$('b_".$orden."').toggleClass('hid');return false;\" class='link abrir'></a>
	</div>
	<div class='content'><textarea style='width:100%;height:".$hh."px;' id='bloque_".$orden."'>".$html."</textarea></div>
	</div>";
	
	$html.=" <script>
		var bloque_".$orden."
		window.addEvent('domready', function(){
			bloque_".$orden."=\$('bloque_".$orden."').mooEditable({
				actions: 'bold italic underline | formatBlock | insertunorderedlist insertorderedlist | undo redo removeformat | createlink unlink | indent outdent | tablerowadd tablerowdelete tablecoladd tablecoldelete | toggleview',
				baseCSS: 'html{ height: 100%; cursor: text; } body{ font-family: arial; font-size:11px; }'								
			});							
	
		});
		</script>
	";
	
	return $html;
	
}

function email_hotelprecio($datos,$id_paquete){
	
global $COMODIN_PROPUESTA;	
$item = select_fila(
        "id,nombre,id_proveedor,id_pais,id_lugar,id_grupo,fecha_salida,fecha_retorno,nnoches,comision,incentivo,comision_empresa,variacion_empresa,rangonin,titular,resumen,texto,comentario,fecha_creacion"
        ,"paquetes"
        ,"where id='".$id_paquete."'  "
        ,0
		,array(
		    //'link'=>array('procesar_url'=>array('url'=>"index.php?modulo=items&tab=".$PARAMS['this']."&acc=file&id={id}&friendly={titulo}")),			
			'precios'=>array('sub_select'=>array(
												'campos'=>'id_hotel,id_hotel_habitacion,moneda
												,preciospl,preciosplna
												,preciodbl,preciodblna
												,preciotpl,preciotplna
												,preciocpl,preciocplna
												,precioqpl,precioqplna
												,precioxpl,precioxplna
												,precionin,precioninna
												'
/*
												'campos'=>'id_hotel,id_hotel_habitacion,moneda
												,preciospl
												,preciodbl
												,preciotpl												
												,preciocpl												
												,precionin
												'
*/												,'tabla'=>'paquetes_preciohotel'
												,'donde'=>"where id_paquete={id} and  visibilidad='1' order by preciodbl asc"
												,'opciones'=>array(
														 'hotel'=>array('sub_select_fila'=>array('campos'=>'nombre,estrellas,web,tipo','tabla'=>'hoteles','donde'=>'where id={id_hotel}'))
														,'habitacion'=>array('sub_select_fila'=>array('campos'=>'nombre','tabla'=>'hotel_habitacion','donde'=>'where id={id_hotel_habitacion}'))
														)												
												))
														
			)
		
        );	
	
$html='';
$html.="<table width=100% style='font-size;11px;font-family:arial;border:1px solid #EEE;' cellpadding='0' cellpadding='0' >";	
$html.="<tr><td height=1 width=10></td><td></td><td width=10></td></tr>";
$html.="<tr><td height=10 colspan=3></td></tr>";
$html.="<tr><td></td><td><div style='font-color:#000;font-weight:bold;font-size:20px;'>".$item['nombre']."</div></td><td></td></tr>";
$html.="<tr><td height=2 colspan=3 style='font-size:1px;'>&nbsp;</td></tr>";
$html.="<tr><td></td><td><div style='font-color:#000;font-weight:noral;font-size:12;'><span style='font-weight:bold;'>Incluye</span><br>".( email_lista($item['resumen']) )."</div></td><td></td></tr>";
$html.="<tr><td height=2 colspan=3 style='font-size:1px;'>&nbsp;</td></tr>";
$html.="<tr><td></td><td><div style='font-color:#000;font-weight:noral;font-size:12;text-align:justify;'>".( email_lista($item['texto']) )."</div></td><td></td></tr>";
$html.="<tr><td height=2 colspan=3 style='font-size:1px;'>&nbsp;</td></tr>";
$html.="<tr><td></td><td><div style='font-color:#000;font-weight:noral;font-size:11px;text-align:justify;'><span style='font-weight:bold;'>Condiciones Generales</span><br><span style='font-size:11px;font-weight:normal;'>".( email_lista($item['comentario'],2) )."</span></div></td><td></td></tr>";
$html.="<tr><td height=10 colspan=3></td></tr>";
$html.="</table>";
//$html.=turismo_tabla_precios($item['precios'],array('rangonin'=>$item['rangonin'],'variacion_empresa'=>$item['variacion_empresa'],'monedas'=>array('dolares','soles')));
//return $html;

}

function email_lista($html,$formato=2){
	$html=cleantext($html);
	switch($formato){
		case "1":
			$html=str_replace("<ul>","<ul style='list-style: none outside none; padding: 0; margin: 0;'>",$html);	
			$html=str_replace("<li>","<li style='list-style: none; padding: 0; margin: 0;'>",$html);	
		break;
		case "2":
			$html=str_replace("<ul>","<div>",$html);
			$html=str_replace("</ul>","</div>",$html);
			$html=str_replace("<li>","-",$html);
			$html=str_replace("</li>","<br>",$html);	
		break;		
	}
	return $html;
}



function turismo_tabla_precios($precios,$opciones=NULL,$opciones2=NULL){
	
	global $Cambio; global $Simbolos; global $Monedas; global $LabelHabitacion; global $MonedasLabel; global $PreciosAdicionales;
	//global $Precios; 
	global $PRECIOS;
	global $HotelesTipos;

	/*
	print_r($opciones);
	print_r($opciones);	
	print_r($opciones2);
	echo "	global $Cambio; global $Simbolos; global $Monedas; global $LabelHabitacion; global $MonedasLabel; global $PreciosAdicionales;
	//global $Precios; 
	global $PRECIOS;
	global $HotelesTipos;
	";
	*/
	
	$monedas=(isset($opciones2['monedas']))?$opciones2['monedas']:array('dolares');
	$vistas=(isset($opciones2['vistas']))?$opciones2['vistas']:array('publico');
	$Variacion=(isset($opciones['variacion_empresa']))?$opciones['variacion_empresa']:0;
	$Rangonin=(isset($opciones['rangonin']))?$opciones['rangonin']:'2-11';
	$Switch=(isset($opciones2['switch']))?$opciones2['switch']:'0';

	$Adultos=(isset($opciones['n_adultos']))?$opciones['n_adultos']:'';
	

	$Acomodacion=(isset($opciones2['acomodacion']))?explode(",",$opciones2['acomodacion']):array('1','2','3','4´','5','6');

	foreach($Acomodacion as $Aco){	
		$Precios[]=$PRECIOS[$Aco]['h'];
		$Precios[]=$PRECIOS[$Aco]['na'];		
	}	

//	prin($Precios);
	
	$html ="";
	
	$precios2=$precios;

	$html.= '<div class="bloque_tabla">';
	
	foreach($vistas as $vista){

	$cells=array();

	$precios=$precios2;	

	if($vista=='neto'){ $variacion2=0; $titulo='Precios Originales por persona en'; $title='Precios'; }
	elseif($vista=='publico'){ $variacion2=$Variacion; $titulo='Precios por persona en '; $title='Originales';}
	
	if($variacion2!=0){
		$variacion=array('moneda'=>'1','valor'=>$variacion2);
		foreach($precios as $tt=>$precio){
			foreach($precio as $key=>$num){
				if(in_array($key,$Precios) and trim($num)!='' and $num!=0){
					$precios[$tt][$key]=($precio['moneda']==$variacion['moneda'])?$precios[$tt][$key] + $variacion['valor']:$precios[$tt][$key] + $Cambio[$variacion['moneda']][$precio['moneda']]*$variacion['valor'];
				}
			}
		}
	}

	$pre=array();

		foreach($precios as $precio){
			$moneda=$precio['moneda'];
			if(!isset($opciones['seleccion'])){
				foreach($precio as $key=>$num){
					if(in_array($key,array("hotel"))){
						$cell[$key]=$precio[$key];
					}
					if(in_array($key,$Precios) and trim($num)!='' and $num!=0){
						$Columna[$key]=$key;
						foreach($monedas as $mon){
							$cell[$key][$mon]['numero']=($Monedas[$mon]==$moneda)?$num:ceil($Cambio[$Monedas[$mon]][$moneda]*$num);
							$cell[$key][$mon]['simbolo']=$Simbolos[$Monedas[$mon]];
						}
					}
				}
			}
			$cells[]=$cell;
		}
	
	$name='precios';
	
	foreach($monedas as $key=>$mon){
	    $menus[]="<a style='font-size:11px;color:navy;' class='m_area_tab_".$name."' id='m_area_tab_".$name."_".$mon."_".$vista."' ".$show." href=\"#\" onclick=\"javascript:switch_tab('".$name."','".$mon."_".$vista."');return false;\">".$title." ".$MonedasLabel[$mon]."</a>"; 
		if($vista=='neto' and $mon=='dolares'){ $menuinicial="<script>switch_tab('".$name."','".$mon."_".$vista."');</script>"; }
		$html.="<div class='area_tab_".$name."' id='area_tab_".$name."_".$mon."_".$vista."' ".$show." >";
		$html.="<div>$titulo <b>".$MonedasLabel[$mon]."</b></div>";
		$html.="<table cellpadding='3' width=100% cellspacing='0' style='border:1px solid #ccc;font-size:11px;'>";
		$html.='<tr>';
		$html.='<td class="izq" style="background-color:#EEE;border-bottom:1px solid #CCC;">'. ((sizeof($cells)>1)?"Hoteles":"Hotel" ) .'</td>';
		foreach($Columna as $cc=>$Col){
			$html.='<td align=right style="background-color:#EEE;color:#5E5E5E;'. ( ($LabelHabitacion[$Col]=='NA')?'':'font-weight:normal;border-left:1px solid #CCC;border-bottom:1px solid #CCC;' ) .'" align=center>';
			$html.=($cc=='precionin')?'Niños '.$Rangonin.' años':$LabelHabitacion[$Col]."&nbsp;";
			$html.='</td>';
		}
		if($Adultos!=''){
			$html.='<td style="font-weight:bold;color:#5E5E5E; background-color:#EEE;border-bottom:1px solid #CCC;"  align=right>';			
			$html.=strtoupper('Total para '.$Adultos.' '. ( ($Adultos==1)?"persona":"personas" ))."&nbsp;";						
			$html.='</td>';						
		}
		
		$html.='</tr>';
		foreach($cells as $i=>$Cell){
			$html.="<tr>";
			$html.='<td class="izq" style="border-bottom:1px dotted #CCC;"><b>';
			$html.=$HotelesTipos[$Cell['hotel']['tipo']];
			$html.=$Cell['hotel']['nombre']." ";
			$html.=$Cell['hotel']['estrellas']."*";
			$html.="</b></td>";
			foreach($Columna as $Col){
				$html.='<td style="border-bottom:1px dotted #CCC;'.( ($LabelHabitacion[$Col]=='NA')?'':'border-left:1px solid #CCC;' ).'" align=right>';
				$html.=$Cell[$Col][$mon]['simbolo'];
				$html.=$Cell[$Col][$mon]['numero'];
				$html.="</td>";	
				if($Adultos!=''){
					$html.='<td style="border-bottom:1px dotted #CCC;"  align=right>';			
					$html.=$Cell[$Col][$mon]['simbolo'];
					$html.=$Adultos*$Cell[$Col][$mon]['numero'];
					$html.='</td>';						
				}					
			}
			$html.="</tr>";
		}
		$html.='</table>';
		$html.='</div>';
	}
	
	}
	if($Switch){ $html ='<div>'.implode("|",$menus).'</div>'.$html.$menuinicial; }
	else { $html.='<div>'; }
	$html.='</div>';
	return $html;
}

function email_hotel($datos,$id_hotel,$opciones2){
	
global $COMODIN_PROPUESTA;

if($opciones2['blank']=='1'){
	
$html ='
<table style="font-family: arial; border: 1px solid #CCC;color:#5E5E5E;" width="100%" cellpadding="0" cellpadding="0" >';
$html.=$COMODIN_PROPUESTA;
$html.='<tr><td width="10" height="1" style="font-size:1px;">&nbsp;</td><td style="font-size:1px;">&nbsp;</td><td width="10" style="font-size:1px;">&nbsp;</td></tr>';

$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:15px; color:#5E5E5E; padding:2px 3px; text-align:left; '>Hotel en Blanco</div>
</td><td></td></tr>";
//$html.="<tr><td height=2 colspan=3 style='font-size:1px;'>&nbsp;</td></tr>";
$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Incluye</div>
</td><td></td></tr>";

$html.='<tr><td></td><td>

<div style="font-weight: normal;">';

$html.=email_lista('
	<ul>
	<li>Traslado Aeropuerto Destino/ Hotel Destino-Hotel / Aeropuerto Destino (Servicio compartido)</li>
	<li>3 noches de alojamiento en Destino sistema "Todo Incluído" ( desayunos, almuerzos, cenas, bebidas nacionales )</li>
	<li>Impuesto de seguridad del Destino $ NN.00</li>
	</ul>
	');
	
$html.='</div>

</td><td></td></tr>';

//$html.='<tr><td colspan="3" height="15"></td></tr>';

$html.='<tr><td colspan="3" height="15"></td></tr>';


$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Condiciones Generales</div>
</td><td></td></tr>";
$html.='<tr><td></td><td>

<div style="font-weight: normal; font-size: 11px; text-align: justify;">
		<span style="font-size: 11px;">';
		
	$html.=email_lista('
		<ul>
		<li>Precio por persona en dólares americanos en base a una habitación matrimonial o doble ( 2 camas ).</li>
		<li>No incluye tarjeta de Turismo obligatorio para el ingreso a la Isla $ 20.00</li>
		<li>Sujeto a disponibilidad de espacios.</li>		
		</ul>
		',2);

	$html.='</span>
</div>


</td><td></td></tr>';
$html.='<tr><td colspan="3" height="15"></td></tr>';

if($opciones2['precio']!='0'){

$html.='<tr><td></td><td>';
$html.=email_precio($precios,array('formato'=>'1','moneda'=>'1'));
$html.='<td></td></td></tr>';

}

$html.='<tr><td colspan="3" height="15"></td></tr>

</table>';

$html.='';	
	
} else {

$item= select_fila(
        "id,nombre,id_pais,id_lugar,tipo,estrellas,web,descripcion,fecha_creacion"
        ,"hoteles"
        ,"where id='$id_hotel' and  visibilidad='1'"
        ,0
        ,array(
        	'fotos'=>array('sub_fotos'=>array(
											"id,id_hotel,file,foto_descripcion,fecha_creacion|hoteles_fotos|where id_hotel='{id}' and visibilidad='1' order by id asc limit 0,100"
											,"hotfot_imas"
											,array(												 
												   //'archivo'=>'4'
												   'atributos'=>'4,280x1000,0'												   
												   //'atributos'=>'3,624x600,0'												   
												  )
											 )
						  )	
			  )									  
        );

//$precios_dato[]=


$html='';
$html.="<table width=100% style='font-size;11px;font-family:arial;border:1px solid #EEE;color:#5E5E5E;' cellspacing=0 cellpadding=0 >";	
$html.="<tr><td height=1 width=1 style='font-size:1px;'>&nbsp;</td><td style='font-size:1px;'>&nbsp;</td><td width=1 style='font-size:1px;'>&nbsp;</td></tr>";
//$html.="<tr><td height=10 colspan=3></td></tr>";

$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:15px; color:#5E5E5E; padding:2px 3px; text-align:left; '>
Hotel ".$item['nombre']." ".$item['estrellas']."*
</div>
</td><td></td></tr>";
$html.="<tr><td height=2 colspan=3 style='font-size:1px;'>&nbsp;</td></tr>";

if(sizeof($item['fotos'])>0){

$html.="<tr><td></td><td>";
	$html.="<table width=100% style='font-size;11px;font-family:arial;color:#5E5E5E;border-collapse:collapse;' cellspacing=0 border=0 >";
	
	//$item['fotos']=array($item['fotos'][0],$item['fotos'][1],$item['fotos'][2]);
	//prin($item['fotos']);			
	
	if(sizeof($item['fotos'])%0 and sizeof($item['fotos'])>0){	$item['fotos'][]=array('vacio'=>'1');	}
	
	foreach($item['fotos'] as $ii=>$foto){		
	
		if($ii%2==0){ $html.="<tr>"; }
		$html.="<td align='center' valign='middle' style='background-color:#FFF;margin:1px;border:4px solid #5E5E5E;'>";		
		if($foto['vacio']=='1'){
		$html.="&nbsp;";
		} else {
		$html.="<img ".$foto['atributos']." />";
		}
//		$html.="<img src='".$foto['archivo']."' />";
		$html.="</td>";
		if($ii%2==1){ $html.="</tr>"; }
		//if($ii%2==1){ $html.="</tr><tr>"; }
	}
	
	
	
	$html.="</table>";
$html.="</td><td></td></tr>";

}


$html.="<tr><td height=10 colspan=3></td></tr>";




$html.="</table>";

}
//prin($datos);
$html=email_editable("Hotel ".$item['nombre'],$html,$datos,$opciones2['orden'],$opciones2['editable']);

return $html;

}


function email_comentario($datos,$id_hotel,$opciones2){
global $COMODIN_PROPUESTA;
	
$html ='
<table style="font-family: arial; border: 1px solid #CCC;color:#5E5E5E;" width="100%" cellpadding="0" cellpadding="0" >';
$html.='<tr><td width="10" height="1" style="font-size:1px;">&nbsp;</td><td style="font-size:1px;">&nbsp;</td><td width="10" style="font-size:1px;">&nbsp;</td></tr>';

$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:15px; color:#5E5E5E; padding:2px 3px; text-align:left; '>Comentario</div>
</td><td></td></tr>";

$html.="<tr><td></td><td>
<div style='font-color:#000;font-weight:bold;font-size:13px;background-color:#5E5E5E; color:#FFF; padding:2px 3px; '>Comentario</div>
</td><td></td></tr>";

$html.='<tr><td></td><td>

<div style="font-weight: normal;">';

$html.='Texto del comentario Texto del comentario.';
	
$html.='</div>

</td><td></td></tr>';

$html.='<tr><td colspan="3" height="15"></td></tr>';

$html.='</table>';

$html.='';	
	
//prin($datos);
$html=email_editable("Comentario ".$item['nombre'],$html,$datos,$opciones2['orden'],$opciones2['editable']);

return $html;

}


function email_aereo($datos,$opciones2){

global $COMODIN_PROPUESTA;

if($opciones2['blank']=='1'){
	
$html ='';	
$html.='<table style="font-family:arial;border:1px solid #CCC;" cellpadding="0" cellspacing="0" width="100%">';
$html.=$COMODIN_PROPUESTA;
$html.='<tr><td width="10" height="1" style="font-size:1px;">&nbsp;</td><td style="font-size:1px;">&nbsp;</td><td width="10" style="font-size:1px;">&nbsp;</td></tr>';
$html.='<tr><td colspan="3" height="1"></td></tr><tr><td></td><td>
<div style="font-weight: bold; font-size: 11px;">Lima - Miami - Lima</div>
</td><td></td></tr>';

//$html.='<tr><td colspan="3" height="5"></td></tr>';

$html.='<tr><td></td><td>
<table style="border: 1px solid #CCC; font-size: 11px;" width="100%" cellpadding="5" cellspacing="0">';

$html.='<tr>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;">
Ida
</td>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;">
Ruta
</td>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
Aerolinea
</td>
<td style="font-weight: bold;  background-color: #EEE; border-bottom: 1px solid #CCC;" align="center">
Salida
</td>
<td style="font-weight: bold;  background-color: #EEE; border-bottom: 1px solid #CCC;" align="center">
Llegada
</td>
</tr>';
$html.='<tr>
<td class="izq" style="border-bottom: 1px dotted #CCC;" width="80">
<strong>23 Diciembre</strong>
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" >
Lima - Panamá
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right" width="100">
Taca Airlines
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right" width="50">
10:30AM
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right" width="50">
5:40PM
</td>
</tr>';
$html.='<tr>
<td class="izq" style="border-bottom: 1px dotted #CCC;">
<strong>23 Diciembre</strong>
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" >
Panamá - Miami
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
Taca Airlines
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
8:20PM
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
01:40AM
</td>
</tr>';
$html.='<tr>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;">
Regreso
</td>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;">
Ruta
</td>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
Aerolínea
</td>
<td style="font-weight: bold;  background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
Salida
</td>
<td style="font-weight: bold;  background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
Llegada
</td>
</tr>';

$html.='<tr>
<td class="izq" style="border-bottom: 1px dotted #CCC;">
<strong>3 Enero</strong>
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" >
Miami - Panamá
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
Taca Airlines
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
10:30AM
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
5:40PM
</td>
</tr>';
$html.='<tr>
<td class="izq" style="border-bottom: 1px dotted #CCC;">
<strong>3 Enero</strong>
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" >
Panamá - Lima
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
Taca Airlines
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
8:20PM
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
01:40AM
</td>
</tr>';

$html.='</table>';

if($opciones2['precio']!='0'){

$html.=email_precio($precios,array('formato'=>'1','moneda'=>'1'));

}

$html.='</div></div><div style="height: 5px;">&nbsp;</div></td><td></td></tr><tr><td colspan="3" height="5"></td></tr>

</table>';
$html.='';	

}


$html=email_editable("Aéreo",$html,$datos,$opciones2['orden'],$opciones2['editable']);


return $html;

}

function email_precio($precios,$opciones){
global $COMODIN_PROPUESTA;	
	$Moneda=array('1'=>'Dólares Americanos','2'=>'Nuevos Soles');
	$Simbolo=array('1'=>'$','2'=>'S/.');
			
	$formato=$opciones['formato'];
	$moneda=$Moneda[$opciones['moneda']];
	$simbolo=$Simbolo[$opciones['moneda']];
	
	switch($formato){
		case "1":
			$html.='<table border="0" align="right" cellpadding="0" cellspacing="0" ><tr><td>';
			$html.='<table align="right"  style="border: 1px solid #CCC; font-size: 11px;margin-top:10px;"  cellpadding="3" cellspacing="0">';
			$html.='<tr><td style="background-color:#EFEFEF;font-weight:bold;" colspan=2 align=center>Precio en '.$moneda.'</td></tr>';
			$html.='<tr><td align="right" style="border-bottom:1px solid #ccc;padding:0 20px;">Precio por persona Adulta 1</td><td align="right" style="border-bottom:1px solid #ccc;">'.$simbolo.'1000</td></tr>';
			$html.='<tr><td align="right" style="border-bottom:1px solid #ccc;padding:0 20px;">Precio por persona Adulta 2</td><td align="right" style="border-bottom:1px solid #ccc;">'.$simbolo.'1000</td></tr>';
			$html.='<tr><td align="right" style="border-bottom:1px solid #ccc;padding:0 20px;">Precio por persona Adulta 3</td><td align="right" style="border-bottom:1px solid #ccc;">'.$simbolo.'1000</td></tr>';
			$html.='<tr><td align="right" style="border-bottom:1px solid #ccc;padding:0 20px;"><b>TOTAL</b></td><td align="right" style="border-bottom:1px solid #ccc;"><b>'.$simbolo.'3000</b></td></tr>';
			$html.='</table>';
			$html.='</td></tr>';
			$html.="</table>";
		break;
		case "2":
			$html.='<table border="0" align="right" cellpadding="0" cellspacing="0" ><tr><td>';
			$html.='<table align="right"  style="border: 1px solid #CCC; font-size: 11px;margin-top:10px;"  cellpadding="3" cellspacing="0">';
			$html.='<tr><td style="background-color:#EFEFEF;font-weight:bold;" colspan=2 align=center>Precio en '.$moneda.'</td></tr>';
			$html.='<tr><td align="right" style="border-bottom:1px solid #ccc;padding:0 20px;">Precio por persona Adulta 1</td><td align="right" style="border-bottom:1px solid #ccc;">'.$simbolo.'1000</td></tr>';
			$html.='<tr><td align="right" style="border-bottom:1px solid #ccc;padding:0 20px;">Precio por persona Adulta 2</td><td align="right" style="border-bottom:1px solid #ccc;">'.$simbolo.'1000</td></tr>';
			$html.='<tr><td align="right" style="border-bottom:1px solid #ccc;padding:0 20px;">Precio por persona Adulta 3</td><td align="right" style="border-bottom:1px solid #ccc;">'.$simbolo.'1000</td></tr>';
			$html.='<tr><td align="right" style="border-bottom:1px solid #ccc;padding:0 20px;"><b>TOTAL</b></td><td align="right" style="border-bottom:1px solid #ccc;"><b>'.$simbolo.'3000</b></td></tr>';
			$html.='</table>';
			$html.='</td></tr>';
			$html.="</table>";	
		break;
	}
return $html;
}

function email_bus($datos,$opciones2){
	
global $COMODIN_PROPUESTA;
if($opciones2['blank']=='1'){
	
$html ='<table style="font-family:arial;border:1px solid #CCCCCC;" width="100%"  cellpadding="0" cellspacing="0" >';
$html.=$COMODIN_PROPUESTA;
$html.='<tr><td width="10" height="1" style="font-size:1px;">&nbsp;</td><td style="font-size:1px;">&nbsp;</td><td width="10" style="font-size:1px;">&nbsp;</td></tr>';
//$html.='<tr><td colspan="3" height="1"></td></tr>';
$html.='<tr><td></td><td>
<div style="font-weight: bold; font-size: 11px;">Lima - Cuzco - Lima</div>
</td><td></td></tr>';
//$html.='<tr><td colspan="3" height="5"></td></tr>';
$html.='<tr><td></td><td>

<table style="border: 1px solid #CCC; font-size: 11px;" width="100%" cellpadding="5" cellspacing="0">';

$html.='<tr>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;">
Lima - Cuzco
</td>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
Empresa de Transporte
</td>
<td style="font-weight: bold;  background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
Sale
</td>
<td style="font-weight: bold;  background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
Llega
</td>
</tr>';
$html.='<tr>
<td class="izq" style="border-bottom: 1px dotted #CCC;" width="80">
<strong>23 Diciembre</strong>
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right" width="100">
Cruz del Sur
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right" width="50">
10:30AM
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right" width="50">
5:40PM
</td>
</tr>';
$html.='<tr>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;">
Cuzco - Lima
</td>
<td class="izq" style="background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
Empresa de Transporte
</td>
<td style="font-weight: bold;  background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
&nbsp;
</td>
<td style="font-weight: bold;  background-color: #EEE; border-bottom: 1px solid #CCC;" align="right">
&nbsp;
</td>
</tr>';

$html.='<tr>
<td class="izq" style="border-bottom: 1px dotted #CCC;">
<strong>3 Enero</strong>
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
Cruz del Sur
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
10:30AM
</td>
<td style="border-bottom: 1px dotted #CCC; border-left: 1px solid #CCC;" align="right">
5:40PM
</td>
</tr>';


$html.='</table>';

if($opciones2['precio']!='0'){

$html.=email_precio($precios,array('formato'=>'2','moneda'=>'2'));

}

$html.='</div></div><div style="height: 5px;">&nbsp;</div></td><td></td></tr><tr><td colspan="3" height="5"></td></tr>

</table>';
$html.='';	

}



$html=email_editable("Bus",$html,$datos,$opciones2['orden'],$opciones2['editable']);


return $html;

}

?>