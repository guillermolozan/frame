<?php
//aqui se debe de conectar a la base de datos y todo
//la función para validar la sesion sería algo asi:
function CheckNivel() {
$valor=0;
   if(!empty($_SESSION['idUsuario']) && !empty($_SESSION['nomUsuario']) && !empty($_SESSION['idRol']) && !empty($_SESSION['idSucursal'])) 
   {
      //quitamos el posible SQLInjection del user y password
		$_SESSION['idUsuario'] = mysql_real_escape_string($_SESSION['idUsuario']);
      	//$_SESSION['token'] = mysql_real_escape_string($_SESSION['token']);
      	$_SESSION['nomUsuario'] = mysql_real_escape_string($_SESSION['nomUsuario']);
	   	$_SESSION['idRol'] = mysql_real_escape_string($_SESSION['idRol']);
      	$_SESSION['idSucursal'] = mysql_real_escape_string($_SESSION['idSucursal']);
      //checamos que exista
      	//$sql="SELECT * FROM usuario WHERE idUsuario = '$_SESSION[idUsuario]' AND token = '$_SESSION[token]'";
		$sql="SELECT * FROM usuario WHERE idusuario = '$_SESSION[idUsuario]'";
		$result=consulta($sql);
		$total_registros = numero_registros($result);
      	if($total_registros == 1) 
		{
        	//volvemos a calcular un token
           	//$_SESSION['token'] = md5(rand().$_SESSION['idUsuario']);
		   	//$sql="UPDATE usuario SET token = '$_SESSION[token]' WHERE idUsuario = '$_SESSION[idUsuario]'";
			//$result=consulta($sql);
        }
		else
		{
			session_destroy();
			header("Location:index.php?alter=3");
		}
		
	} 
	else
	{
		session_destroy();
		header("Location:index.php?alter=3");
	}
}
?>