<?php
	$sql="SELECT s.*, e.* FROM sucursal s INNER JOIN empresa e ON s.idempresa=e.idempresa WHERE s.idsucursal='$_SESSION[idSucursal]'";
	$result=consulta($sql);
	$rs=leer_registro($result);
?>
<div class="fecha"><?php echo fechaAlta("DH")?></div> 
      		<div class="usuario" align="right">
      			<b style="color:#003399">Empresa</b> 
      			<b style="color:#f9a115"><?PHP echo $rs['razonsocial']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
    <strong>SUCURSAL :&nbsp;&nbsp;<?php echo $rs['nombre']?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      			<b style="color:#003399">Bienvenido!</b> 
      			<b style="color:#f9a115"><?PHP echo $_SESSION['codUsuario']?></b>
      			<a href="/intranet/logout.php">Cerrar Sesion</a>
</div>