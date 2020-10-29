<?php session_start();
include("../db/mysql.inc.php");
$conexion=conectar();

if($_POST['idProducto']=="" or $_POST['t']=="" or $_POST['t']==0){ header("Location:index.php?".SID);};
extract($_REQUEST);
if(isset($_SESSION['carro'])){$_SESSION['carro']="";}
$i=$_POST['t'];

for ( $i = 1 ; $i <= $t ; $i ++) {
$a="idProducto".$i;
$b="canProd".$i;
$c="precio".$i;
$qry=mysql_query("select * from producto where idProducto='".$$a."'");
$row=mysql_fetch_array($qry);
$carro=$_SESSION['carro'];
//$can=$canProducto;
$carro[md5($$a)]=array('identificador'=>md5($$a),'idProducto'=>$$a,'cantidad'=>$$b, 'precio'=>$$c,'importe'=>$$b*$$c, 'producto'=>$row['nomProd'],'codigo'=>$row['codProd'],'idProducto'=>$row['idProducto']);
$_SESSION['carro']=$carro;
}
header("Location: ../ordenes_comp/newOrdenC.php?idProv=".$idProv."&nomProv=".$nomProv."&".SID);
?>