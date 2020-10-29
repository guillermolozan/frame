<?php //á

require_once 'lib/PHPExcel.php';
require_once 'lib/PHPExcel/IOFactory.php';


$foreig=array();
$obj=$objeto_tabla[$_GET['me']];
foreach($obj['campos'] as $campo){
	if(in_array($campo['tipo'],array('inp','txt'))){
		$autorizados[$campo['label']]=$campo['campo'];
	}
	if($campo['tipo']=='hid'){
		$foreig[$campo['campo']]=$_GET[$campo['campo']];
	}	
}


$_GET['paso']=($_GET['paso'])?$_GET['paso']:'first';
//$_GET['paso']=($_GET['paso'])?$_GET['paso']:'upload';

switch($_GET['paso']){

////////////////////////////////////////////////////////
///////////////////    FIRST    ////////////////////////
////////////////////////////////////////////////////////
case "first":
?>
    <div class="importar_csv">
    <h2>PASO 1 : Subir archivo Excel</h2>
    
		<?php if($_GET['error']!=''){ ?>
        <div class="incompatible">
        <b>ERROR</b>
        <br />
        <?php switch($_GET['error']){
		case "upload_size": echo "ERROR : máximo tamaño de archivo permitido 8M<br>"; break;
		case "upload_error": echo "ERROR : el archivo no pudo subir correctamente<br>"; break;
		case "upload_formato": echo "ERROR : el formato del archivo debe ser xls ( Excel 2003 )"; break;
		} ?>
        <br />Por favor revisar
        </div>
        <?php } ?>
    
    <form enctype="multipart/form-data" method="post" action="app.php?paso=upload<?php echo $params;?>">
    <legend>Archivo Excel : (extensión .xls, Excel 97-2003, hasta 8 Mb)</legend>
    <input type='file' name="excel" />
    <input type="submit" value="Subir Archivo" />
    </form>
    </div>    
<?
break;

////////////////////////////////////////////////////////
//////////////////    UPLOAD    ////////////////////////
////////////////////////////////////////////////////////

case "upload":
	
	$file_size = $_FILES['excel']['size'];
	$file_type = $_FILES['excel']['type'];
	$file_temp = $_FILES['excel']['tmp_name'];
	$file_name = $_FILES['excel']['name'];	
	
	$Marcas=array('F'=>'Forland','B'=>'Baw','G'=>'Gonow','T'=>'Daihatsu','C'=>'Changhe');
				
	$Atransmision=array(
						'0'			=> 'MT',
						'1'			=> 'AT'
				);	

	//$file_temp = "base2/documentos/STOCK 04 DE JULIO DEL 2011.xls";
	//$file_temp = "base2/documentos/STOCK_OCTUBRE_10.xls";
	
	//prin($_FILES);
	//echo "$file_temp<br>";
	 
	
	if($file_type>8*1024*1024){ redir('app.php?error=upload_size'.$params); }
	
	$archivo_subio=is_uploaded_file($file_temp);
				
	if(!$archivo_subio){ redir('app.php?error=upload_error'.$params); }
	else { 	

		//echo "$file_name<br>";
		list($Fname,$Fex)=explode(".",$file_name);

		if($Fex!='xls'){ redir('app.php?error=upload_formato'.$params); }

		//exit();
		if($Fex=='xlsx'){
			$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			//echo "Excel2007<br>";
		} elseif($Fex=='xls'){
			$objReader = PHPExcel_IOFactory::createReader('Excel5');
			//echo "Excel5<br>";			
			//prin($objReader);
		}

		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($file_temp);	

		$sheets=$objPHPExcel->getSheetNames();
		
		//prin($sheets);
				
		foreach($sheets as $sheet){
			
			if($sheet){
			
				$objWorksheet = $objPHPExcel->getSheetByName($sheet);
				$highestRow = $objWorksheet->getHighestRow();
				$highestColumn = $objWorksheet->getHighestColumn();
				$state = $objWorksheet->getSheetState();
				if($state=='visible' and $highestRow>1){
					$Sheets[]=array(
						 'name'=>$Marcas[trim($sheet)]
						,'rows'=>$highestRow
						,'colums'=>$highestColumn
						,'sheet'=>$objWorksheet
					);
				}
			}
			
		} 
			
		//$Sheets=array($Sheets[3]);
				
		/*
		delete("productos_colores","where 1");				
		delete("productos_status","where 1");										
		delete("productos_carrocerias","where 1");								
		delete("productos_items","where 1");
		*/
		
		//delete("productos_stock","where 1");
		mysql_query("TRUNCATE TABLE `productos_stock`",$link);
		
		//exit();
		
		foreach($Sheets as $Sheet){
			$ini=0;
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($Sheet['colums']);
			for ($row = 1; $row <= $Sheet['rows']; ++$row) {
			  for ($col = 0; $col <= $highestColumnIndex; ++$col) {
				$datos[]=str_replace(
									array("Nº","PTO. VENTA"),
									array("N","PTO VENTA"),
									trim($Sheet['sheet']->getCellByColumnAndRow($col, $row)->getValue())
									);
			  }
			  if(in_array("MARCA",$datos)){ $campos=$datos; }
			  if($ini==1){ foreach($datos as $dd=>$dato){ $datos2[$campos[$dd]]=$dato; } if($datos2['MODELO']!=''){ $datos2['MARCA']=$Sheet['name'];$filas[]=$datos2; } } 
			  if(in_array("MARCA",$datos)){ $ini=1; }
			  unset($datos); unset($datos2);
			}

			if(1){
				$CamposB=array(
					"N"=>'codigo',
					'MARCA'=>'id_grupo',
					'MODELO'=>'id_item',
					'COLOR'=>'id_color',
					'TIPO DE CARROCERIA'=>'id_carroceria',
					'STATUS'=>'id_status',	
					'TRANSMISION'=>'transmision',
					'UBICACION'=>'ubicacion',
					'CHASIS'=>'chasis',
					'MOTOR'=>'motor',
					'PTO VENTA'=>'id_ptoventa',
				);
				$CamposA=array_keys($CamposB);			
				//$CamposA=array('MODELO');							
				foreach($campos as $Camp){ if(in_array($Camp,$CamposA)){ $campos2[]=$Camp; } }
				$campos=$campos2; unset($campos2);
				//prin($campos);
			}
				
			foreach($filas as $Fila){
				foreach($campos as $campo){ 
				switch($CamposB[$campo]){
				case 'id_grupo': $INSER[$CamposB[$campo]]=select_dato('id','productos_grupos','where nombre like "%'.$Fila[$campo].'%"'); break;
				case 'id_item':
					$ID=select_dato('id','productos_items','where nombre like "%'.$Fila[$campo].'%"');	
					if($ID==false){ 
					$NEW_PRODS[]=$Fila[$campo];
					$IID=insert(array(
							'nombre'=>$Fila[$campo],
							'id_grupo'=>select_dato('id','productos_grupos','where nombre like "%'.$Fila['MARCA'].'%"',0)
							),'productos_items',0);							
					$ID=$IID['id'];
					}
					$INSER[$CamposB[$campo]]=$ID; 
				break;
				case 'id_color':
					$ID=select_dato('id','productos_colores','where nombre = "'.$Fila[$campo].'"');	
					if($ID==false){ if($Fila[$campo]!=''){ $IID=insert(array('nombre'=>$Fila[$campo]),'productos_colores',0); $ID=$IID['id']; } else { $ID==''; } }
					$INSER[$CamposB[$campo]]=$ID; 
				break;	
				case 'id_status':
					$ID=select_dato('id','productos_status','where nombre = "'.$Fila[$campo].'"');	
					if($ID==false){ if($Fila[$campo]!=''){ $IID=insert(array('nombre'=>$Fila[$campo]),'productos_status',0); $ID=$IID['id']; } else { $ID==''; } }
					$INSER[$CamposB[$campo]]=$ID; 
				break;
				case 'id_carroceria':
					$ID=select_dato('id','productos_carrocerias','where nombre = "'.$Fila[$campo].'"');	
					if($ID==false){ if($Fila[$campo]!=''){ $IID=insert(array('nombre'=>$Fila[$campo]),'productos_carrocerias',0); $ID=$IID['id']; } else { $ID==''; } }
					$INSER[$CamposB[$campo]]=$ID;
				break;	
				case 'id_ptoventa':
					$ID=select_dato('id','productos_ptoventa','where nombre = "'.$Fila[$campo].'"');	
					if($ID==false){ if($Fila[$campo]!=''){ $IID=insert(array('nombre'=>$Fila[$campo]),'productos_ptoventa',0); $ID=$IID['id']; } else { $ID==''; } }
					$INSER[$CamposB[$campo]]=$ID;
				break;																			
				case 'transmision':
					$aa="A".$CamposB[$campo]; foreach($$aa as $ae=>$ai){ if(strtolower($Fila[$campo])==strtolower($ai)){ $INSER[$CamposB[$campo]]=$ae;} } break;
					default: $INSER[$CamposB[$campo]]=$Fila[$campo]; break;
					}
				}
				$INSERTS[]=$INSER; unset($INSER);
			}			
		}		

		
		foreach($INSERTS as $ii=>$INSERT){
				//if($ii==0)
				//prin($INSERT);				
				$insertado=insert(array_merge(
							array('fecha_creacion'=>"now()"),
							$INSERT
							)            
						,"productos_stock"
						,0);
				
		}
		
		/*
		update(array("stock"=>''),"productos_items","");
		$productos=select('id','productos_items','');
		foreach($productos as $pro){
			$stock=contar("productos_stock","where id_item='".$pro['id']."'");
			if($stock!=0){	
				update(array('stock'=>$stock),'productos_items',"where id='".$pro['id']."'",0);
			}
		}
		*/
		redir('app.php?paso=fin'.$params);
		

	}

break;
case "fin":
?>
<div class="importar_csv">
<?php if($_GET['error']=='fin'){ ?>
<h2>Error al insertar los registros. Vuelva a intentarlo</h2>
<?php } else { ?>
<h2>Fin de proceso : Stock importado exitosamente.</h2>
<?php } ?>
</div>

<?php 
break;
}

?>
