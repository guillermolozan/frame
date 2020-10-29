<?php

include("keys.php");
require_once "recaptchalib.php";
$resp = null;
$reCaptcha = new ReCaptcha($secret_key);
if ($_POST["g-recaptcha-response"]) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($resp->success && $resp !=NULL) {	
	// echo "soy humano";
	$respuesta="Gracias por escribirnos";
}else{
	header("Location:".$_SERVER['HTTP_REFERER']);
	exit();
}


error_reporting(0);

extract($_POST);


$adminaddress = "operaciones@heilly.com";

$siteaddress ="http://www.heilly.com";
$sitename = "INVERSIONES HEILLY E.I.R.L. :: Carga liviana, carga pesada, carga especial para minería, transporte de material peligroso";
$date = date("d/m/Y   H:i:s");


//echo "1";

//if ($action != ""){


mail("$adminaddress","CONTACTENOS :: INVERSIONES HEILLY E.I.R.L.",
"$date\n
Desde la página web $siteaddress, se ha enviado un e-mail con los siguientes datos\n
NOMBRES Y APELLIDOS          : $nombre
CIUDAD Y PAIS                : $ciudad
POR QUE MEDIO NOS ENCONTRO   : $lugar_servicio
TELÉFONO o CELULAR           : $telefono
EMAIL                        : $email
EMPRESA                      : $pasajeros\n
COMENTARIO   : 
------------------------------------------------------
$comentario


HOST INFO :
------------------------------------------------------
Using: $HTTP_USER_AGENT
Hostname: $ip
IP address: $REMOTE_ADDR","FROM:$adminaddress");

mail("$email","Gracias por visitar $sitename",
"Hola $nombre,\n
Gracias por enviarnos un e-mail. En breve estaremos contactándonos con usted.
Atentamente,\nINVERSIONES HEILLY E.I.R.L.\n
Teléf.: (01) 550-3843\n E-MAIL: operaciones@heilly.com\n
-----------------------------------------\n
$sitename
$siteaddress","FROM:$adminaddress");



mail("jk@peru.com","CONTACTENOS :: INVERSIONES HEILLY E.I.R.L.",
"$date\n
Desde la página web $siteaddress, se ha enviado un e-mail con los siguientes datos\n
NOMBRES Y APELLIDOS          : $nombre
CIUDAD Y PAIS                : $ciudad
POR QUE MEDIO NOS ENCONTRO   : $lugar_servicio
TELÉFONO o CELULAR           : $telefono
EMAIL                        : $email
EMPRESA                      : $pasajeros\n
COMENTARIO   : 
------------------------------------------------------
$comentario


HOST INFO :
------------------------------------------------------
Using: $HTTP_USER_AGENT
Hostname: $ip
IP address: $REMOTE_ADDR","FROM:$adminaddress");


mail("wtavara@prodiserv.com","CONTACTENOS :: INVERSIONES HEILLY E.I.R.L.",
"$date\n
Desde la página web $siteaddress, se ha enviado un e-mail con los siguientes datos\n
NOMBRES Y APELLIDOS          : $nombre
CIUDAD Y PAIS                : $ciudad
POR QUE MEDIO NOS ENCONTRO   : $lugar_servicio
TELÉFONO o CELULAR           : $telefono
EMAIL                        : $email
EMPRESA                      : $pasajeros\n
COMENTARIO   : 
------------------------------------------------------
$comentario


HOST INFO :
------------------------------------------------------
Using: $HTTP_USER_AGENT
Hostname: $ip
IP address: $REMOTE_ADDR","FROM:$adminaddress");

echo json_encode(array(
					't'=>'exito'
					,'u'=>''									
					,'m'=>"Gracias por escribirnos"
					,'n'=>'registro'									
					));	
//}
?>