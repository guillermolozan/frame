<?php //á
/**********************************************/
/**********************************************/
/**********************************************/

$PARAMETROS_EMAIL['From']=$COMMON['datos_root']['email_from'];
$PARAMETROS_EMAIL['FromName']=$COMMON['datos_root']['email_fromname'];
$PARAMETROS_EMAIL['Logo']=$vars['REMOTE']['httpfiles']."/".THEME_PATH.'img/'.$COMMON['datos_root']['email_logo'];


/*PARAMETROS_EMAIL_MASTER-START*/
$PARAMETROS_EMAIL_MASTER['disabled']='0';
$PARAMETROS_EMAIL_MASTER['debug']='0';
$PARAMETROS_EMAIL_MASTER['email_prueba']='0';
/*PARAMETROS_EMAIL_MASTER-END*/

$PARAMETROS_EMAIL['emailsAdmin']=array_merge(explode(",",$COMMON['datos']['emails_admin']),explode(",",$COMMON['datos_root']['emails_admin']));

//exit();

if($PARAMETROS_EMAIL_MASTER['email_prueba']){

	$PARAMETROS_EMAIL['emailsAdmin']=array(
											'guillermolozan@gmail.com'
											,'wtavara@yahoo.es'
											);

}

//prin($PARAMETROS_EMAIL);
//prin($PARAMETROS_EMAIL['emailsAdmin']);

									
$PARAMETROS_EMAIL['nombre_web']=$COMMON['datos_root']['titulo_web'];
$PARAMETROS_EMAIL['url_web']=$vars['REMOTE']['httpfiles'];

		
$body_firma ="";
//$body_firma.=$COMMON['datos']['direccion_email']."<br>";
//$body_firma.=$COMMON['datos']['telefonos_email']."<br>".$COMMON['datos']['email_ventas']."<br>";
//$body_firma.="<a href='".$vars['REMOTE']['httpfiles']."'>".$vars['REMOTE']['httpfiles']."</a>";
		

	
?>