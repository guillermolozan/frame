<?php
  require("../db/mysql.inc.php");
  $conexion=conectar();
  $nuevaFecha=$_GET['fecha']; 
  $sql="SELECT valor FROM tipo_cambio WHERE SUBSTR(fechaAlta,1,10)=SUBSTR('$nuevaFecha',1,10)";
  $result=consulta($sql);
  if (numero_registros($result) > 0) {
    $rs=leer_registro($result);
    $valor=$rs['valor'];
  } else {
    $valor=0;
  }
  mysql_free_result($result);
  echo ($valor);
?>