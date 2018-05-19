<?php

$nombre=$_POST["nombre"];
$email=$_POST["email"];
$direccion=$_POST["direccion"];
$comentario=$_POST["comentario"];
$action=$_POST["action"];

$adminaddress = "info@terranovaspalessons.com";


$siteaddress ="http://www.terranovaspalessons.com";
$sitename = "TerraNOva :: Spanish Lessons";
$date = date("d/m/Y   H:i:s");
if ($REMOTE_ADDR == "") 
	$ip = "no ip";
 else 
	$ip = getHostByAddr($REMOTE_ADDR);
	


if ($action != ""){

//echo "1";

mail("$adminaddress","CONTACTENOS :: TerraNOva - Spanish Lessons",
"$date\n
Desde la página web, se ha enviado un e-mail con los siguientes datos\n
NOMBRE    : $nombre
EMAIL     : $email
PAIS      : $direccion\n
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
te responderemos lo más rápido posible.
Atentamente,\n$sitename!\n
-----------------------------------------\n
$sitename
$siteaddress","FROM:$adminaddress");

mail("wtavara@prodiserv.com","CONTACTENOS :: TerraNOva - Spanish Lessons",
"$date\n
Desde la página web $siteaddress, se ha enviado un e-mail con los siguientes datos\n
NOMBRE    : $nombre
EMAIL     : $email
PAIS      : $direccion\n
MENSAJE   : 
------------------------------------------------------
$comentario


HOST INFO :
------------------------------------------------------
Using: $HTTP_USER_AGENT
Hostname: $ip
IP address: $REMOTE_ADDR","FROM:$adminaddress");


mail("richfel@yahoo.com","CONTACTENOS :: TerraNOva - Spanish Lessons",
"$date\n
Desde la página web $siteaddress, se ha enviado un e-mail con los siguientes datos\n
NOMBRE    : $nombre
EMAIL     : $email
PAIS      : $direccion\n
MENSAJE   : 
------------------------------------------------------
$comentario


HOST INFO :
------------------------------------------------------
Using: $HTTP_USER_AGENT
Hostname: $ip
IP address: $REMOTE_ADDR","FROM:$adminaddress");



$respuesta = "Gracias por escribirnos.";
$send_answer = "_root.popup.mensaje=";
$send_answer .= rawurlencode($respuesta);
echo "$send_answer";

}
?>