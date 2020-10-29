<?php //á

require_once('class.phpmailer.php');

if(0){
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 1; // 1 tells it to display SMTP errors and messages, 0 turns off all errors and messages, 2 prints messages only.
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtpout.secureserver.net";
	$mail->Port = 465;
	
	$mail->Username = "informacion001@ofertastravel.info";
	$mail->Password = "elieli";
	
	$mail->From = "informacion001@ofertastravel.info";
	$mail->FromName = "Calandria Travel"; 
	$mail->AddAddress("guillermolozan@gmail.com");
	//$mail->AddReplyTo("Email Address HERE", "Name HERE"); // Adds a "Reply-to" address. Un-comment this to use it.
	$mail->Subject = "prueba de asunto";
	$mail->Body = "Prueba de mensaje.";
	
	if ($mail->Send() == true) {
	echo "The message has been sent";
	}
	else {
	echo "<p>The email message has <strong>NOT</strong> been sent for some reason. Please try again later.</p>";
	echo "Mailer error: " . $mail->ErrorInfo;
	
	}
	exit();

}

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
	
chdir("base2");


$SERVER['BASE']='http://calandriatravel.com';

?>
<html>
<style>
.uno { float:left;width:300px; clear:left; overflow:hidden;}
.dos { float:left;width:100px; }
.tres { float:left;width:350px; }
.cuatro { float:left;width:300px; }
</style>
<?php

set_time_limit(0);

require_once('class.phpmailer.php');

//prin($_SERVER);

$PROVEEDORES=array('10','11');

$PROVEEDOR=10;

switch($PROVEEDOR){
case "6":
	//limite: 250 por dia
	$bloque_envios=250; //MUY IMPORTANTE	
	$RELAYS=250;
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=15;
	//500 disponibles
break;	
case "3":
	//limite: 250 por dia
	$bloque_envios=250; //MUY IMPORTANTE	
	$RELAYS=250;	
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=15;
	//500 disponibles
break;
case "2":
	//limite: 500 emails por 30 minutos
	$bloque_envios=100; //MUY IMPORTANTE
	$RELAYS=500;
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=15; 
	//150 disponibles
break;
case "33":
	//limite: 250 por dia
	$bloque_envios=50; //MUY IMPORTANTE	
	$RELAYS=250;	
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=15;
	//500 disponibles
break;
case "5":
	//limite: 250 por dia
	$bloque_envios=200; //MUY IMPORTANTE	
	$RELAYS=35;	
	$num_segundos=3600; //una hora	
	$limite_fallidos=15;
	//500 disponibles
break;
case "10": case "11":
	//limite: 250 por dia
	$bloque_envios=18; //envios cada 2 min
	$RELAYS=11;
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=15;
	//500 disponibles
break;
}

//echo 'http://'.$_SERVER['SERVER_NAME'].'/panel/base2/open.php?read=1&email='.$email['email']['address']);


//REACTUALIZA LAS CUENTAS

/*
$items=select("usuario,proveedor,clave,relays,enabled,time_0,","cuentas","where enabled='1' and	proveedor='$PROVEEDOR'");
prin($items);
*/


$return=update(
	array('relays'=>$RELAYS)
	,"cuentas"
	,"where
		TIME_TO_SEC(TIMEDIFF(now(),time_0))>$num_segundos
			and
		enabled='1'
			and
		proveedor in (".implode(",",$PROVEEDORES).")
	"
	,0
	);



//prin($return);
//SELECT DE LA BASE

$faltan = contar(
        "lista_envio"
        ,"where enviado='0' and ( fallido is NULL or fallido<".$limite_fallidos." ) "
		);

echo "$faltan solicitudes faltan por enviar<br>";		

$base = select(
        "id,id_grupo,id_email,enviado,leido,linkeado,fallido"
        ,"lista_envio"
        ,"where enviado='0' and ( fallido is NULL or fallido<".$limite_fallidos." ) order by id asc limit 0,$bloque_envios"
        ,0
		,array(
        	'email'=>array('sub_select_fila'=>array(
		                			    'campos'=>"id,email as address,nombre"
                                	    ,'tabla' =>"emails_items"
                                	    ,'donde' =>"where id='{id_email}' and enabled!='0' "
                                       	,'debug' =>0
                                      )
                                )								
			)
 		     
		);
		
//prin($SERVER);
//exit();	


	
foreach($base as $item){

	//GET CAMPAIN
	$id_campain=select_dato("id_grupo","solicitudes","where id='".$item['id_grupo']."'");
	
	$campain_datos = select_fila(
			"id,nombre,asunto,fronname,replayto,enviar_texto,texto,file,publicado,n_solicitados,n_enviados,n_leidos,n_linkeados,fecha_creacion"
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
												,'donde' =>"where id_grupo='{id}' "
												,'debug' =>0
												,'opciones'=>array(
													'carpeta'=>'camfot_imas'
													,'tamano'=>'2'
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
//prin($campains);
	//GET CUENTA
	$cuentas= select(
			"id,usuario,clave,relays,enabled,time_0,fecha_creacion,proveedor"
			,"cuentas"
			,"where 1 and enabled='1' and proveedor in (".implode(",",$PROVEEDORES).") and relays>0 order by relays desc, ordenprove asc, id asc limit 0,1"
			,0
			);
	
	$cuenta=$cuentas[0];		

	if(!empty($cuenta)){
	
	//	echo $campain_datos['enviar_texto'].":<br>";
		if(!empty($item['email'])){		
			$Enviado=sendTo($item['email']['address'],$cuenta['usuario'],$cuenta['clave'],$campain_datos['asunto'],makeHtml($campain_datos,$item),$campain_datos['fronname'],$campain_datos['replayto'],$cuenta['proveedor']);
			$RETURN = "<span class='uno'>".$item['email']['address']." -> </span>".( ($Enviado)?"<span class='dos' style='color:green;'>enviado</span>":"<span style='color:red;'  class='dos'>no enviado</span>" ) ;			
		} else {	
	//		prin($Enviado);
			$RETURN = "";
		}
		
			$RETURN .= "<span class='tres'>".$cuenta['usuario']." (".$cuenta['relays']." relays)</span><span class='cuatro'>".$campain_datos['nombre']."</span>";
		
	} else {
	
		$RETURN = "no hay cuenta disponible<br>";
		
	}
	
	$num_fallidos=0;
	$new_num_fallidos=0;
	if($Enviado){
		
		//EN EL CASO DE EXITO
		update(
			array('enviado'=>1)
			,"lista_envio"
			,"where id='".$item['id']."'"
			);	
		
		//EN EL CASO DE EXITO
		$data=array();
		if($cuenta['relays']==$RELAYS){
			$data['time_0']="now()";
		}
		$data['relays']=$cuenta['relays']-1;
		update(
			$data
			,"cuentas"
			,"where id='".$cuenta['id']."'"
		);
	
	} else {
	
		//EN EL CASO FALLO

		$fila = select_fila(
				"id_email,fallido"
				,"lista_envio"
				,"where id='".$item['id']."'"
				,0
				);
//		prin($fila);		

		$new_num_fallidos=($fila['fallido']!='')?( $fila['fallido']+ 1 ):"1";
		//prin($new_num_fallidos);
		
		if($fila['fallido']>$limite_fallidos){
		
			update(array(    
					'enabled'=>"0"
					)    
				  ,"emails_items"
				  ,"where id='".$fila['id_email']."'"
				  ,0);
    	
		} else {
		
			update(
				array('fallido'=>$new_num_fallidos)
				,"lista_envio"
				,"where id='".$item['id']."'"
				,0
				);
					
		}			
				
	}
	
	echo $RETURN. ( ($Enviado)?"":" ".$fila['fallido']." intentos fallidos" ) ."<br>";
	
}

function sendTo($email,$cuenta,$pass,$asunto,$html,$fromName,$replayTo,$IdProveedor){

	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	$mail->IsSMTP(); // telling the class to use SMTP
	try {
	
	  switch($IdProveedor){
	  case "6":
		  $mail->Host       = "smtpout.secureserver.net"; // SMTP server
	//	  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
		  $mail->SMTPAuth   = true;                  // enable SMTP authentication
	//	  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
		  $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
		  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		  $mail->Host       = "smtpout.secureserver.net"; // sets the SMTP server
	  break;

	  case "3":
		  $mail->Host       = "smtpout.secureserver.net"; // SMTP server
	//	  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
		  $mail->SMTPAuth   = true;                  // enable SMTP authentication
	//	  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
		  $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
		  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		  $mail->Host       = "smtpout.secureserver.net"; // sets the SMTP server
	  break;
	  case "2":
	  
		  $mail->Host       = "mail.calandriapromociones.info"; // sets the SMTP server
		  $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
		  $mail->SMTPAuth   = true;                  // enable SMTP authentication
		  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		  $mail->Host       = "mail.calandriapromociones.info"; // sets the SMTP server

	  break;	
	  case "10":
	  
		  $mail->Host       = "mail.travelofertas.info"; // sets the SMTP server
		  $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
		  $mail->SMTPAuth   = true;                  // enable SMTP authentication
		  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		  $mail->Host       = "mail.travelofertas.info"; // sets the SMTP server

	  break;	
	  case "11":
	  
		  $mail->Host       = "mail.ofertastravel.info"; // sets the SMTP server
		  $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
		  $mail->SMTPAuth   = true;                  // enable SMTP authentication
		  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		  $mail->Host       = "mail.ofertastravel.info"; // sets the SMTP server

	  break;		  	    
	  }
	  
	  $mail->CharSet = "UTF-8";		  
	  
	  $eemails=array();
	  $eemails=explode(",",$email);
	  foreach($eemails as $eemail){
	  	$mail->AddAddress($eemail);
	  }
	  
	  $mail->Subject = $asunto;

	  
	  $mail->MsgHTML($html);
	  
	  $mail->Username   = $cuenta;  // GMAIL username
	  $mail->Password   = $pass;            // GMAIL password
	  
	  $mail->AddReplyTo($replayTo, $fromName);
	  $mail->SetFrom($cuenta, $fromName);
	  //$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
	//$mail->AddAttachment('images/phpmailer.gif');      // attachment
	//$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
	$exito = $mail->Send();
	$intentos=1;
	while ((!$exito) && ($intentos++ < 5))
	{   sleep(2); // esperar 2 segundos
		$exito = $mail->Send();
	}
	return $exito;
		  
	} catch (phpmailerException $e) {
	  echo "errorA:" . $e->errorMessage(); //Pretty error messages from PHPMailer
	  echo "[$cuenta]";
	} catch (Exception $e) {
	  echo "errorB:" . $e->getMessage(); //Boring error messages from anything else!
	  echo "[$cuenta]";
	}
}
				
function makeHtml($campain,$email){

global $SERVER;

$Array_Meses1=array(1=>"enero","febrero","marzo","abril","mayo","junio","julio","agosto","setiembre","octubre","noviembre","diciembre");
$unix=date("U");

$html='';
$html.='<body  topmargin="0" marginheight="0" ><table width="850" height="100%" border="0" cellpadding="0" cellspacing="0"><tr><td>';

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

$html.='<table border="0" align="center" cellpadding="0" cellspacing="0"><tr><td  valign="top"><table  border="0" cellspacing="0" cellpadding="0">
         	<tr><td height="23" style="font-family:Arial, Helvetica, sans-serif;font-size:12px" colspan="2">						
			<div align="center">
			si no puede visualizar este mensaje, 
        	<a href="'.$SERVER['BASE'].'/panel/base2/show.php?id='.$campain['id'].'">pulse aqu&iacute;</a>
        	</div>
			</td></tr>
			';
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
				$html.='<tr><td colspan="2">
					<img src="http://calandriatravel.com/panel/base2/pieflyer.jpg"  border="0"/>
				</td></tr>';			
			}
$html.='</table>
		</td></tr></table>
		<table  border="0" align="center" cellpadding="0" cellspacing="0"><tr><td height="144">
		    <table width="100%" height="150" border="0" cellpadding="0" cellspacing="0"><tr><td  height="150" style="font-family:Arial, Helvetica, sans-serif;font-size:11px">
			  <div align="center">Si nuestra publicidad le ha sido remitida por error o no resulta de su inter&eacute;s y no desea recibirla m&aacute;s, le agradeceremos hacer click <a href="http://calandriatravel.com/panel/base2/exclusiones.php?bloquear='.$email['email']['address'].'">aqu&iacute;</a> y especificar su email. El presente e-mail respeta las normas del ART 5 de la <br />
LEY 28493 Ley que regula el uso de correo electr&oacute;nico comercial no solicitado (SPAM) publicado en el diario oficial <br />
El Peruano el 12 de abril del 2005<br/>
<br/></div>
			</td></tr></table>
		 </td></tr></table> 
	</td></tr></table>
<img width="1" height="1" src="'.$SERVER['BASE'].'open.php?id='.$email['id'].'&id2='.$email['email']['id'].'" style="display:" />
</body>
';

//$html=str_replace("calandriatravel.com","calandriapromociones.info",$html);

//echo "body:".$html;

return $html;

}		

?>
</html>