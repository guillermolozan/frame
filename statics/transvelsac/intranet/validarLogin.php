<?php
require("db/mysql.inc.php");
$conexion=conectar();
if(isset($_POST['btnEntrar']))
{
	if($_POST && !empty($_POST['txtCodUsuario']) && !empty($_POST['contrasena']) ) {
		$_POST['txtCodUsuario'] = mysql_real_escape_string($_POST['txtCodUsuario']);  
     	//sacamos el hash del password para que se compare ya encriptado
//     	$_POST['contrasena'] = md5(mysql_real_escape_string($_POST['contrasena']));
		$codUsuario = $_POST['txtCodUsuario'];
		$contrasena = $_POST['contrasena'];
		$sql="SELECT usuario.*, sucursal.idempresa FROM usuario LEFT JOIN sucursal ON sucursal.idsucursal=usuario.idsucursal WHERE codUsuario='$codUsuario' AND contrasena='$contrasena'";
		$result=consulta($sql);
		$filasDevueltas = numero_registros($result);
		
		if ($filasDevueltas!=0){
			session_start();
			$reg= leer_registro($result);
			$_SESSION['idUsuario'] = $reg['idusuario'];
			$_SESSION['nomUsuario'] = $reg['nomUsuario'];
			$_SESSION['codUsuario'] = $codUsuario;
			$_SESSION['idRol'] = $reg['idrol'];
			$_SESSION['idSucursal']=$reg['idsucursal'];
			$_SESSION['idEmpresa']=$reg['idempresa'];
			//$_SESSION['token'] = md5(rand().$_SESSION['idUsuario']);
			//$sql="UPDATE usuario SET token = '$_SESSION[token]' WHERE idUsuario = '$_SESSION[idUsuario]'";
			//$result=consulta($sql);
			if($_SESSION['idRol']=='4')
			{
				header('Location: admin/index.php');
			}
			else
			{
				header('Location: main.php');
			}
		} 
		else {
			header('Location: index.php?alter=1');
		}
		mysql_free_result($result);
	}
	else
	{
		header('Location: index.php?alter=1');
	}
}
else
{
	header('Location: index.php?alter=1');
}
?>