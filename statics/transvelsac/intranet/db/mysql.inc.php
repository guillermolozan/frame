<?php
function conectar()
{
	require_once("conectar.inc.php");
	$cnx=mysql_connect("$host","$usuario","$pass") or die("error en la conexion:".mysql_error($cnx));
	mysql_select_db("$bd",$cnx) or die("error en BD:".mysql_error($cnx));
	return $cnx;
}

function consulta($sql)
{
	$rs=mysql_query($sql) or die("Error sql: $sql ".mysql_error());
	return $rs;
}

function calPorcentajeProducto($idProducto,$nValor)
{
  $valor = $nValor;
  $sqlModelo = "SELECT MODELO_idModelo FROM producto WHERE idProducto='$idProducto'";
  $result1 = consulta($sqlModelo);
  $idModelo = 0;
  while($rs1 = leer_registro($result1))
  {
     $idModelo = $rs1['MODELO_idModelo'];
  }
  $sqlidRango = "SELECT RANGO_GRUPO_idRangoGrupo FROM modelo WHERE idModelo='$idModelo'";
  $result2 = consulta($sqlidRango);
  $idRangoGrupo = 0;
  while($rs2 = leer_registro($result2))
  {
     $idRangoGrupo = $rs2['RANGO_GRUPO_idRangoGrupo'];
  }
  $porcentaje = 0;
  $sqlRangos = "SELECT * FROM rangos_utilidad WHERE idRangoGrupo='$idRangoGrupo' ORDER BY idRango";
  $consulta1 = mysql_query($sqlRangos);
  while($regRangos = mysql_fetch_array($consulta1))
  {
     $minimo = $regRangos['minimo'];
     $maximo = $regRangos['maximo'];
     if (($valor >= $minimo) && ($valor <= $maximo)) {
        $porcentaje = $regRangos['porcentaje'];
     }
  }
  return $porcentaje;
}
function calPorcentajeTotal($valor)
{
  $fechaActual = getdate();
  $anio = $fechaActual['year'];
  $sqlidRango = "SELECT rangoUtilidad1 FROM config WHERE anio='$anio'";
  $result2 = consulta($sqlidRango);
  $idRangoGrupo = 0;
  while($rs2 = leer_registro($result2))
  {
     $idRangoGrupo = $rs2['rangoUtilidad1'];
  }
  $sqlRangos = "SELECT * FROM rangos_utilidad WHERE idRangoGrupo='$idRangoGrupo' ORDER BY idRango";
  $consulta1 = mysql_query($sqlRangos);
  while($regRangos = mysql_fetch_array($consulta1))
  {
      $minimo = $regRangos['minimo'];
      $maximo = $regRangos['maximo'];
      if (($valor >= $minimo) && ($valor <= $maximo)) {
         $porcentaje = $regRangos['porcentaje'];
      }
  }
  return $porcentaje;
}
function llenarcombo($nombre,$tabla,$etiqueta,$valor)
{  
	$rs=consulta("select $etiqueta, $valor from $tabla where EMPRESA_idEmpresa = '$_SESSION[idEmpresa]'");

	?>
	<select id="<?php echo $nombre ?>" name="<?php echo $nombre?>">
    <option value="99">--Seleccione--</option>
		<?php while($reg=leer_registro($rs)){ ?>
			<option value="<?php echo $reg["$valor"]?>"><?php echo $reg["$etiqueta"]?></option>
		<?php } ?>
	</select>
<?php }

function leer_registro($rs)
{
	return mysql_fetch_array($rs);
}

function numero_registros($rs)
{
	return mysql_num_rows($rs);
}

function longitud_campo($rs,$n)
{
	return mysql_field_len($rs,$n);
}

function flag_campo($tabla,$n)
{
	$rsf=consulta("SHOW COLUMNS FROM $tabla");
	mysql_data_seek($rsf,$n);
	return leer_registro($rsf);
}

function clave_primaria($tabla)
{
	$rsf=consulta("SHOW COLUMNS FROM $tabla");
	while($regf=mysql_fetch_array($rsf))
		if($regf[Key]=="PRI") return $regf[Field];
	return "";
}

/******************************************************/
/* Funcion paginar
 * actual:          Pagina actual
 * total:           Total de registros
 * por_pagina:      Registros por pagina
 * enlace:          Texto del enlace
 * Devuelve un texto que representa la paginacion
 */
function paginar($actual, $total, $por_pagina, $enlace) {
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  if ($actual>1)
    $texto = "<a href=\"$enlace$anterior\">&laquo;</a> ";
  else
    $texto = "<b>&laquo;</b> ";
  for ($i=1; $i<$actual; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  $texto .= "<b>$actual</b> ";
  for ($i=$actual+1; $i<=$total_paginas; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  if ($actual<$total_paginas)
    $texto .= "<a href=\"$enlace$posterior\">&raquo;</a>";
  else
    $texto .= "<b>&raquo;</b>";
  return $texto;
}


function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad) {
							$img = ImageCreateFromJPEG($img_original);
							$thumb = @imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
							ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura, $img_nueva_altura,ImageSX($img),ImageSY($img));
							ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);
							}

function redimensionar_gif($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad) {
							$img = ImageCreateFromGIF($img_original);
							$thumb = @imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
							ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura, $img_nueva_altura,ImageSX($img),ImageSY($img));
							ImageGIF($thumb,$img_nueva,$img_nueva_calidad);
							}
							
function redimensionar_png($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad) {
							$img = ImageCreateFromPNG($img_original);
							$thumb = @imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
							ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura, $img_nueva_altura,ImageSX($img),ImageSY($img));
							ImagePNG($thumb,$img_nueva,$img_nueva_calidad);
							}

function extractValues ($table, $column){
      						$sql = "SHOW COLUMNS FROM $table LIKE '$column'";
      						$result = mysql_query($sql);
      						$row = mysql_fetch_array($result);
      						preg_match_all("/(?:(?!:[\(\,])')(.+?)(?:'(?:[\)\,]))/",$row[1],$enums);
      						return ($enums[1]);
    						}

function GetRecortar ($vTxt, $Car) {
	if (strlen($vTxt) > $Car) {
		return substr($vTxt, 0, $Car) . "";
	} else return $vTxt;
}

function cortar($nom) {
	$cadena = explode(" ", $nom);
	$cadena1=GetRecortar($cadena[0],2);
	if(strlen($cadena1)==1) $cadena1=$cadena1."0"; 
	$cadena2=GetRecortar($cadena[1],2);
	if(strlen($cadena2)==1) $cadena2=$cadena2."0";
	$cadena3=GetRecortar($cadena[2],2);
	if(strlen($cadena3)==1) $cadena3=$cadena3."0";
	$cadenaFinal=$cadena1.$cadena2.$cadena3;
	return $cadenaFinal;
}

function fechaAlta($valor){
	
    $clientGMT=intval( -18000 );
	$serverGMT=intval( date('Z') );
		
	if ($valor=="DH"){
	  $fechaAlta=date('Y-m-d H:i:s',time()+$clientGMT-$serverGMT);
	  return $fechaAlta;
	};
	
	if($valor=="D"){
	  $fechaAlta=date('Y-m-d',time()+$clientGMT-$serverGMT);
	  return $fechaAlta;
    };
}

function verificarCod($codProd,$nomCorto) {
$sql = "SELECT idProducto FROM producto WHERE codProd='$codProd'";
  	$rsl = consulta($sql);
	if(numero_registros($rsl)>0)
	{
		$cod = "0".rand(100,999);
		$codProd=$nomCorto.$cod;
		verificarCod($codProd);	
	}
	else
	{
		return $codProd;
	}
}

function redondeado ($numero) { 
	return number_format($numero, 2, '.', ' ');
  } 

function ceros($num,$len) {
	if (strlen($num) < $len) { return ceros("0".$num,$len); }
	return $num;
}

function fechaAMostrar($valor){
	if (is_null($valor)) {
		return '';
	}
	if ($valor=='') {
		return '';
	}
	//yyyy-mm-dd
	$dia = substr($valor, 8, 2);
	$mes = substr($valor, 5, 2);
	$anyo = substr($valor, 0, 4);		
    $dfecha = "$dia-$mes-$anyo";
    return $dfecha;
}
function fechaAGrabar($valor){
    if(empty($valor)) {
    	return 'NULL';
    }
	if (is_null($valor)) {
		return 'NULL';
	}
	if ($valor=='') {
		return 'NULL';
	}
	//dd-mm-yyyy
	$dia = substr($valor, 0, 2);
	$mes = substr($valor, 3, 2);
	$anyo = substr($valor, 6, 4);		
    $dfecha = "$anyo-$mes-$dia";
    return $dfecha;
}
 
?>