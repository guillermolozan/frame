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
	$respuesta="Thanks for writing";
}else{
	header("Location:".$_SERVER['HTTP_REFERER']);
	exit();
}

error_reporting(0);

extract($_POST);


$adminaddress = "info@gbl-inc.com";

$siteaddress ="http://www.gbl-inc.com";
$sitename = "Global Business Logistic, Inc.";
$date = date("d/m/Y   H:i:s");


//echo "1";

//if ($action != ""){


mail("$adminaddress","CONTACT US :: Global Business Logistic, Inc.",
"$date\n
Desde la página web $siteaddress, se ha enviado un e-mail con los siguientes datos\n
NAME                              : $nombre
CITY AND COUNTRY                  : $ciudad
¿BY WHAT MEANS DID YOU FIND US?   : $lugar_servicio
PHONE                             : $telefono
E-MAIL                            : $email
COMPANY                           : $pasajeros\n
MESSAGE                           : 
------------------------------------------------------
$comentario


HOST INFO :
------------------------------------------------------
Using: $HTTP_USER_AGENT
Hostname: $ip
IP address: $REMOTE_ADDR","FROM:$adminaddress");

mail("$email","Thanks for visiting $sitename",
"Hello $nombre,\n
Thanks for sending an e-mail. Shortly we will be contacting you.
Best regards,\nGBL Inc.\n
E-MAIL: info@gbl-inc.com\n
-----------------------------------------\n
$sitename
$siteaddress","FROM:$adminaddress");



mail("georg@gbl-inc.com","CONTACT US :: Global Business Logistic, Inc.",
"$date\n
From the website $siteaddress, sent an e-mail with the following information\n
NAME                              : $nombre
CITY AND COUNTRY                  : $ciudad
¿BY WHAT MEANS DID YOU FIND US?   : $lugar_servicio
PHONE                             : $telefono
E-MAIL                            : $email
COMPANY                           : $pasajeros\n
MESSAGE       
------------------------------------------------------
$comentario


HOST INFO :
------------------------------------------------------
Using: $HTTP_USER_AGENT
Hostname: $ip
IP address: $REMOTE_ADDR","FROM:$adminaddress");


mail("wtavara@prodiserv.com","CONTACT US :: Global Business Logistic, Inc.",
"$date\n
From the website $siteaddress, sent an e-mail with the following information\n
NAME                              : $nombre
CITY AND COUNTRY                  : $ciudad
¿BY WHAT MEANS DID YOU FIND US?   : $lugar_servicio
PHONE                             : $telefono
E-MAIL                            : $email
COMPANY                           : $pasajeros\n
MESSAGE       
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
					,'m'=>"Thanks for writing"
					,'n'=>'registro'									
					));	
//}
?>