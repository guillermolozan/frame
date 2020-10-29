<?php 
session_start();
require("../db/mysql.inc.php");
$conexion=conectar();
require_once("validarSesionAdmin.php");
CheckNivel();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::. - Panel de Administracion DISTRIBUIDORA PEDRO RUIZ GALLO - .::.</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/sddm.css" rel="stylesheet" type="text/css" />
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/frm/cmxforms.js" type="text/javascript"></script>
<script src="../validar.js" type="text/javascript"></script>
<style type="text/css">
	form.cmxform label.error {
	margin-left:5px;
	color:red;
	font-style:italic
	}
</style>
</head>

<body>
    <div id="container">
      <div id="header">
     	<?php
			include("header.php");
		?>
      <!-- end #header --></div>
      <div id="datos">
      	<?php
			include("menuSecund.php");
		?>
      </div>
     
      <div id="mainContent">
      <div style="width:970px; height:auto">
      	<div id="left">
        	<?php include("menu.php") ?>
			<hr style="clear:both; visibility:hidden"       />
        </div>
        <div id="right">
       <!-- aca todo el contenido q kieras poner -->
			<p class="titulo">META DE VENTAS ACTUAL</p>
   				<?php  
					if(isset($_GET['alter'])){
						if($_GET['alter']=='1')
							{$error= "Ingreso registrado satisfactoriamente";}
						elseif($_GET['alter']=='2')
							{$error= "Datos modificados satisfactoriamente"; }
						elseif($_GET['alter']=='3')
							{$error= "Registro eliminado satisfactoriamente"; }
						else
							{header("Location:parametroList.php");}
					}
					else
					{
						$msg=''; $display="style='display:none'";
					}
                	echo   "<div align='right' class='alert' ".$display.">".$msg."</div>";
					$inicioMes='27'; //Un dia antes de q inicie el mes
					$i=$inicioMes+1;
					echo   "<div align='right' class='alert'>Los periodos de venta empiezan el día ".$i." del mes anterior hasta el 27 del mes actual</div>";
					$anio = date("Y"); // Año actual 
 					$mes = date("m"); // Mes actual 
					$dia = date("d"); // Dia actual 
					//Dia de inicio es el 27 del mes anterior
					
					if($dia > $inicioMes and $mes!='12') {$mes=$mes+1;}
					if($dia > $inicioMes and $mes=='12') {$mes=1; $anio=$anio+1;}
   					
					$sql="SELECT * FROM meta_venta WHERE numMes='$mes' AND anio='$anio'";
					$result=consulta($sql);
					$rs=leer_registro($result);
					$actual= numero_registros($result);
					//echo $anio."<br>";
					//echo $mes."<br>";
					//echo $sql;
					if($actual == '1')
					{
				?>
                <FORM ACTION="saveEditMeta.php" class="cmxform" id="frmEditMeta" NAME="frmEditMeta" METHOD="POST" ENCTYPE="multipart/form-data">
                <input type="hidden" name="idMeta" id="idMeta" value="<?php echo $rs['idMeta']; ?>" />
				<table align="center" style="margin:0 10px;" width="75%">
                	<tr>
                    	<td colspan="2" align="right"><?php echo $error;?></td>
                    </tr>
                    <tr>
                    	<td class="title">Monto :</td>
                    	<td class="tdcont"><input type="text" name="montoMeta" id="montoMeta" size="10" value="<?php echo $rs['montoMeta']; ?>"><b class="alert">*</b></td>
                    </tr>
                	<tr>
                    	<td class="title">Periodo :</td>
                    	<td class="tdcont"><input type="text" name="anio" id="anio" size="20" disabled="disabled" value="<?php echo $rs['mes']." - ".$rs['anio']; ?>"></td>
                    </tr>
                    
                    <tr>
                    	<td colspan="2" align="right" class="tdcont"><input type="submit" name="btnGuardar" VALUE="Guardar"></td>
                    </tr>
                    
                </table>
                </FORM>
                <?php
				mysql_free_result($result);
				}
				else
				{
				?>
                <FORM ACTION="saveNewMeta.php" class="cmxform" id="frmNewMeta" NAME="frmNewMeta" METHOD="POST" ENCTYPE="multipart/form-data">
                <?php
				switch($mes){
					case 1:
					$nomMes="Enero";
					break;
					case 2:
					$nomMes="Febrero";
					break;
					case 3:
					$nomMes="Marzo";
					break;
					case 4:
					$nomMes="Abril";
					break;
					case 5:
					$nomMes="Mayo";
					break;
					case 6:
					$nomMes="Junio";
					break;
					case 7:
					$nomMes="Julio";
					break;
					case 8:
					$nomMes="Agosto";
					break;
					case 9:
					$nomMes="Setiembre";
					break;
					case 10:
					$nomMes="Octubre";
					break;
					case 11:
					$nomMes="Noviembre";
					break;
					case 12:
					$nomMes="Diciembre";
					break;

				}
				?>
                <input type="hidden" name="mes" id="mes" value="<?php echo $mes; ?>" />
                <input type="hidden" name="anio" id="anio" value="<?php echo $anio; ?>" />
                <input type="hidden" name="nomMes" id="nomMes" value="<?php echo $nomMes; ?>" />
                <input type="hidden" name="dia" id="dia" value="<?php echo $inicioMes; ?>" />
				<table align="center" style="margin:0 10px;" width="75%">
					<th class="title" colspan="2" align="left"><strong>NUEVA META</strong></th>
                    <tr>
                    	<td colspan="2" align="right">Para el periodo (<?php echo $nomMes."- ".$anio?>) no hay una meta definida</td>
                    </tr>
                    <tr>
                    	<td class="title">Monto :</td>
                    	<td class="tdcont"><input type="text" name="montoMeta" id="montoMeta" size="10"><b class="alert">*</b></td>
                    </tr>
                    <tr>
                    	<td class="title">Periodo :</td>
                    	<td class="tdcont"><input type="text" name="dato" id="dato" size="20" disabled="disabled" value="<?php echo $nomMes." - ".$anio; ?>"></td>
                    </tr>
                    <tr>
                    	<td colspan="2" align="right" class="tdcont"><input type="submit" name="btnGuardar" VALUE="Guardar"></td>
                    </tr>
                    
                </table>
                </FORM>
                <?php
				}
				?>
                
                <?php 
			$consultaBase = "SELECT * FROM meta_venta WHERE numMes!='$mes' OR anio!='$anio'";
			$up="DESC";
			$orden="fechaModif";//ordena por id
   			// Enviar consulta de listar
			$instruccion = $consultaBase ." ORDER BY $orden $up"; 
			$consulta = consulta($instruccion);
			$con=0;
			?>
      		<br />
            <br />
            <p class="titulo">METAS ANTERIORES</p>
			<table width="75%" align="center" style="margin:0 10px;">
  		 	<tr>
            	<td width="10%" align="center" class="title"><div align="center" >Nº</div></td>
            	<td width="60%" align="center" class="title"><div align="center">Periodo</div></td>
            	<td width="30%" align="center" class="title"><div align="center">Monto Meta (S/.)</div></td>
          	</tr>
    	<?php
		while($rs = leer_registro($consulta))
		{
			$con=$con+1;
			?>
     		<tr>
            	<td class="tdcont" align="center"><?php echo $con; ?></td>
            	<td class="tdcont" align="center"><?php echo $rs['mes']." - ".$rs['anio']; ?></td>
            	<td class="tdcont" align="center"><?php echo $rs['montoMeta']; ?></td>
      		</tr>
		<?php		
		}
		mysql_free_result($consulta);
		?>
      </table>

</div>
<hr style="clear:both; visibility:hidden"       />      
      </div>
      <hr style="clear:both; visibility:hidden"       />
      <!-- end #mainContent --></div>
      <div id="footer" align="center">
      <?php include('../footer.php');?>
      <!-- end #footer --></div>
    <!-- end #container --></div>
    </body>
</html>