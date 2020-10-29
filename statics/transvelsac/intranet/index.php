<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EMPRESA DE TRANSPORTE LUCERITO</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script src="js/lib/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/frm/cmxforms.js" type="text/javascript"></script>
<script src="validar.js" type="text/javascript"></script>
<script src="miVal.js" type="text/javascript"></script>
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
<form method="post" action="validarLogin.php" name="frmLogeo" id="frmLogeo" class="cmxform" enctype="multipart/form-data">
<div id="login">
<label>Usuario:</label>
<input type="text" title="Ingrese Usuario" id="txtCodUsuario" name="txtCodUsuario" size="20"/><br />
<label>Contraseña:</label>
<input type="password" id="contrasena" name="contrasena" size="20" title="Ingrese Contraseña" /><p>
<input class="submit" type="button" name="enviar" id="ingresar" value=" WEB  " />&nbsp;&nbsp; <input type="submit" value="ENTRAR" name="btnEntrar" id="btnEntrar" class="submit" /><br /><br />
<?php 
					if(isset($_GET['alter'])){
						if($_GET['alter']=='1')
							{$error= "Su codigo o contraseña son incorrectos";}
						elseif($_GET['alter']=='2')
							{$error= "Ha salido correctamente del sistema"; }
						elseif($_GET['alter']=='3')
							{$error= "Se ha producido un problema en el sistema"; }
						else
							{header("Location:index.php");}
					}
					else
					{$error="";}
				?>
<center class="error"><?php echo $error; ?> </center>
</div>
</form>
</div>
</body>
</html>

