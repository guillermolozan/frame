<div class="navbar">
<!-- *********************************Start Menu****************************** -->
<div class="mainDiv" >
<div class="topItem" >EMPRESA DE TRANSPORTE LUCERITO</div>        
<div class="dropMenu" ><!-- -->
	<div class="subMenu" style="display:inline;">
		<div class="subItem"><a href="../admin/empresa.php?idEmpresa=<?php echo $_SESSION['idEmpresa'];?>">&raquo; Datos Empresa</a></div>
        <?php
		$sql2="SELECT idsucursal, nombre FROM sucursal WHERE idempresa='$_SESSION[idEmpresa]' ORDER BY nombre";
		$consulta2=consulta($sql2);
		while($rs2=leer_registro($consulta2))
		{
		?>
	    <div class="subItem"><a href="../admin/sucursal.php?idSucursal=<?php echo $rs2['idsucursal']; ?>">&raquo; <?php echo $rs2['nombre']; ?></a></div>
        <?php
		}
		mysql_free_result($consulta2);
		?>
		<div class="subItem"><a href="../admin/sedes.php?idEmpresa=<?php echo $_SESSION['idEmpresa'];?>">&raquo; Sucursales</a></div>
		<div class="subItem"><a href="../admin/usuarios.php?idEmpresa=<?php echo $_SESSION['idEmpresa'];?>">&raquo; Cuentas Usuario</a></div>
		
	</div>
</div>
</div>

<div class="mainDiv" >
<div class="topItem" >PREFERENCIAS</div>        
<div class="dropMenu" ><!-- -->
	<div class="subMenu" style="display:inline;">
	    <div class="subItem"><a href="../admin/configuracion.php">&raquo; Configuracion de Variables</a></div>
        <div class="subItem"><a href="../admin/backup.php">&raquo; Backup</a></div>
	</div>
</div>
</div>

<script type="text/javascript" src="xpmenuv21.js"></script>
</div>