<?php //á



$MONEDA['1']="S/.";
$MONEDA['2']="\$";

$USU_IMG_DEFAULT=$SERVER['BASE'].THEME_PATH.'img/common/spacer.gif';


function procesar_titulo($string){
	global $COMMON;
	$title=ucfirst($string)." | ".$COMMON['datos_root']['titulo_web'];
	return $title;
	
}

$TAGS=array();
$TAGS[]=$COMMON['datos_root']['titulo_web'];

function procesar_keywords($string){

	global $STOPWORDS;
	global $TAGS;
	$string=str_replace(array("\n","\t","\r"),array(" "," "," "),strip_tags($string));
	$keyword = new autokeyword(array('content'=>$string,'stopwords'=>$STOPWORDS), "utf-8");
	$keys = $keyword->get_keywords();	
	$keys=array_merge($TAGS,$keys);
	$keys2=array_chunk($keys,10);
	$keys=$keys2[0];	
	$keywords=implode(",",$keys);
	//prin($keywords,"#0000FF");
	return $keywords;
	
}

function procesar_description($string){

	$string=str_replace("...","",limit_string($string,150));
	//prin($string,"#FFFF00");
	return $string;

}



function render_pedido($carrito,$precio=true,$more){

	global $COMMON;
	$html='';
	$tot=0;
	$html.="<table style='font:inherit;' cellspacing=2 cellpadding=2 width=100%><tbody  bgcolor='#eeeeee' ><tr><td><b>Nombre</b></td>";
	if($precio){ $html.="<td align=center><b>Precio Unitario</b></td>"; }
	$html.="<td align=center><b>Cantidad</b></td>";
	if($precio){ $html.="<td align=right><b>SubTotal</b></td>"; }
	$html.="</tr>";
	foreach($carrito as $carr){
			$sub=$carr['u']*$carr['c'];
			$tot=$tot+$sub;
			$html.="<tr>";
			$html.="<td><i>".$carr['n']."</i></td>";
			if($precio){ $html.="<td align=center>".$carr['u']."</td>"; }
			$html.="<td align=center>".$carr['c']."</td>";
			if($precio){ $html.="<td align=right>". $COMMON['datos_root']['simbolo_moneda'] . $sub. "</td>"; }
			$html.="</tr>";			
	}
	
	if($more['gastos']){
		$sub=$more['gastos']['m'];
		$tot=$tot+$sub;		
		$html.="<tr>";
		$html.="<td><i><b>".$more['gastos']['i']."</b></i></td>";
		if($precio){ $html.="<td align=center>&nbsp;</td>"; }
		$html.="<td align=center>&nbsp;</td>";
		if($precio){ $html.="<td align=right>". $COMMON['datos_root']['simbolo_moneda'] . $sub. "</td>"; }
		$html.="</tr>";		
	}		
	
	if($precio){ $html.="<tr><td colspan=3 align=right><b>TOTAL</b></td><td align=right><b>". $COMMON['datos_root']['simbolo_moneda'] . $tot . "</b></td></tr>"; }
	$html.="</tbody></table>";
	return $html;
	
}

function turismo_desde_hasta($desde,$hasta){
	$hasta=strtotime($hasta);
	$desde=strtotime($desde);
	$Array_Meses1=array(1=>"enero","febrero","marzo","abril","mayo","junio","julio","agosto","setiembre","octubre","noviembre","diciembre");
	$html = "Del ";
	$html.= date("j",$desde).( (date("j",$desde)=='1')?"ro":"")." ";
	if(date("n",$desde)!=date("n",$hasta)){
	$html.= "de ".ucfirst($Array_Meses1[date("n",$desde)])." ";
	}
	$html.= "al ";
	$html.= date("j",$hasta).( (date("j",$hasta)=='1')?"ro":"")." ";
	$html.="de ".ucfirst($Array_Meses1[date("n",$hasta)]);	
	return $html;
}

function turismo_dias_noches($desde,$hasta,$nnoches){
	if($nnoches!=''){
		$dif=$nnoches;
	}else{
		$h=strtotime($hasta)/(3600*24);
		$d=strtotime($desde)/(3600*24);
		$dif=$h-$d;
	}
	echo ($dif>0)?( ($dif+1)." días / ".$dif."noches" ):"";
}

	$Cambio[1][2]=(1/2.9);		// de dolares a soles
	$Cambio[2][1]=3;  			// de soles a dolares

	$Simbolos=array(
		 1=>'$'		//dolares
		,2=>'S/.'   //soles
	);	
	$Monedas=array(
		'dolares'=>'1'	//dolares
		,'soles'=>'2'	//soles
	);
	$MonedasLabel=array(
		'dolares'=>'Dólares Americanos'	//dolares
		,'soles'=>'Nuevos Soles'	//soles
	);	
	
	$LabelHabitacion=array(
		'preciospl'=>'Habitación Simple'
		,'preciosplna'=>'NA'
		,'preciodbl'=>'Habitación Doble o Matrimonial'
		,'preciodblna'=>'NA'
		,'preciotpl'=>'Habitación Triple'
		,'preciotplna'=>'NA'
		,'preciocpl'=>'Habitación Cuadruple'
		,'preciocplna'=>'NA'
		,'precioqpl'=>'Habitación Quintuple'
		,'precioqplna'=>'NA'
		,'precioxpl'=>'Habitación Sextuple'
		,'precioxplna'=>'NA'
	);
	$Precios=array(
		'preciospl'
		,'preciosplna'
		,'preciodbl'
		,'preciodplna'
		,'preciotpl'
		,'preciotplna'
		,'preciocpl'
		,'preciocplna'
		,'precioqpl'
		,'precioqplna'
		,'precioxpl'
		,'precioxplna'
	);	
	
	$PreciosAdicionales=array(
		'preciosplna'
		,'preciodplna'
		,'preciotplna'
		,'preciocplna'
		,'precioqplna'
		,'precioxplna'
	);	
	
	$HotelesTipos=array(
		'0'=>'Hostal '
		,'1'=>''
	);			

function turismo_tabla_precios($precios,$opciones=NULL){

	global $Cambio; global $Simbolos; global $Monedas; global $LabelHabitacion; global $Precios; global $MonedasLabel;
	global $HotelesTipos;
	
	$monedas=(isset($opciones['monedas']))?$opciones['monedas']:array('dolares');

	$pre=array();
	foreach($precios as $precio){
		$moneda=$precio['moneda'];
		if(!isset($opciones['seleccion'])){
			foreach($precio as $key=>$num){
				if(in_array($key,array("hotel","estrellas"))){
					$cell[$key]=$precio[$key];
				}
				if(in_array($key,$Precios) and trim($num)!='' and $num!=0){
					$Columna[$key]=$key;
					foreach($monedas as $mon){						
						$cell[$key][$mon]['numero']=($Monedas[$mon]==$moneda)?$num:ceil($Cambio[$Monedas[$mon]][$moneda]*$num); 
						$cell[$key][$mon]['simbolo']=$Simbolos[$Monedas[$mon]];
					} 					
				}
			}
		}
		$cells[]=$cell;
	}
	
	$name='precios';
	
	$html ="";
	$html.=(sizeof($precios)>1)?"<h2>Otras Opciones de hoteles</h2>":"<h2>Opciones de hotel</h2>";
//	prin($cells);
	$html.= '<div class="bloque_tabla">';
	foreach($monedas as $key=>$mon){ 
		$show=($key==0)?'':' style="display:none;" ';	
		$html.="<div class='area_tab_".$name."' id='area_tab_".$name."_".$mon."' ".$show." >";
//		$html.="<div class='titulo'>";
		$html.="<h3>Precios por persona en <b>".$MonedasLabel[$mon]."</b></h3>";
		for($i=0;$i<sizeof($monedas);$i++){
		if($mon!=$monedas[$i]){
		$html.="<a class='switch' href='#' onclick='javascript:switch_tab(\"".$name."\",\"".$monedas[$i]."\"); return false;' rel='nofollow' >ver precios en ".$MonedasLabel[$monedas[$i]]."</a>";		
		}
		}
//		$html.="</div>";
		$html.='<table>';
		$html.='<thead>';
		$html.='<tr>';
		$html.='<th class="izq">'. ((sizeof($cells)>1)?"Hoteles":"Hotel" ) .'</th>';
		foreach($Columna as $Col){
			$html.='<th>';
			$html.=$LabelHabitacion[$Col];
			$html.='</th>';
		}
		$html.='</tr>';
		$html.='</thead>';
		$html.='<tbody>';
		foreach($cells as $i=>$Cell){
			$html.="<tr class='".(($i%2==0)?"par":"impar")."'>";
			$html.='<th class="izq">';
			$html.=$HotelesTipos[$Cell['hotel']['tipo']];
			$html.=$Cell['hotel']['nombre']." ";
			$html.=$Cell['hotel']['estrellas']."*";
			$html.="</th>";
			foreach($Columna as $Col){
				$html.="<td>";
				$html.=$Cell[$Col][$mon]['numero'];
				$html.="</td>";	
			}
			$html.="</tr>";
		}
		$html.='</tbody>';
		$html.='</table>';
		$html.='</div>';	
	}
	$html.='</div>';	
	
	echo $html;
	
}

function turismo_precio_minimo($precios,$opciones=NULL){

	global $Cambio; global $Simbolos; global $Monedas; global $Precios;
	
	$Monedas=array('dolares'=>'1','soles'=>'2');
	$monedas=(isset($opciones['monedas']))?$opciones['monedas']:array('dolares');

	$pre=array();
	$min=0;
	foreach($precios as $precio){
		$moneda=$precio['moneda'];
		if(!isset($opciones['seleccion'])){
			foreach($precio as $key=>$num){
				if(in_array($key,$Precios) and trim($num)!='' and $num!=0){				
					if($min==0){ 
						$min=$num; 
						foreach($monedas as $mon){ 
							$minA[$mon]['numero']=($Monedas[$mon]==$moneda)?$num:ceil($Cambio[$Monedas[$mon]][$moneda]*$num); 
							$minA[$mon]['simbolo']=$Simbolos[$Monedas[$mon]];
						} 					
					}
					if($num<$min){
						$min=$num; 
						foreach($monedas as $mon){ 
							$minA[$mon]['numero']=($Monedas[$mon]==$moneda)?$num:ceil($Cambio[$Monedas[$mon]][$moneda]*$num); 
						} 
					}
				}
			}
		}else{
			$num=$precio[$opciones['seleccion']];
			if(trim($num)!='' and $num!=0){
				if($min==0){ $min=$num; 
					foreach($monedas as $mon){ 
						$minA[$mon]['numero']=($Monedas[$mon]==$moneda)?$num:ceil($Cambio[$Monedas[$mon]][$moneda]*$num); 
						$minA[$mon]['simbolo']=$Simbolos[$Monedas[$mon]];
					} 				
				}
				if($num<$min){ 
					$min=$num; 
					foreach($monedas as $mon){ 
						$minA[$mon]['numero']=($Monedas[$mon]==$moneda)?$num:ceil($Cambio[$Monedas[$mon]][$moneda]*$num); 
						$minA[$mon]['simbolo']=$Simbolos[$Monedas[$mon]];
					} 
				}
			}
		}
	}
//	prin($min);
	//prin($minA);
	return $minA;
	
	}

function render_precios($obj){

	$moneda=(isset($obj['moneda']))?$obj['moneda']:'2';
	$cambio=$obj['cambio'];
	
	if($moneda=='2'){	
						$precio['soles']="S/.".number_format($obj['precio'], 2, '.', ','); 
						$precio['dolares']="\$".number_format($obj['precio']/$cambio['venta'], 2, '.', ','); 
					}
	if($moneda=='1'){	
						$precio['soles']="S/.".number_format($obj['precio']*$cambio['compra'], 2, '.', ','); 
						$precio['dolares']="\$".number_format($obj['precio'], 2, '.', ','); 
					}					

	return $precio;				
}

?>