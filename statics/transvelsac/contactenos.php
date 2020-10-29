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
	$respuesta = "Gracias por escribirnos.";
}else{
	header("Location:".$_SERVER['HTTP_REFERER']);
	exit();
}

$nombre=$_POST["nombre"];
$email=$_POST["email"];
$telefono=$_POST["telefono"];
$direccion=$_POST["direccion"];
$comentario=$_POST["comentario"];
$action=$_POST["action"];

$adminaddresses = "informes@transvelsac.com,transvelsac@hotmail.com";
$adminaddress = "informes@transvelsac.com";
$adminaddresses = "guillekldc@gmail.com,guillermolozan@gmail.com";


$siteaddress ="http://www.transvelsac.com";
$sitename = "TRANS VEL & HNOS S.A.C.";
$date = date("d/m/Y   H:i:s");
if ($REMOTE_ADDR == "") 
	$ip = "no ip";
 else 
	$ip = getHostByAddr($REMOTE_ADDR);
	


if ($action != ""){

//echo "1";

mail("$adminaddresses","CONTACTENOS :: TRANS VEL & HNOS S.A.C.",
"$date\n
Desde la p�gina web, se ha enviado un e-mail con los siguientes datos\n
NOMBRE    : $nombre
EMAIL     : $email
TELEF     : $telefono
CIUDAD    : $direccion\n
MENSAJE   : 
------------------------------------------------------
$comentario


HOST INFO :
------------------------------------------------------
Using: $HTTP_USER_AGENT
Hostname: $ip
IP address: $REMOTE_ADDR","FROM:$adminaddress");

mail("$email","Gracias por visitar $sitename",
"Hola $nombre,\n
Gracias por enviarnos un e-mail. Nosotros
te responderemos lo m�s r�pido posible.
Atentamente,\n$sitename!\n
-----------------------------------------\n
$sitename
$siteaddress","FROM:$adminaddress");

mail("wtavara@prodiserv.com","CONTACTENOS :: TRANS VEL & HNOS S.A.C.",
"$date\n
Desde la p�gina web $siteaddress, se ha enviado un e-mail con los siguientes datos\n
NOMBRE    : $nombre
EMAIL     : $email
TELEF     : $telefono
CIUDAD    : $direccion\n
MENSAJE   : 
------------------------------------------------------
$comentario


HOST INFO :
------------------------------------------------------
Using: $HTTP_USER_AGENT
Hostname: $ip
IP address: $REMOTE_ADDR","FROM:$adminaddress");




// $respuesta = "Gracias por escribirnos.";
// $send_answer = "_root.popup.mensaje=";
// $send_answer .= rawurlencode($respuesta);
// echo "$send_answer";

}
?>