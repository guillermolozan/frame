<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
$idUsuario=$_GET['idUsuario'];
$instruccion = "SELECT u.estadoUsuario, e.idEmpresa FROM usuario as u INNER JOIN sucursal as s ON u.SUCURSAL_idSucursal=s.idSucursal INNER JOIN empresa as e ON s.EMPRESA_idEmpresa=e.idEmpresa WHERE idUsuario='$idUsuario'"; 
$consulta = consulta($instruccion);
$resultado = leer_registro($consulta);
$estado=$resultado['estadoUsuario'];
$idEmpresa=$resultado['idEmpresa'];

if ( $estado==0 ){		
	$sql="UPDATE usuario SET estadoUsuario=1 WHERE idUsuario='$idUsuario'";
	$rsql=consulta($sql);
	header("Location:usuarios.php?idEmpresa=".$idEmpresa."&&msg=2");
}else{
	$sql="UPDATE usuario SET estadoUsuario=0 WHERE idUsuario='$idUsuario'";
	$rsql=consulta($sql);
	header("Location:usuarios.php?idEmpresa=".$idEmpresa."&&msg=2");
}
?>