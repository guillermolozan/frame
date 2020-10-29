<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesion.php");
CheckNivel();

$idProd=$_GET['idProd'];

$instruccion = "SELECT * from producto where idProducto='$idProd'"; 
$consulta = consulta($instruccion);
$resultado = leer_registro($consulta);
$estado=$resultado['estadoProd'];

if ( $estado==0 ){		
	$sql="UPDATE producto SET estadoProd=1 WHERE idProducto='$idProd'";
	$rsql=consulta($sql);
	header("Location:index.php?msg=2");

}else{
	$sql="UPDATE producto SET estadoProd=0 WHERE idProducto='$idProd'";

	$rsql=consulta($sql);
	header("Location:index.php?msg=2");
}
?>