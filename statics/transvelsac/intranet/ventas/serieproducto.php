<?php
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("../validarSesionVendedor.php");
CheckNivel();

extract($_REQUEST);

$qry=mysql_query("select serie_producto.IdUbicacion,producto.* from serie_producto left join producto on serie_producto.MOVIMIENTO_PRODUCTO_PRODUCTO_IdProducto=producto.IdProducto where serie_producto.serie='".$IdSerie."' and serie_producto.estadoSerie='inventario'");

$row=mysql_fetch_array($qry);


if(isset($_SESSION['serie']))
	$serie=$_SESSION['serie'];

$serie[md5($row['idSerie'])]=array('identificador'=>md5($row['idSerie']),'IdSerie'=>$NroSerie, 'idProducto'=>$row['idProducto'],'serie'=>$IdSerie, 'idModelo'=>$row['MODELO_idModelo'], 'idMarca'=>$row['MARCA_idMarca'], 'codProd'=>$row['codProd'],'nomProd'=>$row['nomProd'], 'descProd'=>$row['descProd'], 'descripcion'=>$row['descCorta'], 'IdUbicacion'=>$row['IdUbicacion']);
$_SESSION['serie']=$serie;

echo ($row['codProd']);
echo '|';
echo ($row['nomProd']);
echo '|';
echo ($row['costoPromedio']);
echo '|';
echo ($row['idProducto']);
echo '|';
echo ($row['idSerie']);

?>