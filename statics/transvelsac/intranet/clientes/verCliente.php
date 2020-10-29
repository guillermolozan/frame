<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - EMPRESA DE TRANSPORTE LUCERITO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="../css/estilo_imp.css" rel="stylesheet" type="text/css" media="print"> 
<link rel="stylesheet" type="text/css" href="../css/pro_drop_1.css" />
<script src="../css/stuHover.js" type="text/javascript"></script>
</head>

<body>


    <div id="container">
		<div id="datos">
      		<?php
			include("../menuSecund.php");
			?>
      	</div>
      	
		<div id="menu"><?php include("../menu.php") ?></div>
		
      <div id="mainContent">
      
   <br /><br />
  <p class="titulo">Visualizar Cliente</p>
<table width="98%" align="center" style="margin:0 10px;">
  	<?php
		
	$idCliente=$_GET['idCliente'];
	$sql="SELECT * FROM cliente WHERE idcliente='$idCliente'";
	$result=consulta($sql);
	$rs=leer_registro($result);
	
	?>
  
  <tr>
    <td class="title" width="20%"><strong >Razon Social:</strong></td>
    <td width="30%" class="tdcont"><?php echo $rs['razonsocial']; ?></td>
    <td class="title" width="17%"><strong >Contacto :</strong></td>
    <td class="tdcont" width="33%"><?php echo $rs['contacto']; ?></td>
  </tr>
  <tr>
    <td class="title" ><strong >RUC  :</strong></td>
    <td class="tdcont"><?php echo $rs['ruc']; ?></td>
    <td class="title" width="17%"><strong >Cargo :</strong></td>
    <td class="tdcont" width="33%"><?php echo $rs['cargo']; ?></td>
  </tr>
  <tr>
    <td class="title" ><strong >Dirección&nbsp; :</strong></td>
    <td class="tdcont"><?php echo $rs['direccion']; ?></td>
   <td class="title" width="17%"><strong >Celular :</strong></td>
    <td class="tdcont" width="33%"><?php echo $rs['celular']; ?></td>
  </tr>
  <tr>
    <td class="title" ><strong >Teléfono :</strong><br /></td>
    <td class="tdcont"><br />
      <?php echo $rs['telefono1']." - ".$rs['telefono2']; ?></td>
    <td class="title" width="17%"><strong >Email :</strong></td>
    <td class="tdcont" width="33%"><?php echo $rs['email']; ?></td>
  </tr>
    <tr>
    <td class="title" ><strong >Disponible :</strong><br /></td>
    <td class="tdcont"><br />
     <?php if($rs['bloqueado']=='1') echo "Activado"; else echo "Desactivado";  ?></td>
    </tr>
</table>
<br />
 <div align="right">&nbsp;&nbsp;&nbsp;&nbsp;
<input name="sbmReturn" type="button" id="sbmReturn" value="Retornar" onClick="window.open('index.php', '_self');" class="boton" />
 <!--<input type="button" name="imprimir" value="Imprimir" onclick="window.print();" class="boton"> -->

<!--<a href="reporte.php?idProv=<?php //echo $rs['idProveedor'];?>" target="_blank"> Ver reporte &nbsp;<img src="../images/pdf.png" style="border:0" /></a>
 
 <a href="reporteHTML.php?idProv=<?php //echo $rs['idProveedor'];?>" target="_blank"> Ver reporte CON HTML&nbsp;<img src="../images/pdf.png" style="border:0" /></a>  -->

<?php		
	
		mysql_free_result($result);
	?>
    
</div>

      
          <!-- end #mainContent --></div>
      <div id="footer">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --> 
    </div>
    </body>
</html>