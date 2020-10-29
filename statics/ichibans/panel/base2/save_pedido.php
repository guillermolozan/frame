<?php //á

chdir("../");
//include("lib/includes.php");
	include("lib/global.php");	
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");	
	include("lib/sesion.php");
	
	chdir("base2");
	
	include("includes.php");
	
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$ESTADO = select_dato(
        "estado"
        ,"ventas_pedidos"
        ,"where id='".$_POST['id']."'"
        ,0
        );	
	
$CACHE = unserialize(select_dato(
        "cache"
        ,"ventas_pedidos"
        ,"where id='".$_POST['id']."'"
        ,0
        ));
			
	switch($_POST['accion']){
		
	case "item":
	
		$seleccion=$CACHE;
		
		if($_POST['ope']=='add'){
			
			if(in_array(substr(strtolower($_POST['item']),0,1),array('p','h'))){ $_POST['item']= substr($_POST['item'],1)*1; }		
			
			if(is_numeric($_POST['item']) or $_POST['item']=='blanco'){
				
				if($_POST['item']=='blanco'){

					list($tipo,$val)=explode("=",$_POST['tipo']);
					
					switch($tipo){
						
						case "paquete":
						
							$content=email_paquete($datos,'',array(
																				'acomodacion'=>2
																				,'monedas'=>array('dolares')
																				,'editable'=>0
																				,'orden'=>0
																				,'blank'=>1
																				)); 
							
						break;
						case "aereo":
				
							$content=email_aereo($datos,array(
																				'acomodacion'=>2
																				,'editable'=>0
																				,'orden'=>0
																				,'blank'=>1
																				)); 
				
						break;
						case "bus":
						
							$content=email_bus($datos,array(
																				'acomodacion'=>2
																				,'editable'=>0
																				,'orden'=>0
																				,'blank'=>1
																				)); 
				
						break;		
						case "hotel":
						
							$content=email_hotel($datos,$item['id'],array(
																				'acomodacion'=>2
																				,'monedas'=>array('dolares')
																				,'editable'=>0
																				,'orden'=>0
																				,'blank'=>1
																				));
						break;
						case "comentario":
						
							$content=email_comentario($datos,$item['id'],array(
																				'acomodacion'=>2
																				,'monedas'=>array('dolares')
																				,'editable'=>0
																				,'orden'=>0
																				,'blank'=>1
																				));
						break;						
						
					}					

					$seleccion['pedido'][]=array($_POST['tipo']=>array('blank'=>'1','html'=>$content));					
					
				} else {

					$nuevo=1;					
					foreach($seleccion['pedido'] as $sel){
						if(key($sel)==$_POST['tipo']){
							if($sel[$_POST['tipo']]['id']==$_POST['item']){
								$nuevo=0;
							}
						}
					}
					
					if($nuevo=='1'){
						
						/*if($_POST['tipo']=='paquete'){
							$hos=array();
							$hoteles=array();
							$hoteles=select('id_hotel','paquetes_preciohotel',"where id_paquete='".$_POST['item']."'"); 
							foreach($hoteles as $ho){
								$hos[]=array('id'=>$ho['id_hotel']);
							}
							$seleccion['pedido'][]=array($_POST['tipo']=>array('id'=>$_POST['item'],'hoteles'=>$hos));
						} else {*/						
							$content=email_paquete($datos,$_POST['item'],array(
													'acomodacion'=>2
													,'monedas'=>array('dolares')
													,'editable'=>0
													,'orden'=>0
													,'blank'=>0
													)); 

							$seleccion['pedido'][]=array($_POST['tipo']=>array('id'=>$_POST['item'],'html'=>$content));
						/*}*/
						
					}
					
				}

			}
		
		} elseif($_POST['ope']=='del'){
			
			unset($seleccion['pedido'][$_POST['item']]);
						
		} elseif($_POST['ope']=='add_sub'){							
			
			$nuevo=1;
			$hoteles=$seleccion['pedido'][$_POST['item']][$_POST['tipo']][$_POST['subtipo']];
			foreach($hoteles as $hotel){				
				if($hotel['id']==$_POST['subitem']){
					
					$nuevo=0;
					
				}
			}
			
			if($nuevo=='1'){
				
				$seleccion['pedido'][$_POST['item']][$_POST['tipo']][$_POST['subtipo']][]=array('id'=>$_POST['subitem']);
				
			}					

					
			$content=email_paquete(array('seleccion'=>$seleccion['pedido']),$seleccion['pedido'][$_POST['item']][$_POST['tipo']]['id'],array(
									'acomodacion'=>2
									,'monedas'=>array('dolares')
									,'editable'=>0
									,'orden'=>0
									,'blank'=>0
									)); 
			$seleccion['pedido'][$_POST['item']][$_POST['tipo']]['html']=$content;		

			
		} elseif($_POST['ope']=='del_sub'){			

			$hoteles=$seleccion['pedido'][$_POST['item']][$_POST['tipo']][$_POST['subtipo']];
			foreach($hoteles as $hh=>$hotel){				
				//echo $hotel['id']."==".$_POST['subitem']."\n";
				if($hotel['id']==$_POST['subitem']){
					$hhh=$hh;
				}
			}
			
			//print_r($seleccion['pedido'][$_POST['item']][$_POST['tipo']][$_POST['subtipo']]);
			unset($seleccion['pedido'][$_POST['item']][$_POST['tipo']][$_POST['subtipo']][$hhh]);
			
			$content=email_paquete(array('seleccion'=>$seleccion['pedido']),$seleccion['pedido'][$_POST['item']][$_POST['tipo']]['id'],array(
									'acomodacion'=>2
									,'monedas'=>array('dolares')
									,'editable'=>0
									,'orden'=>0
									,'blank'=>0
									)); 
			$seleccion['pedido'][$_POST['item']][$_POST['tipo']]['html']=$content;			
							
		}
		
		//print_r($seleccion);
		
		
		update(array('cache'=>serialize($seleccion)),"ventas_pedidos","where id='".$_POST['id']."'");		
		
		if($ESTADO==1){	update(array('estado'=>'2'),"ventas_pedidos","where id='".$_POST['id']."'"); }
				
		/*if($_POST['ope']=='add_sub'){	}*/
		
	break;
	case "reset":
	
		update(array('cache'=>''),"ventas_pedidos","where id='".$_POST['id']."'");		
		
		if($ESTADO==2){	update(array('estado'=>'1'),"ventas_pedidos","where id='".$_POST['id']."'"); }		
	
	break;
	case "opcion":
		
		$CACHE['opciones'][$_POST['variable']]=$_POST['valor'];		
		update(array('cache'=>serialize($CACHE)),"ventas_pedidos","where id='".$_POST['id']."'");					

		if($ESTADO==1){	update(array('estado'=>'2'),"ventas_pedidos","where id='".$_POST['id']."'"); }
	
	break;
	case "grabar":
	
		$CACHE['opciones']['introduccion']	=$_POST['introduccion'];
		$CACHE['opciones']['firma']			=$_POST['firma'];
		$CACHE['opciones']['asunto']		=$_POST['asunto'];
		$CACHE['opciones']['from']			=$_POST['from'];		
		foreach($_POST as $key=>$pos){
			if(!in_array($key,array('id','accion','introduccion','firma','asunto','from'))){
				$yyy=key($CACHE['pedido'][str_replace("bloque_","",$key)]);
				$CACHE['pedido'][str_replace("bloque_","",$key)][$yyy]['html']=$pos;

			}			
		}

		update(array('cache'=>serialize($CACHE)),"ventas_pedidos","where id='".$_POST['id']."'");							

		if($ESTADO==1){	update(array('estado'=>'2'),"ventas_pedidos","where id='".$_POST['id']."'"); }
		
	break;
	case "enviar":	

		$pedido = select_fila(        "id,estado,id_usuario,nombre,genero,telefono,celular,email,id_pais,id_lugar,n_adultos,n_ninos,n_infantes,fecha_salida,fecha_retorno,servicio,comentario,anotaciones,via,fecha_creacion,genero,cache"
        ,"ventas_pedidos"
        ,"where id=".$_POST['id']." and  visibilidad='1' order by id asc limit 0,100"
        ,0
        );
		
//		prin($pedido);
		
		$seleccion	=	$CACHE['pedido'];
		$opciones	=	$CACHE['opciones'];
		$opciones['editable']='0';
		
		require_once('class.phpmailer.php');
	
		//limite: 250 por dia
		$bloque_envios=50; //MUY IMPORTANTE	
		$RELAYS=100;	
		$num_segundos=3600*24; //un dia	
		$limite_fallidos=100;
		//500 disponibles
				
		$html = email_content(array('pedido'=>$pedido,'seleccion'=>$seleccion,'opciones'=>$opciones));			
		
		//$pedido['email']='elisarocca@calandriatravel.com';
		
		//echo $html;
		
		$email=select_fila("nombre,email,password","ventas_cuentas","where id='".$opciones['from']."'");

		$ocultas="elisarocca@calandriatravel.com,sibyll21@hotmail.com";		
		
		if($LOCAL){ exit();	echo "no se envió debido a que estamos en el entorno Local";	}
		
		$Enviado=sendTo($pedido['email'],$ocultas,$email['email'],$email['password'],$opciones['asunto'],$html,'Calandria Travel',$email['email']);
		
		echo $pedido['email'].$copia_a_elisa;
		
		if($ESTADO==2){	update(array('estado'=>'3'),"ventas_pedidos","where id='".$_POST['id']."'"); }		
		
	break;
	case "get_paquetes":
		$paquetes=select("id,nombre","paquetes","where 1 and id_grupo='".$_POST['paquete_grupo']."'",0);
		echo json_encode($paquetes);				
	break;
	case "get_destinos":
		$paquetes=select("id,nombre","lugares","where 1 and id_pais='".$_POST['pais']."'",0);
		echo json_encode($paquetes);				
	break;
		
	}
	



function sendTo($email,$ocultas,$cuenta,$pass,$asunto,$html,$fromName,$replayTo){

	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	$mail->IsSMTP(); // telling the class to use SMTP
	try {
	
		$mail->Host       = "mail.calandriatravel.com"; // SMTP server
		//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;    

	  
	  $mail->CharSet = "UTF-8";		  
	  	  
	  $eemails=array();
	  $eemails=explode(",",$email);
	  foreach($eemails as $eemail){	$mail->AddAddress($eemail);  }
	  
	  $oocultas=array();
	  $oocultas=explode(",",$ocultas);
	  foreach($oocultas as $oculto){ $mail->AddBCC($oculto);  }	  
	  
	  $mail->Subject = $asunto;

	  
	  $mail->MsgHTML($html);
	  
	  $mail->Username   = $cuenta;  // GMAIL username
	  $mail->Password   = $pass;            // GMAIL password
	  
	  $mail->AddReplyTo($cuenta, $fromName);
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
	
		

?>