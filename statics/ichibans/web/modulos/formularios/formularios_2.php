<?php //á
/**********************************************/
////////////////////////INCLUDES////////////////
/**********************************************/

// $HEAD['INCLUDES']['js'][]='js/mootools-1.2.3.1-more.js';
// $HEAD['INCLUDES']['js'][]='js/lang/es.js';
// $HEAD['INCLUDES']['js'][]='js/formcheck.js';
$HEAD['INCLUDES']['css'][]='css/theme/classic/formcheck.css'; //[blue,classic,green,grey,red,white]

/**********************************************/
/**********************************************/
/**********************************************/

$PARAMETROS_EMAIL['From']=$COMMON['datos_root']['email_from'];
$PARAMETROS_EMAIL['FromName']=$COMMON['datos_root']['email_fromname'];
$PARAMETROS_EMAIL['Logo']=$vars['REMOTE']['httpfiles']."/".THEME_PATH.'img/'.$COMMON['datos_root']['email_logo'];

//$PARAMETROS_EMAIL['disabled']=1;
//$PARAMETROS_EMAIL['debug']=1;

$PARAMETROS_EMAIL['emailsAdmin']=array_merge(explode(",",$COMMON['datos']['emails_admin']),explode(",",$COMMON['datos_root']['emails_admin']));

//prin($PARAMETROS_EMAIL['emailsAdmin']);
//exit();

/*
$PARAMETROS_EMAIL['emailsAdmin']=array(
										'guillermolozan@gmail.com'
										,'wtavara@gmail.com'
										);
*/
									
$PARAMETROS_EMAIL['nombre_web']=$COMMON['datos_root']['titulo_web'];
$PARAMETROS_EMAIL['url_web']=$vars['REMOTE']['httpfiles'];	

		
$body_firma ="";
//$body_firma.=$COMMON['datos']['direccion_email']."<br>";
$body_firma.=$COMMON['datos']['telefonos_email']."<br>".$COMMON['datos']['email_ventas']."<br>";
$body_firma.="<a href='".$vars['REMOTE']['httpfiles']."'>".$vars['REMOTE']['httpfiles']."</a>";
		
		
		/**********************************************/
		/***************   LOGIN *****************/
		/**********************************************/

		if(
			(in_array($_GET['modulo'],array("pagina-formulario")) and $_GET['tab']=='login' ) or //front	completo	
			(in_array($_GET['modulo'],array("pagina-items")) ) or //front bloque
			($_GET['mode']=='form' and $_GET['tab']=='login' )  //back			
		){
				
			include("formularios/login.php");
		
		}

		/**********************************************/
		/***************   CERRAR_SESSION *****************/
		/**********************************************/

		if(
			($_GET['mode']=='form' and $_GET['tab']=='cerrar_sesion' )  //back			
		){
				
			include("formularios/cerrar_sesion.php");
		
		}

		/**********************************************/
		/***************   REGISTRO  ******************/
		/**********************************************/
		if(
			(in_array($_GET['modulo'],array("pagina-formulario")) and $_GET['tab']=='registro' ) or
			($_GET['mode']=='form' and $_GET['tab']=='registro' )  //back			
		){
		
			include("formularios/registro.php");
		
		}
		
		/**********************************************/
		/************** PUBLICAR AVISO PASO 1 *********/
		/**********************************************/
		if(
			(in_array($_GET['modulo'],array("pagina-formulario")) and $_GET['tab']=='publicar-anuncio-1' ) or
			($_GET['mode']=='form' and $_GET['tab']=='publicar-anuncio-1' )  //back			
		){
		
			include("formularios/publicar-anuncio-1.php");
		
		}
		
		/**********************************************/
		/************** PUBLICAR AVISO PASO 2 *********/
		/**********************************************/
		if(
			(in_array($_GET['modulo'],array("pagina-formulario")) and $_GET['tab']=='publicar-anuncio-2' ) or
			($_GET['mode']=='form' and $_GET['tab']=='publicar-anuncio-2' )  //back			
		){
		
			include("formularios/publicar-anuncio-2.php");
		
		}		
				
		/**********************************************/
		/***************   CONTACTO   *****************/
		/**********************************************/
		if(
			(in_array($_GET['modulo'],array("pagina-formulario")) and $_GET['tab']=='contacto' ) or //front	completo	
			(in_array($_GET['modulo'],array("home","pagina","items","item"))) or //front bloque
			($_GET['mode']=='form' and $_GET['tab']=='contacto' )  //back			
		){
		
		
			include("formularios/contacto.php");

			
		}

		/**********************************************/
		/***************   RECOMENDAR   ***************/
		/**********************************************/
		if(
			(in_array($_GET['modulo'],array("home","pagina","items","item","pagina-formulario","pagina-app"))) or //front bloque
			($_GET['mode']=='form' and $_GET['tab']=='recomendar' )  //back
		){
	
			include("formularios/recomendar.php");
			
		}

		/**********************************************/
		/***********   REGISTRO DE PEDIDO   ***********/
		/**********************************************/
		if(
			(in_array($_GET['modulo'],array("pagina-formulario")) and $_GET['tab']=='carrito') or //front completo
			($_GET['mode']=='form' and $_GET['tab']=='carrito' )  //back			
		){
		
		
			include("formularios/pedido.php");
			
		}

	
?>