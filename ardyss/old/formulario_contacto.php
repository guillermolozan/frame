<?php

error_reporting(0);

extract($_POST);


$adminaddress = "contacto@ardyss.com.pe";

$siteaddress ="http://www.ardyss.com.pe";
$sitename = "Ardyss Perú";
$date = date("d/m/Y   H:i:s");


//echo "1";

//if ($action != ""){


mail("$adminaddress","CONTACTENOS | Ardyss Perú",
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
Atentamente,\nCladis Román\nAsesora Comercial de Productos Ardyss\n
E-MAIL: contacto@ardyss.com.pe\n
-----------------------------------------\n
$sitename
$siteaddress","FROM:$adminaddress");



echo json_encode(array(
					't'=>'exito'
					,'u'=>''									
					,'m'=>"Gracias por escribirnos"
					,'n'=>'registro'									
					));	
//}
?>