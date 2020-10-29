<?php //á
require_once('class.phpmailer.php');

chdir("../");

include("lib/compresionInicio.php");
include("lib/global.php");
include("lib/conexion.php");
include("lib/mysql3.php");
include("lib/util.php");
include("config/tablas.php");
include("lib/sesion.php");
include("lib/playmemory.php");

$params=filtrarGET($SERVER['PARAMS'],array('paso','error','verprueba'));

include("head.php");

chdir("base2");

$dominio='http://olvacompras.com';
$color1='#FFD00A';
$color2='#FFF';
$color3='#FFF';

if(0){
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 1; // 1 tells it to display SMTP errors and messages, 0 turns off all errors and messages, 2 prints messages only.
	/*
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtpout.secureserver.net";
	$mail->Port = 465;
	*/
	if(1){
	$mail->Host       = "olvacourier.info"; // sets the SMTP server
	$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
//	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
//	$mail->Host       = "olvacourier.info"; // sets the SMTP server
	$mail->Username = "boletin001@olvacourier.info";
	$mail->Password = "elieli";
	$mail->From = "boletin001@olvacourier.info";
	}
	
	if(0){
	$mail->Host       = "mail.calandriatravel.net"; // sets the SMTP server
	$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "mail.calandriatravel.net"; // sets the SMTP server
	$mail->Username = "promociones001@calandriatravel.net";
	$mail->Password = "elieli";
	$mail->From = "promociones001@calandriatravel.net";
	}
	
	
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

?>
<style>
body { background:none; }
#div_allcontent { min-width:0; }
.bloque_iframe { padding:5px 10px; height:auto; border-bottom:1px solid #999; padding-bottom:15px; margin-bottom:15px; }
.bloque_iframe h1 { font-size:24px; color:#333; margin:10px 0;  }
.bloque_iframe h2 { font-size:20px; color:#000; margin:5px 0; }
.bloque_iframe form { padding:0px 10px; clear:left; }
.bloque_iframe form input { clear:left; float:left; margin:3px 0; float:left; width:auto; padding: 3px 10px; text-transform:uppercase; }
.bloque_iframe p { clear:left; padding:2px 10px 0 20px; margin:0;  }
.uno { float:left;width:300px; clear:left; overflow:hidden;}
.dos { float:left;width:100px; }
.tres { float:left;width:350px; }
.cuatro { float:left;width:300px; }
</style>
<body>
<?php
echo $HTML_ALL_INICIO;
echo $HTML_MAIN_INICIO;	

if($_GET['verprueba']=='1'){

?>
<div class="bloque_iframe">
<h1>Ver Boletín</h1>
<h2>Seleccionar Boletín que desea visualizar</h2>
<form method="get">
<label>Boletín:</label>
<select name='id_campain' onChange="location.href='<?php echo $SERVER['RUTA'];?>?verprueba=1<?php echo $params;?>&id_campain='+this.value;">
<option value="">boletín standard</option>
<!--<option value="standard">Boletin de bloques ( boletín antiguo )</option>-->
<?php $grupos=select("nombre,id","campains","where 1 order by id asc"); ?>
<?php foreach($grupos as $grupo){ ?>
<option value="<?php echo $grupo['id'];?>" <?php echo ($_GET['id_campain']==$grupo['id'])?'selected':'';?> ><?php echo $grupo['nombre'];?></option>
<?php } ?>
</select>
</form>
</div>
<?php

if($_GET['id']!=''){	
	$where=" id='".$_GET['id']."' ";
}elseif($_GET['id_filtro']!=''){
	$where=" id_filtro='".$_GET['id_filtro']."' ";
}else{
	$where='1';
}
	
$user= select_fila(
        "id,nombre,email"
        ,"boletines"
        ,"where ".$where." and  visibilidad='1' order by id asc limit 0,100"
        ,0
        );
	
if($_GET['id_campain']==''){
	echo makeHtmlFijo($user);
} else {
	
	$campain_datos = select_fila(
			"id,nombre,asunto,fronname,replayto,file,fecha_creacion"
			,"campains"
			,"where id='".$_GET['id_campain']."' "
			,0
			,array(          
					'carpeta'=>'camp_imas'
					,'tamano'=>'2'
					,'get_archivo'=>array('get_archivo'=>array(
												'carpeta'=>'{carpeta}'
												,'fecha'=>'{fecha_creacion}'
												,'file'=>'{file}'
												,'tamano'=>'{tamano}'
												)
											)
					  )   		
			);	
				
	echo makeHtmlCampain($campain_datos,$user);
	
}


} else {


//prin($_SERVER);

$PROVEEDOR=6;

switch($PROVEEDOR){
case "3":
	//limite: 250 por dia
	$bloque_envios=50; //MUY IMPORTANTE	
	$RELAYS=250;	
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=100;
	//500 disponibles
break;
case "4":
	//limite: 250 por dia
	$bloque_envios=250; //MUY IMPORTANTE	
	$RELAYS=100;	
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=100;
	//500 disponibles
break;
case "6":
	//limite: 250 por dia
	$bloque_envios=250; //MUY IMPORTANTE	
	$RELAYS=10000;	
	$num_segundos=3600*24; //un dia	
	$limite_fallidos=100;
	//500 disponibles
break;
case "7":
	//limite: 250 por dia
	$bloque_envios=10; //MUY IMPORTANTE
	$RELAYS=10000;
	$num_segundos=3600*24; //un dia
	$limite_fallidos=100;
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
		( TIME_TO_SEC(TIMEDIFF(now(),time_0))>$num_segundos )
			and 
		enabled='1'
			and
		proveedor='$PROVEEDOR'			
	"
	,0
	);
//prin($return);
//SELECT DE LA BASE

//prin($_GET);

if($_GET['enviarprueba']=='1'){


$fila = select_fila(
        "id,email as address,nombre"
        ,"boletines"
		,"where id='".$_GET['id']."' and (enabled!='0' or enabled is NULL) and visibilidad!='0' "
        ,0
		);


$base[] = array('email'=>$fila);
			
} else {
	
$faltan = contar(
        "lista_envio"
        ,"where enviado='0' and ( fallido is NULL or fallido<".$limite_fallidos." ) "
		);

echo "$faltan solicitudes faltan por enviar<br>";		

$base = select(
        "id,id_grupo,id_email,enviado,leido,linkeado,fallido,id_campain"
        ,"lista_envio"
        ,"where enviado='0' and ( fallido is NULL or fallido<".$limite_fallidos." ) order by id asc limit 0,$bloque_envios"
        ,0
		,array(
        	'email'=>array('sub_select_fila'=>array(
		                			    'campos'=>"id,email as address,nombre"
                                	    ,'tabla' =>"boletines"
                                	    ,'donde' =>"where id='{id_email}' and (enabled='1' or enabled is NULL)"
                                       	,'debug' =>0
                                      )
                                )
			)  
 			      
		);

}

//prin($base);
foreach($base as $item){

	$cuentas= select(
			"id,usuario,clave,relays,enabled,time_0,fecha_creacion"
			,"cuentas"
			,"where 1 and enabled='1' and proveedor='$PROVEEDOR' and relays>0 order by relays desc, id asc limit 0,1"
			,0
			);
	$cuenta=$cuentas[0];

	if(!empty($cuenta)){
		// $item['email']['address']='guillermolozan@gmail.com';
		// echo $campain_datos['enviar_texto'].":<br>";
		if(!empty($item['email'])){

			if($item['id_campain']=='-1'){

				$archivos['asunto']=select_dato(
						"titulo"
						,"banners_boletin"
						,"where nombre='ASUNTO'"
						,0
						);
				$archivos['fronname']='Olva Compras';
				$archivos['replayto']='boletin@olvacompras.com';

				$Enviado=sendTo($item['email']['address'],$cuenta['usuario'],$cuenta['clave'],$archivos['asunto'],makeHtmlFijo($item['email']),$archivos['fronname'],$archivos['replayto'],$PROVEEDOR);

			} else {

				$archivos = select_fila(
						"id,nombre,asunto,fronname,replayto,file,fecha_creacion"
						,"campains"
						,"where id='".$item['id_campain']."' "
						,0
						,array(
								'carpeta'=>'camp_imas'
								,'tamano'=>'2'
								,'get_archivo'=>array('get_archivo'=>array(
															'carpeta'=>'{carpeta}'
															,'fecha'=>'{fecha_creacion}'
															,'file'=>'{file}'
															,'tamano'=>'{tamano}'
														)
													)
								  )
						);
				
				$Enviado=sendTo($item['email']['address'],$cuenta['usuario'],$cuenta['clave'],$archivos['asunto'],makeHtmlCampain($archivos,$item['email']),$archivos['fronname'],$archivos['replayto'],$PROVEEDOR);
			
			}
			
			$RETURN = "<span class='uno'>".$item['email']['address']." -> </span>".( ($Enviado)?"<span class='dos' style='color:green;'>enviado</span>":"<span style='color:red;'  class='dos'>no enviado</span>" );
				
		} else {	
			//prin($Enviado);
			$RETURN = "";
		}
		
		$RETURN .= "<span class='tres'>".$cuenta['usuario']." (".$cuenta['relays']." relays)</span><span class='cuatro'>".$campain_datos['nombre']."</span>";
	
	} else {
	
		$RETURN = "no hay cuenta disponible<br>";
		
	}
	
	$num_fallidos=0;
	$new_num_fallidos=0;
	
	if($Enviado){

		if($_GET['enviarprueba']!='1'){		
		
			//EN EL CASO DE EXITO
			update(
				array('enviado'=>1)
				,"lista_envio"
				,"where id='".$item['id']."'"
				);	

		}
		
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
			,0
		);
	
	} else {
	
		//EN EL CASO FALLO
		if($_GET['enviarprueba']!='1'){		

			$fila = select_fila(
					"id_email,fallido"
					,"lista_envio"
					,"where id='".$item['id']."'"
					,0
					);
	//		prin($fila);		
		
			//prin($new_num_fallidos);
		
			$new_num_fallidos=($fila['fallido']!='')?( $fila['fallido']+ 1 ):"1";
		
			if($fila['fallido']>$limite_fallidos){
			
				update(array(    
						'enabled'=>"0"
						)    
					  ,"boletines"
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
				
	}
	
	echo $RETURN. ( ($Enviado)?"":" ".$fila['fallido']." intentos fallidos" ) ."<br>";
	
}


}


echo $HTML_MAIN_FIN;	
echo $HTML_ALL_FIN;
?>
</body>
</html>
<?php

function render_fichero($item){

	$link=$item['link'];
	$filE=$item['get_archivo'];
	$titulo=$item['titulo'];
	$fa=explode(".",$filE);
	$ext = $fa[sizeof($fa)-1];
	$html='';
	list($ww,$hh)=explode("x",$item['dimensiones']);
	$linc="http://".str_replace("http://","",$link);
	$html.= ($link!='')?"<a href='$linc' target='_blank'>":'';
	$html.= '<img border="0" src="'.$filE.'" ';
	$html.= ($ww!='')?' width="'.$ww.'" height="'.$hh.'" ':'';
	//echo ($titulo!='')?' title="'.$titulo.'" alt="'.$titulo.'" ':'';
	$html.= ' />';
	$html.= ($link!='')?"</a>":'';
	return $html;
}

function makeHtmlFijo($email){

//prin($data);
global $dominio;
global $SERVER;
global $color1;
global $color2;

/**********    QUERY    ************/
$archivos= select(
		"id,nombre,fichero,fecha_creacion,url as link,dimensiones,texto as post,titulo as texto"
		,"banners_boletin"
		,"where 1 and  visibilidad='1' order by id asc limit 0,100"
		,0
		,array(
				'get_archivo'=>array('get_archivo'=>array('carpeta'=>'banbol_imas','fecha'=>'{fecha_creacion}','file'=>'{fichero}'))
			  )
		);
foreach($archivos as $archivo){
	$BANNERS[$archivo['nombre']]=$archivo;
}
//INICIO
$html='';
$html.='<body  topmargin="0" marginheight="0" >';
  $html.='<table border="0" cellpadding="0" cellspacing="0" width="689" align="center">';
  //SALUDO 	
  $html.='<tr><td colspan="2" align="left" style="font-family:arial;">';
	if($email['nombre']!=''){ 
		$html.='Hola '.ucwords($email['nombre'])."<br><br>"; 
	} else {
		$html.="Estimado(a) Amigo(a)<br><br>";
	} 
  //TEXTO
  //$html.="La siguiente Información podría ser de su interés:<br><br>";	
  $html.="</td></tr>";
  //LOGO		
  if($BANNERS['logo']!=''){ $html.='<tr><td bgcolor="#FAB830" colspan="2" align="center">'.render_fichero($BANNERS['logo']).'</td></tr>'; }
  //FECHA 
  $html.='<tr><td colspan="2">
  <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center"><tr>
    <td height="30" bgcolor="#FAB830"  align="left" style="font-size:12px;color:#000;padding-left:10px;font-family:arial;">';
	$html.=fecha_formato("now()",2);
	$html.='</td><td bgcolor="#FAB830" align="right" style="padding-right:10px;">';
	$html.='</td>
  </tr></table></td></tr>';
  	  //MAIN
	  $html.='<tr>';
	  $html.='<td width="509" bgcolor="#FAB830" valign="top">';
	  $html.='<table border="0" cellpadding="0" cellspacing="0" width="509" align="center">';
	  for($i=1;$i<=3;$i++){
		  if($BANNERS['principal_'.$i]){
			  $html.='<tr><td bgcolor="#FAB830"  align="left" style="padding-left:10px;">';
			  $html.='<table border="1" bordercolor="#333333" cellpadding="0" cellspacing="0" width="100%" align="center" bgcolor="#FFFFFF">
			  <tr><td style="padding-left:10px;padding-top:6px;" border=0>';
			  $html.=str_replace("<img ","<img style='float:left;margin-right:10px;margin-bottom:10px;'",render_fichero($BANNERS['principal_'.$i])).'
			  <span style="display:block;font-size:16px;font-weight:bold;font-family:arial;">'.$BANNERS['principal_'.$i]['texto'].'</span>
			  '.$BANNERS['principal_'.$i]['post'];
			  $html.='</td></tr></table>';	
			  $html.='</td></tr>';
		  }
	  }
	  $html.='</table>';		  
	  $html.='</td>';
	  //DERECHA
	  $html.='<td width="170" bgcolor="#FAB830" valign="top" >';
	  for($i=1;$i<=3;$i++){ 
		  if($BANNERS['derecha_'.$i]){
			  $html.='<div>'.render_fichero($BANNERS['derecha_'.$i]).'</div>';
		  }				  
	  } 
	  $html.='</td>
	  </tr>';
	  
	  $html.='<tr><td width="689" height="15" bgcolor="#ffffff" colspan="2" ></td></tr>';	
  //PIE
  if($BANNERS['pie']!=''){ $html.='<tr><td bgcolor="#A3A3A3" colspan="2" align="center">'.render_fichero($BANNERS['pie']).'</td></tr>'; }
  //LEGAL 	
  $html.='<tr><td colspan="2">';
		$html.='<table  border="0" align="center" cellpadding="0" cellspacing="0"><tr><td height="80">		    
			<table width="100%" height="auto" border="0" cellpadding="0" cellspacing="0"><tr><td  height="auto" style="font-family:Arial, Helvetica, sans-serif;font-size:11px">
			  <div align="center">
Si no desea seguir recibiendo esta información haga clic <a href="'.$dominio.'/panel/base2/exclusiones.php?bloquear='.$email['email'].'">aqu&iacute;</a>.
			  <br/><br/></div>
			</td></tr></table>					
		 </td></tr></table>';  
  $html.='</td></tr>';   
  //CIERRE
$html.='</table>';
$html.='</body>';
//FIN
//echo "<textarea>".$html."</textarea>";
return $html;
}

function makeHtmlCampain($campain,$email){

global $SERVER;
//INICIO
$html='';
$html.='<body  topmargin="0" marginheight="0" >
<table width="800" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td style="font-family:arial;">';
//SALUDO
if($email['nombre']!=''){ 
	$html.='Hola '.ucwords($email['nombre'])."<br><br>"; 
} else {
	$html.="Estimado(a) Amigo(a)<br><br>";
}
//TEXTO
$html.="La siguiente Información podría ser de su interés:<br><br>";
/*
$html.='<div align="center">
			si no puede visualizar este mensaje, 
        	<a href="'.$SERVER['BASE'].'/panel/base2/show.php?id='.$campain['id'].'">pulse aqu&iacute;</a>
        </div>';
*/		
$html.='</td></tr>';
//IMAGEN
$html.='<tr><td>';			
$html.='<table  border="0" cellspacing="0" cellpadding="0">';
$html.='<tr>';
$html.='<td colspan="2">';
//if(trim($bloque['link'])!=''){ $html.='<a href="'.$bloque['link'].'">'; }
$html.='<img src="'.$campain['get_archivo'].'"  border="0"/>';
//if(trim($bloque['link'])!=''){ $html.='</a>'; }
$html.='</td>';
$html.='</tr>';
$html.='</table>';
$html.='</td></tr>';
//LEGAL
$html.='<tr><td>';
$html.='<table  border="0" align="center" cellpadding="0" cellspacing="0"><tr><td height="150" style="font-family:Arial, Helvetica, sans-serif;font-size:11px">
			  <div align="center">Si nuestra publicidad le ha sido remitida por error o no resulta de su inter&eacute;s y no desea recibirla m&aacute;s, le agradeceremos hacer click <a href="http://calandriatravel.com/panel/base2/exclusiones.php?bloquear='.$email['email'].'">aqu&iacute;</a> y especificar su email. El presente e-mail respeta las normas del ART 5 de la <br />
LEY 28493 Ley que regula el uso de correo electr&oacute;nico comercial no solicitado (SPAM) publicado en el diario oficial <br />
El Peruano el 12 de abril del 2005<br/>
<br/></div>
		 </td></tr></table>'; 
$html.='</td></tr>';
//CIERRE
$html.='</table>';
$html.='</body>';
//FIN
return $html;
}		



function sendTo($email,$cuenta,$pass,$asunto,$html,$fromName,$replayTo,$IdProveedor){
//prin("$email,$cuenta,$pass,$asunto,$html,$fromName,$replayTo,$IdProveedor");
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	$mail->IsSMTP(); // telling the class to use SMTP
	try {
	
	  switch($IdProveedor){
	  case "3":
	  
		$mail->SMTPDebug = 1; // 1 tells it to display SMTP errors and messages, 0 turns off all errors and messages, 2 prints messages only.
		$mail->SMTPAuth = true;
		//$mail->SMTPSecure = "ssl";
		$mail->Host = "smtpout.secureserver.net";
		$mail->Port = 25;	  
	  		
	  break;
	  case "6":
			$mail->SMTPDebug = 1; // 1 tells it to display SMTP errors and messages, 0 turns off all errors and messages, 2 prints messages only.
			$mail->SMTPAuth = true;
			//$mail->SMTPSecure = "ssl";
			//$mail->Host = "190.187.55.82";
			$mail->Host = "olvacourier.info";		
			$mail->Port = 25;	
			$cuenta='boletin001@olvacourier.info';
			$password='compraonlinecourier2011';
	  break;	  
	  case "7":
			$mail->Host       = "mail.calandriatravel.net"; // SMTP server
			//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
			$mail->Host       = "mail.calandriatravel.net";      // sets GMAIL as the SMTP server
			$mail->Port       = 465;
	  break;
	  case "4":
			$mail->Host       = "mail.olvacompras.com"; // SMTP server
			//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
			$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
			$mail->Port       = 465;
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
	  
	  $mail->AddReplyTo("informes@olvacompras.com", $fromName);
	  $mail->SetFrom($cuenta, $fromName);
	  
			$exito = $mail->Send();
			$intentos=1;
			while ((!$exito) && ($intentos++ < 5))
			{   sleep(1); // esperar 2 segundos
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

include("lib/compresionFinal.php");
?>