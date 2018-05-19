<?php

$concat=array();

function opciones($campos,$tabla,$donde,$debug=0){
	$array=select($campos,$tabla,$donde,$debug);
	$Arr=array();
	foreach($array as $arra){
		$Arr[$arra['id']]=$arra['nombre'];
	}
	return $Arr;
}

function select($campos,$tabla,$donde,$debug=0,$opciones=NULL,&$concat=NULL){

	$Tabla=$tabla;
	global $link;
	if(is_string($campos)) {
		$camposA=explode(",",$campos);
		//$strcampos=$campos;
	}elseif(is_array($campos)){
		$camposA=$campos;
		$campos=implode(",",$campos);
	}
	foreach($camposA as $ii=>$AA){
		@list($ca,$as)=explode(" as ",strtolower($AA));
		if($as){
			$camposA[$ii]=$as;
		}
	}
	$filas = array();
	/*if(is_array($debug)){
	 foreach ($debug as &$v) { $v = htmlentities(mysql_real_escape_string($v); }
	 		$consulta = vsprintf( "select $campos from $tabla $donde" , $debug );
	 		} else {*/
	if(enhay($donde,"MATCH")){
		list($uno,$dos,$tres)=between($donde,"MATCH","AGAINST");
		list($uno0,$dos0,$tres0)=between("AGAINST".$tres,"AGAINST",")");
		$campos=$campos.",MATCH".$dos."AGAINST".$dos0.") as matchscore";
		if(enhay($donde,"order by")){
			$donde=str_replace("order by","order by matchscore desc,",$donde);
		} else {
			$donde=$donde." order by matchscore desc";
		}
		//prin($match);
	}
	$consulta="select $campos from $tabla $donde";
	// echo $consulta;
	//}
	$result=mysql_query($consulta,$link);
	//$result=mysql_query($consulta,$link) or $error=mysql_error;
	$total=mysql_num_rows($result);
	if($total>0){
		while ($row = mysql_fetch_row($result)){
			foreach ($camposA as $ee=>$cc) {
				$row2[trim($cc)]=$row[$ee];
			}
			$filas[]=$row2;
			unset($row2);
		}
	}
	if($debug==1){
		prin($camposA);
		prin($consulta);
	}
	if($debug==2){
		$error=mysql_error();
		$success=($error=='')?1:0;
		if($success){
			prin(array('success'=>$success));
		} else {
			prin(array('success'=>$success,'error'=>mysql_error()));
		}
	}
	if(sizeof($opciones)>0){
		$filas2=array();
		foreach($filas as $fila){
			$fila2=$fila;
			foreach ($opciones as $dd=>$ff) {
				if( is_array($ff) and sizeof($ff)>0 ){
					list($accion,$argumentos)=each($ff);
					switch($accion){
						case "function":
							ob_start();
							eval(procesar_llaves($fila2,$argumentos['0']));
							$fila2[$dd]=ob_get_contents();
							ob_end_clean();
							break;
						case "video":
							$fila2[$dd]=render_video(
							($argumentos['codigo'])?procesar_llaves($fila2,$argumentos['codigo']):procesar_llaves($fila2,$argumentos['0'])
							,($argumentos['id'])?procesar_llaves($fila2,$argumentos['id']):procesar_llaves($fila2,$argumentos['1'])
							,($argumentos['wxh'])?procesar_llaves($fila2,$argumentos['wxh']):procesar_llaves($fila2,$argumentos['2'])
							);
							break;
						case "sub_select": case "matriz": case "filas":
							$fila2[$dd]=select(
							($argumentos['campos'])?$argumentos['campos']:$argumentos['0']
							,($argumentos['tabla'])?$argumentos['tabla']:$argumentos['1']
							,($argumentos['donde'])?procesar_llaves($fila2,$argumentos['donde']):procesar_llaves($fila2,$argumentos['2'])
							,($argumentos['debug'])?$argumentos['debug']:$argumentos['3']
							,($argumentos['opciones'])?$argumentos['opciones']:$argumentos['4']
							);
							break;
						case "sub_foto": case "foto":
							list($campus,$tabla,$donde)=explode("|",$argumentos[0]);
							$carpeta=$argumentos[1];
							$ouou=array();
							foreach($argumentos[2] as $ii=>$oo){
								$uuu=explode(",",$oo);
								if(sizeof($uuu)==1){
									$ouou[$ii]=array('get_archivo'  =>array('carpeta'=>$carpeta,'fecha'=>'{fecha_creacion}','file'=>'{file}','tamano'=>$uuu['0']));
								} else {
									$ouou[$ii]=array('get_atributos'=>array('carpeta'=>$carpeta,'fecha'=>'{fecha_creacion}','file'=>'{file}','tamano'=>$uuu['0'],'dimensionado'=>$uuu['1'],'centrado'=>$uuu['2']));
								}
							}
							$fila2[$dd]=select_fila(
									$campus
									,$tabla
									,procesar_llaves($fila2,$donde)
									,$debug
									,$ouou
							);
							break;
						case "sub_fotos": case "fotos":
							list($campus,$tabla,$donde,$debug)=explode("|",$argumentos[0]);
							$carpeta=$argumentos[1];
							$ouou=array();
							foreach($argumentos[2] as $ii=>$oo){
								$uuu=explode(",",$oo);
								if(sizeof($uuu)==1){
									$ouou[$ii]=array('get_archivo'  =>array('carpeta'=>$carpeta,'fecha'=>'{fecha_creacion}','file'=>'{file}','tamano'=>$uuu['0']));
								} else {
									$ouou[$ii]=array('get_atributos'=>array('carpeta'=>$carpeta,'fecha'=>'{fecha_creacion}','file'=>'{file}','tamano'=>$uuu['0'],'dimensionado'=>$uuu['1'],'centrado'=>$uuu['2']));
								}
							}
							$fila2[$dd]=select(
									$campus
									,$tabla
									,procesar_llaves($fila2,$donde)
									,$debug
									,$ouou
							);
							break;
						case "sub_contar": case "contar":
							$fila2[$dd]=contar(
							($argumentos['tabla'])?$argumentos['tabla']:$argumentos['0']
							,($argumentos['donde'])?procesar_llaves($fila2,$argumentos['donde']):procesar_llaves($fila2,$argumentos['1'])
							,($argumentos['debug'])?$argumentos['debug']:$argumentos['2']
							);
							break;
						case "sub_select_fila": case "fila":
							$fila2[$dd]=select_fila(
							($argumentos['campos'])?$argumentos['campos']:$argumentos[0]
							,($argumentos['tabla'])?$argumentos['tabla']:$argumentos[1]
							,($argumentos['donde'])?procesar_llaves($fila2,$argumentos['donde']):procesar_llaves($fila2,$argumentos[2])
							,($argumentos['debug'])?$argumentos['debug']:$argumentos[3]
							,($argumentos['opciones'])?$argumentos['opciones']:$argumentos[4]
							);
							break;
						case "sub_select_dato":	case "dato":
							$fila2[$dd]=select_dato(
							($argumentos['campo'])?$argumentos['campo']:$argumentos['0']
							,($argumentos['tabla'])?$argumentos['tabla']:$argumentos['1']
							,($argumentos['donde'])?procesar_llaves($fila2,$argumentos['donde']):procesar_llaves($fila2,$argumentos['2'])
							,($argumentos['debug'])?$argumentos['debug']:$argumentos['3']
							,($argumentos['opciones'])?$argumentos['opciones']:$argumentos['4']
							);
							break;
						case "get_atributos": case "atributos": case "atributo":
							if(!is_array($argumentos)){
								$argumentos=explode(",",$argumentos);
							}
							$fila2[$dd]=dimensionar_imagen(
									($argumentos['carpeta'])?procesar_llaves($fila2,$argumentos['carpeta']):procesar_llaves($fila2,$argumentos['0']),
									($argumentos['fecha'])?procesar_llaves($fila2,$argumentos['fecha']):procesar_llaves($fila2,$argumentos['1']),
									($argumentos['file'])?procesar_llaves($fila2,$argumentos['file']):procesar_llaves($fila2,$argumentos['2']),
									($argumentos['tamano'])?procesar_llaves($fila2,$argumentos['tamano']):procesar_llaves($fila2,$argumentos['3']),
									($argumentos['dimensionado'])?procesar_llaves($fila2,$argumentos['dimensionado']):procesar_llaves($fila2,$argumentos['4']),
									($argumentos['centrado'])?procesar_llaves($fila2,$argumentos['centrado']):procesar_llaves($fila2,$argumentos['5'])
							);
							break;
						case "get_archivo":	case "archivo":
							if(!is_array($argumentos)){
								$argumentos=explode(",",$argumentos);
							}
							$fila2[$dd]=get_imagen(
									($argumentos['carpeta'])?procesar_llaves($fila2,$argumentos['carpeta']):procesar_llaves($fila2,$argumentos['0']),
									($argumentos['fecha'])?procesar_llaves($fila2,$argumentos['fecha']):procesar_llaves($fila2,$argumentos['1']),
									($argumentos['file'])?procesar_llaves($fila2,$argumentos['file']):procesar_llaves($fila2,$argumentos['2']),
									($argumentos['tamano'])?procesar_llaves($fila2,$argumentos['tamano']):procesar_llaves($fila2,$argumentos['3'])
							);
							break;
						case "limit_string": case "limit":
							$fila2[$dd]=limit_string(
							($argumentos['string'])?procesar_llaves($fila2,$argumentos['string']):procesar_llaves($fila2,$argumentos['0']),
							($argumentos['limit'])?$argumentos['limit']:$argumentos['1']
							);
							break;
						case "formato_moneda": case "moneda":
							$fila2[$dd]=procesar_llaves($fila2,$argumentos['simbolo']).number_format(
							procesar_llaves($fila2,$argumentos['numero'])
							, 2, '.', ','
									);
									break;
						case "trim":
							$fila2[$dd]=trim(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "procesar_url": case "url":
							$fila2[$dd]=(function_exists('procesar_url'))?procesar_url(
							($argumentos['url'])?procesar_llaves($fila2,$argumentos['url']):procesar_llaves($fila2,$argumentos['0'])
							):$fila2[$dd];
							break;
						case "fecha_formato": case "fecha":
							$fila2[$dd]=fecha_formato(
							($argumentos['fecha'])?procesar_llaves($fila2,$argumentos['fecha']):procesar_llaves($fila2,$argumentos['0']),
							($argumentos['formato'])?procesar_llaves($fila2,$argumentos['formato']):procesar_llaves($fila2,$argumentos['1'])
							);
							break;
						case "opcion":
							$fila2[$dd]=get_opcion(
							$Tabla
							,procesar_llaves($fila2,$argumentos['campo'])
							,procesar_llaves($fila2,"{".$argumentos['campo']."}")
							);
							break;
						case "ucfirst":
							$fila2[$dd]=ucfirst(
							procesar_llaves($fila2,$argumentos['string'])
							);
						case "url_externa":
							$fila2[$dd]=url_externa(
							procesar_llaves($fila2,$argumentos['link'])
							);
							break;
						case "cleantext":
							$fila2[$dd]=cleantext(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "nl2br":
							$fila2[$dd]=nl2br(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "ucwords":
							$fila2[$dd]=ucwords(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "strtolower":
							$fila2[$dd]=strtolower(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "strtoupper":
							$fila2[$dd]=strtoupper(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "stripslashes":
							$fila2[$dd]=stripslashes(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "htmlspecialchars":
							$fila2[$dd]=htmlspecialchars(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "strip_tags":
							$fila2[$dd]=strip_tags(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "url_encode_seo":
							$fila2[$dd]=url_encode_seo(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "urlencode":
							$fila2[$dd]=urlencode(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "url_friendly":
							$fila2[$dd]=url_friendly(
							procesar_llaves($fila2,$argumentos['string'])
							);
							break;
						case "match":
							$argumentos['a']	=($argumentos['a'])		?$argumentos['a']		:$argumentos[0];
							$argumentos['b']	=($argumentos['b'])		?$argumentos['b']		:$argumentos[1];
							$argumentos['equal']=($argumentos['equal'])	?$argumentos['equal']	:$argumentos[2];
							$argumentos['else']	=($argumentos['else'])	?$argumentos['else']	:$argumentos[3];
							$fila2[$dd]=(trim(procesar_llaves($fila2,$argumentos['a']))==trim(procesar_llaves($fila2,$argumentos['b'])))?$argumentos['equal']:$argumentos['else'];
							break;
						case "concat":
							$concat[$dd][]=procesar_llaves($fila2,$argumentos['values']);
							break;
						default:
							if(function_exists($accion)){
								foreach($argumentos as &$aa){
									$aa=procesar_llaves($fila2,$aa);
								}
								$fila2[$dd]=call_user_func_array($accion,$argumentos);
							}
							break;
					}
				} else
				{
					if($ff=='null'){
					$fila2[$dd]='null';
					unset($fila2[$dd]);
					} else {
					$fila2[$dd]=procesar_llaves($fila2,$ff);
					}
				}
			}
			$filas2[]=$fila2;
		}
		if($debug==3){
			prin(array('total'=>$total,'rows'=>$filas,'final'=>$filas2));
		}
		$filas=$filas2;
	} else {
		if($debug==3){
			prin(array('total'=>$total,'rows'=>$filas));
		}
	}

	foreach($filas as $ii=>$fila){
		foreach($fila as $one=>$two){
			if($two=='null'){
				unset($filas0[$one]);
			}
			elseif(enhay($one,":")){
				$ones=explode(":",$one);
				eval("\$filas0['".$ii."']['".$ones[0]."']['".$ones[1]."']=\$two;");
			} else {
				$filas0[$ii][$one]=$two;
			}
		}
	}
	$filas=$filas0;

	return $filas;

}


function select_fila($campos,$tabla,$donde,$debug=0,$opciones=NULL){
	$matriz=select($campos,$tabla,$donde,$debug,$opciones);
	if(sizeof($matriz)>0) {
		$fila = $matriz[0];
		return $fila;
	} else {
		return false;
	}
}


function select_dato($campo,$tabla,$donde,$debug=0){
	$matriz=select($campo,$tabla,$donde,$debug);
	if(sizeof($matriz)>0){
		$fila=$matriz[0];
		$dato=$fila[$campo];
		return $dato;
	} else {
		return false;
	}
}
function get_valores($key,$value,$tabla,$donde,$debug){
	$matriz=select("$key,$value",$tabla,$donde,$debug);
	$ret=array();
	foreach($matriz as $mat){
		$ret[$mat[$key]]=$mat[$value];
	}
	return $ret;
}

function insert($campos_array,$tabla,$debug=0){

	global $link;
	$ccc=array_keys($campos_array);
	foreach($campos_array as $ll){
		switch(trim($ll)){
			case "NULL": $ppp[]="NULL"; break;
			case "now()": $ppp[]="'".date("Y-m-d H:i:s")."'"; break;
			default: $ppp[]="'".mysql_real_escape_string($ll)."'"; break;
		}
	}
	$consulta="insert into $tabla (". implode(",",$ccc) .") values (" .implode(",",$ppp). ")";
	if($debug==1){
		prin($consulta.";");
	}
	if(mysql_query($consulta,$link)){
		$return =array('success'=>1,'id'=>mysql_insert_id());
	}
	else { $return =array('success'=>0,'error'=>mysql_error());
	}
	if($debug==2){
		prin($return);
	}
	return $return;

}

function update($campos_array,$tabla,$where,$debug=0){
	//prin($where);
	global $link;
	foreach($campos_array as $tt=>$ll){
		switch(trim($ll)){
			case "NULL": $ppp[]="$tt=NULL"; break;
			case "now()": $ppp[]="$tt='".date("Y-m-d H:i:s")."'"; break;
			case "++": $ppp[]="$tt=$tt+1"; break;
			case "--": $ppp[]="$tt=$tt-1"; break;
			default: $ppp[]="$tt='".mysql_real_escape_string($ll)."'"; break;
		}
	}
	$consulta="update $tabla set ". implode(",",$ppp) ." ".$where;
	if($debug==1){
		prin($consulta.";");
	}
	if(mysql_query($consulta,$link)){
		$return =array('success'=>1);
	}
	else { $return =array('success'=>0,'error'=>mysql_error());
	}
	if($debug==2){
		prin($return);
	}
	return $return;

}

function delete($tabla,$where,$debug=0){

	global $link;
	$consulta="delete from $tabla $where";
	if($debug==1){
		prin($consulta.";");
	}
	if(mysql_query($consulta,$link)){
		$return =array('success'=>1);
	}
	else { $return =array('success'=>0,'error'=>mysql_error());
	}
	/*
	 if($debug==1){
	prin($consulta);
	}
	*/
	return $return;

}

function contar($tabla,$donde,$debug=0){

	global $link;
	$ddd=explode("order",$donde); $donde=$ddd[0];
	$consulta="select count(*) from $tabla $donde ";
	if($debug==1){
		prin($consulta);
	}
	$result=mysql_query($consulta,$link);
	$row = mysql_fetch_row($result);
	return $row[0];

}

function hay($tabla,$donde,$debug=0){
	$contar=contar($tabla,$donde,$debug);
	if($debug) prin($contar);
	$return =($contar==0)?false:true;
	if($debug) prin(($return)?1:0);
	return $return;
}

function isthere($tabla,$donde,$debug=0){ hay($tabla,$donde,$debug); }

function aumentar($campo,$tabla,$where){

	$valor=select_dato($campo,$tabla,$where);
	update(array($campo=>$valor+1),$tabla,$where);

}

function enlace($enlace,$onclick,$pag,$var_pag,$procesar_url){

	$html ='';
	$enlacepag=$enlace.$pag;
	$enlacepag=str_replace(array("&".$var_pag."=10","?".$var_pag."=10"),array("&".$var_pag."=diez","?".$var_pag."=diez"),$enlacepag);
	$enlacepag=str_replace(array("&".$var_pag."=1","?".$var_pag."=1"),array("",""),$enlacepag);
	$enlacepag=str_replace(array("&".$var_pag."=diez","?".$var_pag."=diez"),array("&".$var_pag."=10","?".$var_pag."=10"),$enlacepag);
	if($procesar_url){
		$html.=($enlace=='#')?" href='#'":" href='".procesar_url($enlacepag)."'";
	} else {
		$html.=($enlace=='#')?" href='#'":" href='".$enlacepag."'";
	}
	$html.=($onclick=='')?"":" onclick='javascript:".str_replace("PAG",$pag,$onclick)."'";
	return $html;

}



function paginacionnumerada($parametros,$campos,$tabla,$donde,$debug=0,$opciones=NULL,&$concat=NULL){

	global $_GET;
	$pagin=$_GET['pag'];
	if($pagin==''){
		$pagin=1;
	}

	if(is_array($parametros['item'])){

		$wer=each($parametros['item']);

	}

	if($wer['value']!=''){

		$visi=select($campos,$tabla," where ".$wer['key']."='".$wer['value']."' ",$debug,$opciones);

		$tot=1;

		$cm = array(
				'filas'=>$visi,
				'total'=>$tot,
				'pagina'=>$pagin,
				'anterior'=>"",
				'siguiente'=>"",
				'desde'=>1,
				'hasta'=>$tot,
				'tren'=>""
		);

		return $cm;

	} else {

		if($parametros['porpag']==0){

			$visi=select($campos,$tabla,$donde." limit 0,100",$debug,$opciones,$concat);

			$tot=sizeof($visi);

			$cm = array(
					'filas'=>$visi,
					'pagina'=>$pagin,
					'total'=>$tot,
					'anterior'=>"",
					'siguiente'=>"",
					'desde'=>1,
					'hasta'=>$tot,
					'tren'=>""
			);

			return $cm;

		} else {

			//pagin
			//porpag,anterior,siguiente,enlace
			$porpag=$parametros['porpag'];
			$anterior=$parametros['anterior'];
			$siguiente=$parametros['siguiente'];
			$enlace=$parametros['enlace'];
			$separador=$parametros['separador'];
			$onclick=$parametros['onclick'];
			$pagina_disabled=$parametros['pagina_disabled'];
			$tren_limite=($parametros['tren_limite'])?$parametros['tren_limite']:10;
			$procesar_url=($parametros['procesar_url'])?$parametros['procesar_url']:0;
			$tipo=($parametros['tipo'])?$parametros['tipo']:'default';


			parse_str($enlace,$gets);
			$gets=array_keys($gets);
			$var_pag=$gets[sizeof($gets)-1];


			if($pagin==''){
				$pagin=1;
			}

			$total=contar($tabla,$donde,0);
			//prin($tabla);
			//prin($donde);
			//prin($total);

			$finpag=$total;
			$inicio=$porpag*($pagin-1);

			if($total>$porpag){

				$visi=select($campos,$tabla,$donde." limit $inicio,$porpag",$debug,$opciones,$concat);

				$finpag=sizeof($visi);

				$prev_pag=$pagin-1;
				$next_pag=$pagin+1;


				if ($pagin==1) {
					$prev="<span  class='linkarrowselec'>".$anterior."</span>";
					$prevA="<li class='disabled'><a href='#'>".$anterior."</a></li>";
				} else {
					$prev=($anterior=='')?"":"<a " . enlace($enlace,$onclick,$prev_pag,$var_pag,$procesar_url) . " class='linkarrow'>$anterior</a>";
					$prevA=($anterior=='')?"":"<li><a " . enlace($enlace,$onclick,$prev_pag,$var_pag,$procesar_url) . " >$anterior</a></li>";
				}

				if ($total==($finpag+$inicio)) {
					$next="<span class='linkarrowselec'>".$siguiente."</span>";
					$nextA="<li class='disabled'><a href='#'>".$siguiente."</span></li>";
				} else {
					$next=($siguiente=='')?"":"<a " . enlace($enlace,$onclick,$next_pag,$var_pag,$procesar_url) . " class='linkarrow' >$siguiente</a>";
					$nextA=($siguiente=='')?"":"<li><a " . enlace($enlace,$onclick,$next_pag,$var_pag,$procesar_url) . " >$siguiente</a></li>";
				}

			} else {

				$visi=select($campos,$tabla,$donde,$debug,$opciones,$concat);

			}
			$sun=(int)(($total-1)/$porpag)+1;
			for($i=1;$i<=$sun;$i++){
				if($i==$pagin){
					$raba[]="<span class='linkpagselec'>$i</span>";
					$rabaA[]="<li class='active'><a href='#'>$i</a></li>";
				} else {
					$raba[]="<a class='linkpag' " . enlace($enlace,$onclick,$i,$var_pag,$procesar_url) . " >$i</a>";
					$rabaA[]="<li><a " . enlace($enlace,$onclick,$i,$var_pag,$procesar_url) . " >$i</a></li>";
				}
			}
			$marder=3;
			$inicior=($pagin>$tren_limite-1-$marder)?($pagin-$tren_limite+$marder):0;
			//$inicior=$pagin;
			if(sizeof($raba)>$tren_limite){
				for( $r = $inicior ;  $r < $inicior + $tren_limite  ; $r++ ){

					if( $r==$inicior and $inicior>0 ){
						$raba2[]=$raba[0];
						$raba2A[]=$rabaA[0];
					} else {
						$raba2[]=$raba[$r];
						$raba2A[]=$rabaA[$r];
					}

					if($raba[$r]!=''){
						$ultimoraba=$raba[$r];
						$ultimorabaA=$rabaA[$r];
					}

				}
				if($ultimoraba!=$raba[sizeof($raba)-1]){
					$raba2[]="<span class='linkarrowselec'>&nbsp;...&nbsp;</span>";
					//$raba2[]=$raba[sizeof($raba)-2];
					$raba2[]=$raba[sizeof($raba)-1];
					$raba2A[]="<li class='disabled'><a href='#'>&nbsp;...&nbsp;</span>";
					//$raba2[]=$raba[sizeof($raba)-2];
					$raba2A[]=$rabaA[sizeof($raba)-1];
				}
				$raba=$raba2;
				$rabaA=$raba2A;

			}


			$rabas=(sizeof($raba)>1)?implode($separador,$raba):"";
			$rabasA=(sizeof($raba)>1)?implode($separador,$rabaA):"";

			if($pagina_disabled){

				$cm = array(
						'filas'=>$visi,
						'pagina'=>$pagin,
						'total'=>$total
				);

			} else {

				if($tipo=='bootstrap')
					$cm = array(
							'filas'=>$visi,
							'pagina'=>$pagin,
							'totalpaginas'=>sizeof($raba),
							'total'=>$total,
							'anterior'=>$prevA,
							'siguiente'=>$nextA,
							'desde'=>$inicio+1,
							'hasta'=>$finpag+$inicio,
							'tren'=>$rabasA
					);
				else
					$cm = array(
							'filas'=>$visi,
							'pagina'=>$pagin,
							'totalpaginas'=>sizeof($raba),
							'total'=>$total,
							'anterior'=>$prev,
							'siguiente'=>$next,
							'desde'=>$inicio+1,
							'hasta'=>$finpag+$inicio,
							'tren'=>$rabas
					);

			}

			return $cm;

		}

	}

}



function get_opcion($aa,$bb,$cc){

	global $OpcionesTabla;
	return $OpcionesTabla[$aa][$bb][$cc];

}

function fecha_formato($ff,$op=0){

	if(trim($ff)==''){
		return "";
	}
	if(trim($ff)=='0000-00-00 00:00:00'){
		return "";
	}
	if(trim($ff)=='now()'){
		$ff=date("Y-m-d H:i:s");
	}

	$Array_Meses0=array(1=>"ene","feb","mar","abr","may","jun","jul","ago","set","oct","nov","dic");
	$Array_Meses1=array(1=>"enero","febrero","marzo","abril","mayo","junio","julio","agosto","setiembre","octubre","noviembre","diciembre");
	$Array_Semanas0=array('Mon'=>"lunes",'Tue'=>"martes",'Wed'=>"miércoles",'Thu'=>"jueves",'Fri'=>"viernes",'Sat'=>"sábado",'Sun'=>"domingo");

	$Array_Meses1_en=array(1=>"january","febrery","march","april","may","june","july","august","setember","october","november","december");
	$Array_Semanas0_en=array('Mon'=>"Monday",'Tue'=>"Tuesdat",'Wed'=>"Wednesday",'Thu'=>"Thursday",'Fri'=>"Friday",'Sat'=>"Saturday",'Sun'=>"Sunday");

	$unix=strtotime($ff);
	switch($op){
		case "0": //23-set-2009
			$fecha=date("d",$unix)."-".$Array_Meses0[date("n",$unix)]."-".date("y",$unix);
		case "0b": //23-set
			$fecha=(date("Y",$unix)==date("Y"))?date("d",$unix)."-".$Array_Meses0[date("n",$unix)]:date("d",$unix)."-".$Array_Meses0[date("n",$unix)]."-".date("Y",$unix);
			break;
		case "1": //Miércoles, 23 de Setiembre
			$fecha=ucfirst($Array_Semanas0[date("D",$unix)]).", ".date("j",$unix)." de ".ucfirst($Array_Meses1[date("n",$unix)]);
			break;
		case "2":
			$fecha=ucfirst($Array_Semanas0[date("D",$unix)]).", ".date("j",$unix)." de ".ucfirst($Array_Meses1[date("n",$unix)])." de ".date("Y",$unix);
			break;
		case "2_en": //Miércoles, 23 de Setiembre de 2009
			$fecha=ucfirst($Array_Semanas0_en[date("D",$unix)]).", ".ucfirst($Array_Meses1_en[date("n",$unix)])." ".date("jS",$unix)." ".date("Y",$unix);
			break;
		case "3": //Miércoles, 23 de Set
			$fecha=ucfirst($Array_Semanas0[date("D",$unix)]).", ".date("j",$unix)." de ".ucfirst($Array_Meses0[date("n",$unix)]);
			break;
		case "4": //Setiembre 2009
			$fecha=ucfirst($Array_Meses1[date("n",$unix)])." ".date("Y",$unix);
			break;
		case "5": //23-09-2009
			$fecha=date("d-m-Y",$unix);
			break;
		case "5b": //23-09-2009
			$fecha=date("Y-m-d",$unix);
		case "5c": //23-09-2009
			$fecha=date("d",$unix)." <span style='font-variant:small-caps;'>".$Array_Meses0[date("n",$unix)]."</span> ".date("y",$unix);
			break;
		case "6": //23-09-09
			$fecha=date("d-m-y",$unix);
			break;
		case "7": //hoy 12:53 pm
			$fecha=str_replace(array(date("d-m-y"),date("d-m-y",strtotime("yesterday"))),array("hoy","ayer"),date("d-m-y g:ia",$unix));
			break;

		case "7b": //hoy 12:53 pm
			$fecha='<i title="'.ucfirst($Array_Semanas0[date("D",$unix)]).", ".date("j",$unix)." de ".ucfirst($Array_Meses1[date("n",$unix)])." de ".date("Y",$unix)." / ".date("g:i a",$unix).'">';
			if(date("y",$unix)==date("y")){
				$fecha.=str_replace('-',' ',str_replace(
						array('-01','-02','-03','-04','-05','-06','-07','-08','-09','-10','-11','-12'),
						array(' Ene',' Feb',' Mar',' Abr',' May',' Jun',' Jul',' Ago',' Set',' Oct',' Nov',' Dic'),
						str_replace(array(date("j-m-y"),date("j-m-y",strtotime("yesterday"))),array("hoy","ayer"),date("j-m g:ia",$unix))));
			} else {
				$fecha.=str_replace('-',' ',str_replace(date("-y"),'',str_replace(
						array('-01-','-02-','-03-','-04-','-05-','-06-','-07-','-08-','-09-','-10-','-11-','-12-'),
						array(' Ene-',' Feb-',' Mar-',' Abr-',' May-',' Jun-',' Jul-',' Ago-',' Set-',' Oct-',' Nov-',' Dic-'),
						str_replace(array(date("j-m-y"),date("j-m-y",strtotime("yesterday"))),array("hoy","ayer"),date("j-m-y ga",$unix)))));
			}
			$fecha.='</i>';
			break;
		case "7d": //hoy 12:53 pm
			$fecha='<i title="'.ucfirst($Array_Semanas0[date("D",$unix)]).", ".date("j",$unix)." de ".ucfirst($Array_Meses1[date("n",$unix)])." de ".date("Y",$unix)." / ".date("g:i a",$unix).'">';
			if(date("y",$unix)==date("y")){
				$fecha.=str_replace('-',' ',str_replace(
						array('-01','-02','-03','-04','-05','-06','-07','-08','-09','-10','-11','-12'),
						array(' Ene',' Feb',' Mar',' Abr',' May',' Jun',' Jul',' Ago',' Set',' Oct',' Nov',' Dic'),
						str_replace(array(date("j-m-y"),date("j-m-y",strtotime("yesterday"))),array("hoy","ayer"),date("j-m g:ia",$unix))));
			} else {
				$fecha.=str_replace('-',' ',str_replace(date("-y"),'',str_replace(
						array('-01-','-02-','-03-','-04-','-05-','-06-','-07-','-08-','-09-','-10-','-11-','-12-'),
						array(' Ene-',' Feb-',' Mar-',' Abr-',' May-',' Jun-',' Jul-',' Ago-',' Set-',' Oct-',' Nov-',' Dic-'),
						str_replace(array(date("j-m-y"),date("j-m-y",strtotime("yesterday"))),array("hoy","ayer"),date("j-m-y ga",$unix)))));
			}
			$fecha.='</i>';
			break;
		case "7c": //Miércoles, 23 de Setiembre de 2009
			$fecha=ucfirst($Array_Semanas0[date("D",$unix)]).", ".date("j",$unix)." de ".ucfirst($Array_Meses1[date("n",$unix)])." de ".date("Y",$unix)." / ".date("g:i a",$unix);
			break;
			break;
		case "7_en": //hoy 12:53 pm
			$fecha=str_replace(array(date("d-m-y"),date("d-m-y",strtotime("yesterday"))),array("today","yesterday"),date("d-m-y g:i a",$unix));
			break;
		case "8": //23-09-09 12:53 pm
			$fecha=date("d-m-y g:i a",$unix);
			break;
		case "8b": //23 de Setiembre de 2009
			$fecha=date("j",$unix)." de ".ucfirst($Array_Meses1[date("n",$unix)])." de ".date("Y - g:i a",$unix);
			break;			
		case "9": //hace 10 seg
			$fecha=calcular_tiempo($unix);
			break;
		case "10": //23 de Setiembre de 2009
			$fecha=date("j",$unix)." de ".ucfirst($Array_Meses1[date("n",$unix)])." de ".date("Y",$unix);
			break;
		case "11": //23/09/2009
			$fecha=date("d/m/Y",$unix);
			break;
		case "12": //23 de Setiembre
			$fecha=date("j",$unix)." de ".ucfirst($Array_Meses1[date("n",$unix)]);
			break;
	}

	if(trim($ff)==''){
		$fecha = "";
	}

	return $fecha;

}


function calcular_tiempo($U){

	$intervalo=date("U")-$U;
	if($intervalo<60){
		$string="hace un instante";
		//$string="hace $intervalo seg";
	} elseif($intervalo<3600) {
		$num = intval($intervalo/60);
		$string="hace ". $num ." min";
	} elseif($intervalo<86400) {
		$num = intval($intervalo/3600);
		$string="hace ". $num ." hr". ( ($num==1)?"":"s" );
	} elseif($intervalo<604800) {
		$num = intval($intervalo/86400);
		$string="hace ". $num ." dia". ( ($num==1)?"":"s" );
	} elseif($intervalo<2592000) {
		$num = intval($intervalo/604800);
		$string="hace ". $num ." semana". ( ($num==1)?"":"s" );
	} elseif($intervalo<31536000) {
		$num = intval($intervalo/2592000);
		$string="hace ". $num ." mes". ( ($num==1)?"":"es" );
	} else {
		$string="hace mucho";
	}
	return $string;

}

function render_video($codigo,$id,$wxh){

	global $HEAD;
	web_render_swf_script("http://www.youtube.com/v/".$codigo."&amp;hl=es&amp;fs=1&amp;rel=0&amp;color1=0x3a3a3a&amp;color2=0x999999&amp;autoplay=1","video_".$id."_inner",$wxh);
	$div='';
	$div.='<div id="video_'.$id.'" style="display:none;">';
	$div.="<div id='video_".$id."_inner'><div id='video_".$id."_inner_swf'></div></div>";
	$div.='</div>';

	return $div;

}

function get_imagen( $carpeta, $fecha_bd, $file, $tamano=NULL){

	global $httpfiles, $DIRECTORIO_IMAGENES, $USU_IMG_DEFAULT;
	global $MASTERCOFIG;

	if($MASTERCOFIG['imagenes_devel']=='1'){

		return "panel/img/devel.jpg";

	}

	if((!(strpos($file,"x.")===FALSE)) or ($file=='')) {
		$img=$USU_IMG_DEFAULT;
	} else {
		if($tamano==NULL){
			$img = $httpfiles."/".$DIRECTORIO_IMAGENES."/".$carpeta."/".str_replace("-","/",substr($fecha_bd,0,10)."/".$file);
		} else {
			$img = $httpfiles."/".$DIRECTORIO_IMAGENES."/".$carpeta."/".str_replace("-","/",substr($fecha_bd,0,10)."/".str_replace(".","_".$tamano.".",$file));
		}
	}

	$img = str_replace("http://","[http]",$img);
	$img = str_replace("///","/",$img);
	$img = str_replace("//","/",$img);
	$img = str_replace("[http]","http://",$img);

	return $img;

}

function dimensionar_imagen( $carpeta, $fecha_bd, $file, $tamano=NULL, $dimensionado_ideal=NULL, $centrado=NULL){

	global $MASTERCOFIG;
	global $USU_IMG_DEFAULT;
	global $SERVER;
	global $LOCAL;
	global $vars;
	//	$centrado=($centrado==NULL)?0:$centrado;
	if( ($MASTERCOFIG['imagenes_devel']=='1') or ($LOCAL and $vars['GENERAL']['mostrar_toolbars']) ){

		list($ancho_ideal,$alto_ideal) = explode("x",$dimensionado_ideal);

		$atributo=' src="'.$SERVER['PANEL'].'/img/devel.jpg" width="'.$ancho_ideal.'" height="'.$alto_ideal.'" ';

	} elseif($file==''){

		list($ancho_ideal,$alto_ideal) = explode("x",$dimensionado_ideal);

		$atributo=' src="'.$USU_IMG_DEFAULT.'" width="'.$ancho_ideal.'" height="'.$alto_ideal.'" ';

	} else {

		$tamano=($tamano==NULL)?1:$tamano;
		$img = get_imagen( $carpeta, $fecha_bd, $file, $tamano);
		$file2A=explode(".",$file);
		$file2B=explode("_",$file2A[sizeof($file2A)-2]);
		list($ancho_real,$alto_real) = explode("x",$file2B[sizeof($file2B)-1]);
		list($ancho_ideal,$alto_ideal) = explode("x",$dimensionado_ideal);

		if($USU_IMG_DEFAULT==$img){

			if($ancho_ideal=='' or $alto_ideal==''){

				$atributo = ' src="'.$img.'" ';

			} else {

				$atributo = ' src="'.$img.'"  width="'.$ancho_ideal.'" height="'.$alto_ideal.'"  ';

			}

		} else {

			if($ancho_ideal=='' or $alto_ideal==''){

				$atributo = ' src="'.$img.'" ';

			} else {

				if($ancho_real < $ancho_ideal && $alto_real < $alto_ideal){

					$atributo = ' src="'.$img.'"  width="'.$ancho_real.'" height="'.$alto_real.'" '. ( (!$centrado)?"":' style="margin-top:'. (intval(($alto_ideal-$alto_real)/2) ) .'px;" ' ) ;

				} elseif( $ancho_real >= $ancho_ideal || $alto_real >= $alto_ideal ){

					$escala_x = $ancho_real;
					$escala_y = $alto_real;

					if($centrado==2){

						if( $escala_x > $ancho_ideal){
							$left_style = "margin-left:".( intval(($ancho_ideal-$escala_x)/2) )."px;";
						}
						if( $escala_y > $alto_ideal){
							$top_style  = "margin-top :".( intval(($alto_ideal -$escala_y)/2) )."px;";
						}

						$centrado_style=' style="'.$left_style.$top_style.'" ';

					} elseif($centrado==3){

						if( $escala_x > $ancho_ideal){

							$escala_x = $ancho_ideal;
							$escala_y = ($ancho_real==0)?0:round($alto_real*($escala_x/$ancho_real));

						}
						if( $escala_y > $alto_ideal){
							$top_style  = "margin-top :".( intval(($alto_ideal -$escala_y)/2) )."px;";
						}

						$centrado_style=' style="'.$left_style.$top_style.'" ';

					} elseif($centrado==4){

						if( $escala_y > $alto_ideal){

							$escala_y = $alto_ideal;
							$escala_x = ($alto_real==0)?0:round($ancho_real*($escala_y/$alto_real));

						}

						if( $escala_x > $ancho_ideal){
							$left_style  = "margin-left :".( intval(($ancho_ideal -$escala_x)/2) )."px;";
						}


						$centrado_style=' style="'.$left_style.'" ';

					} elseif($centrado==5){

						if( ($alto_ideal/$ancho_ideal)<($escala_y/$escala_x) ){
							if( $escala_x > $ancho_ideal){

								$escala_x = $ancho_ideal;
								$escala_y = ($ancho_real==0)?0:round($alto_real*($escala_x/$ancho_real));

							}
							if( $escala_y > $alto_ideal){
								$top_style  = "margin-top :".( intval(($alto_ideal -$escala_y)/2) )."px;";
							}

							$centrado_style=' style="'.$left_style.$top_style.'" ';

						}else{

							if( $escala_y > $alto_ideal){

								$escala_y = $alto_ideal;
								$escala_x = ($alto_real==0)?0:round($ancho_real*($escala_y/$alto_real));

							}

							if( $escala_x > $ancho_ideal){
								$left_style  = "margin-left :".( intval(($ancho_ideal -$escala_x)/2) )."px;";
							}


							$centrado_style=' style="'.$left_style.'" ';

						}

					} else {

						if( $escala_x > $ancho_ideal){

							$escala_x = $ancho_ideal;
							$escala_y = ($ancho_real==0)?0:round($alto_real*($escala_x/$ancho_real));

						}
						if( $escala_y > $alto_ideal){

							$escala_y = $alto_ideal;                          // si es muy alta, escalar de acuerdo al alto
							$escala_x = ($alto_real==0)?0:round($ancho_real*($escala_y/$alto_real));

						}

						$centrado_style=(!$centrado)?"":' style="margin-top:'. (intval(($alto_ideal-$escala_y)/2) ) .'px;" ';

					}

					$atributo = ' src="'.$img.'" width="'.$escala_x.'" height="'.$escala_y.'" '. $centrado_style;

				}

			}

		}

	}

	$atributo = str_replace("http://","[http]",$atributo);
	$atributo = str_replace("//","/",$atributo);
	$atributo = str_replace("[http]","http://",$atributo);



	return $atributo;

}

function url_externa($link){

	if($link!=''){
		$link="http://".str_replace("http://","",$link);
	}
	return $link;

}

function limit_string($in,$limit){

	$in=strip_tags(str_replace("</"," </",$in));
	$num=strlen($in);
	if($num<=$limit){
		$out=$in;
	}else{
		$in2=substr($in,0,$limit-3);
		$in3=explode(" ",$in2);
		$in4=strlen($in3[sizeof($in3)-1]);
		$out=substr($in2,0,$limit-3-$in4-1)."...";
	}
	return $out;

}

function redir($url){

	if (!headers_sent()) {
		header("Location: ".$url); exit();
	} else {
		//die("<html><body onload=\"location.href='$url';\"></body></html>");
		die("<html><META HTTP-EQUIV='Refresh' CONTENT='0; URL=$url'><body></body></html>");
	}

}


function prin($array,$bg=NULL){

	if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' and 0){
		echo print_r($array);
	} else {
		echo "<div style='background-color: #333333 !important;
    border-radius: 3px 3px 3px 3px;
    color: #FFFFFF !important;
    float: left;
    font-size: 9px;
    margin-bottom: 1px;
    padding: 2px 5px;
    position: relative;
    text-align: left;
    z-index: 1;'><pre".( ($bg)?" style='background-color:".$bg." !important;color:#".oppColour($bg)." !important;'":"").">"; print_r($array); echo "</pre></div>";
	}

}

function paginacion_items($parametros,$items){

	global $_GET;

	$pagin=$_GET['pag'];
	//pagin
	//porpag,anterior,siguiente,enlace
	$porpag=$parametros['porpag'];
	$anterior=$parametros['anterior'];
	$siguiente=$parametros['siguiente'];
	$enlace=$parametros['enlace'];
	$separador=$parametros['separador'];
	$onclick=$parametros['onclick'];
	$procesar_url=($parametros['procesar_url'])?$parametros['procesar_url']:0;

	parse_str($enlace,$gets);
	$gets=array_keys($gets);
	$var_pag=$gets[sizeof($gets)-1];

	if($pagin==''){
		$pagin=1;
	}

	$total=sizeof($items);

	$finpag=$total;
	$inicio=$porpag*($pagin-1);
	$fin = $inicio + $porpag;

	//prin("$total , $pagin, $inicio, $fin");

	if($total>$porpag){
		$visi=array();
		foreach($items as $iii=>$item){
			if( $inicio<=$iii and $iii<$fin ){
				$visi[]=$item;
			}
		}

		$finpag=sizeof($visi);

		$prev_pag=$pagin-1;
		$next_pag=$pagin+1;

		if ($pagin==1) {
			$prev=$anterior;
		} else { $href_anterior=$enlace.$prev_pag; $prev=($anterior=='')?"":"<a " . enlace($enlace,$onclick,$prev_pag,$var_pag,$procesar_url) . " class='linkpag'>$anterior</a>";
		}
		if ($total==($finpag+$inicio)) {
			$next=$siguiente;
		} else { $href_siguiente=$enlace.$next_pag; $next=($siguiente=='')?"":"<a " . enlace($enlace,$onclick,$next_pag,$var_pag,$procesar_url) . " class='linkpag' >$siguiente</a>";
		}

	} else {

		$visi=$items;

	}
	$sun=(int)(($total-1)/$porpag)+1;
	for($i=1;$i<=$sun;$i++){
		if($i==$pagin){
			$raba[]="<span class='linkpagselec'>$i</span>";
		} else {
			$raba[]="<a class='linkpag' " . enlace($enlace,$onclick,$i,$var_pag,$procesar_url) . " >$i</a>";
		}
	}
	$rabas=(sizeof($raba)>1)?implode($separador,$raba):"";

	$cm = array(
			'filas'=>$visi,
			'total'=>$total,
			'anterior'=>$prev,
			'siguiente'=>$next,
			'href_anterior'=>$href_anterior,
			'href_siguiente'=>$href_siguiente,
			'desde'=>$inicio+1,
			'hasta'=>$finpag+$inicio,
			'tren'=>$rabas
	);

	return $cm;

}
function campos_email($CAMPOS,$POST,$ID=NULL,$LABELID=NULL){

	$body_mensaje="";

	if(!is_null($ID)){
		$body_mensaje.="<tr><td nowrap><b>".$LABELID."</b></td><td style='padding-left:10px;'>".$ID."</td></tr>";
	}


	foreach($CAMPOS as $CAMP){
		if($CAMP['enviar']!='0'){
			if(trim($CAMP['campo']['0'])!=''){
				if($CAMP['before']!=''){
					$body_mensaje.="<tr><td colspan=2 style='padding-top:6px;padding-bottom:2px;'><b style='color:#999;font-size:14px;text-transform:uppercase;'>".$CAMP['before'].":</b></td></tr>";
				}
				switch($CAMP['tipo']){
					case "input_fecha":
					case "fecha":
						$body_mensaje.="<tr><td nowrap><b>".$CAMP['label'].":</b></td><td style='padding-left:10px;'>".fecha_formato($POST[$CAMP['campo']['0']],2)."</td></tr>";
						break;
					case "input_combo": case "input_radio":
					case "combo": case "radio":
						$body_mensaje.="<tr><td nowrap><b>".$CAMP['label'].":</b></td><td style='padding-left:10px;'>".
								$CAMP['opciones'][$POST[$CAMP['campo']['0']]].
								"</td></tr>";
								break;
					case "text": case "hidden":
					case "input_text": case "input_hidden":
						$body_mensaje.="<tr><td nowrap><b>".$CAMP['label'].":</b></td><td style='padding-left:10px;'>".
								(($CAMP['value_email']['0'])?$CAMP['value_email']['0']:$POST[$CAMP['campo']['0']]).
								"</td></tr>";
								break;
					case "textarea":
					case "textarea_hidden":
					case "input_multi_simple": case "multi_simple":
						$body_mensaje.="<tr><td colspan=2><b>".$CAMP['label'].":</b></td></tr><tr><td colspan=2>".nl2br($POST[$CAMP['campo']['0']])."</td></tr>";
						break;
				}
			}
		}
	}
	return $body_mensaje;

}

function data_insert($Campos){

	foreach($Campos as $CAMP){
		if($CAMP['insert']!='0'){
			foreach($CAMP['campo'] as $CM){
				$data_insert[$CM]=$_POST[$CM];
			}
		}
	}
	return $data_insert;
}

function campos_insert($FORM,$POST,$adicionales,$debug=0){

	$Campos=$FORM['campos'];
	foreach($Campos as $CAMP){
		if($CAMP['insert']!='0'){
			foreach($CAMP['campo'] as $CM){
				$data_insert[$CM]=$POST[$CM];
			}
		}
	}
	$data_insert=array_merge($data_insert,$adicionales);
	$insertado=insert(
			$data_insert
			,$FORM['tabla']
			,$debug
	);
	return $insertado;

}

function enviar_email($parametros){

	//print_r($parametros);
	global $PARAMETROS_EMAIL,$SERVER,$PARAMETROS_EMAIL_MASTER;

	$parametros['disabled']=($parametros['disabled']!='')?$parametros['disabled']:$PARAMETROS_EMAIL_MASTER['disabled'];
	$parametros['debug']=($parametros['debug']!='')?$parametros['debug']:$PARAMETROS_EMAIL_MASTER['debug'];
	$parametros['url_web']=($parametros['url_web']!='')?$parametros['url_web']:$PARAMETROS_EMAIL['url_web'];

	$subject=($parametros['Subject']!='')?$parametros['Subject']:$PARAMETROS_EMAIL['Subject'];
	$logo=($parametros['Logo']!='')?$parametros['Logo']:$PARAMETROS_EMAIL['Logo'];

	if($parametros['url_web']==''){
		$body0='';
		$body0.=($logo)?'<div><img src="'.$logo.'" border=0 /></div>':'';
		$body0.=$parametros['body'];
	} else {
		$body0='';
		$body0.=($logo)?'<div><a href="'.$parametros['url_web'].'"><img src="'.$logo.'" border=0 /></a></div>':'';
		$body0.=$parametros['body'];
	}
	$body='<html><head><title>'.$subject.'</title></head><body style="font:13px Arial;">'.$body0.'</body></html>';


	$enviados=array();
	$mailenviado=array();

	$todosenviados=true;
	foreach($parametros['emails'] as $email){

		$mail= new PHPMailer(); // defaults to using php "mail()"

		if($SERVER['LOCAL']){

			$mail->PluginDir = "../../panel/lib/";
			$mail->Mailer = "smtp";
			$mail->Host = "mail.crazyosito.com"; # Editar el Host smtp
			$mail->SMTPAuth = true;
			$mail->Username = "notificaciones@crazyosito.com"; # editar el usuario
			$mail->Password = "platano"; # Editar el password

		}

		$mail->From       = ($parametros['From']!='')?$parametros['From']:$PARAMETROS_EMAIL['From'];
		$mail->FromName   = ($parametros['FromName']!='')?$parametros['FromName']:$PARAMETROS_EMAIL['FromName'];
		$mail->Subject    = $subject;
		$mail->AltBody    = ($parametros['AltBody']!='')?$parametros['AltBody']:$PARAMETROS_EMAIL['AltBody'];
		$mail->MsgHTML($body);
		$mail->CharSet	  = "utf-8";
		$mail->AddAddress($email);
		if($parametros['debug']){

			$mailenviado['debug'][]=array(
					'From'=>$mail->From
					,'FromName'=>$mail->FromName
					,'to'=>$email
					,'Subject'=>$mail->Subject
					,'body'=>$body0
			);

		}

		if($parametros['disabled']==1){
			$enviado=true;
		} else {
			$enviado=$mail->Send();
		}

		if(!$enviado){
			$todosenviados=false;
		}
		$mailenviado[$email]=($enviado)?true:$mail->ErrorInfo;

	}
	$mailenviado['todos']=$todosenviados;

	return $mailenviado;

}



function init_byte_map(){
	global $byte_map;
	for($x=128;$x<256;++$x){
		$byte_map[chr($x)]=utf8_encode(chr($x));
	}
	$cp1252_map=array(
			"\x80"=>"\xE2\x82\xAC",    // EURO SIGN
			"\x82" => "\xE2\x80\x9A",  // SINGLE LOW-9 QUOTATION MARK
			"\x83" => "\xC6\x92",      // LATIN SMALL LETTER F WITH HOOK
			"\x84" => "\xE2\x80\x9E",  // DOUBLE LOW-9 QUOTATION MARK
			"\x85" => "\xE2\x80\xA6",  // HORIZONTAL ELLIPSIS
			"\x86" => "\xE2\x80\xA0",  // DAGGER
			"\x87" => "\xE2\x80\xA1",  // DOUBLE DAGGER
			"\x88" => "\xCB\x86",      // MODIFIER LETTER CIRCUMFLEX ACCENT
			"\x89" => "\xE2\x80\xB0",  // PER MILLE SIGN
			"\x8A" => "\xC5\xA0",      // LATIN CAPITAL LETTER S WITH CARON
			"\x8B" => "\xE2\x80\xB9",  // SINGLE LEFT-POINTING ANGLE QUOTATION MARK
			"\x8C" => "\xC5\x92",      // LATIN CAPITAL LIGATURE OE
			"\x8E" => "\xC5\xBD",      // LATIN CAPITAL LETTER Z WITH CARON
			"\x91" => "\xE2\x80\x98",  // LEFT SINGLE QUOTATION MARK
			"\x92" => "\xE2\x80\x99",  // RIGHT SINGLE QUOTATION MARK
			"\x93" => "\xE2\x80\x9C",  // LEFT DOUBLE QUOTATION MARK
			"\x94" => "\xE2\x80\x9D",  // RIGHT DOUBLE QUOTATION MARK
			"\x95" => "\xE2\x80\xA2",  // BULLET
			"\x96" => "\xE2\x80\x93",  // EN DASH
			"\x97" => "\xE2\x80\x94",  // EM DASH
			"\x98" => "\xCB\x9C",      // SMALL TILDE
			"\x99" => "\xE2\x84\xA2",  // TRADE MARK SIGN
			"\x9A" => "\xC5\xA1",      // LATIN SMALL LETTER S WITH CARON
			"\x9B" => "\xE2\x80\xBA",  // SINGLE RIGHT-POINTING ANGLE QUOTATION MARK
			"\x9C" => "\xC5\x93",      // LATIN SMALL LIGATURE OE
			"\x9E" => "\xC5\xBE",      // LATIN SMALL LETTER Z WITH CARON
			"\x9F" => "\xC5\xB8"       // LATIN CAPITAL LETTER Y WITH DIAERESIS
	);
	foreach($cp1252_map as $k=>$v){
		$byte_map[$k]=$v;
	}
}

$byte_map=array();
init_byte_map();
$ascii_char='[\x00-\x7F]';
$cont_byte='[\x80-\xBF]';
$utf8_2='[\xC0-\xDF]'.$cont_byte;
$utf8_3='[\xE0-\xEF]'.$cont_byte.'{2}';
$utf8_4='[\xF0-\xF7]'.$cont_byte.'{3}';
$utf8_5='[\xF8-\xFB]'.$cont_byte.'{4}';
$nibble_good_chars = "@^($ascii_char+|$utf8_2|$utf8_3|$utf8_4|$utf8_5)(.*)$@s";


function fix_latin($instr){
	if(mb_check_encoding($instr,'UTF-8'))return $instr; // no need for the rest if it's all valid UTF-8 already
	global $nibble_good_chars,$byte_map;
	$outstr='';
	$char='';
	$rest='';
	while((strlen($instr))>0){
		if(1==preg_match($nibble_good_chars,$input,$match)){
			$char=$match[1];
			$rest=$match[2];
			$outstr.=$char;
		}elseif(1==preg_match('@^(.)(.*)$@s',$input,$match)){
			$char=$match[1];
			$rest=$match[2];
			$outstr.=$byte_map[$char];
		}
		$instr=$rest;
	}
	return $outstr;
}


function url_friendly($url){

	$urlA=array();
	$urlC=array();

	$url=str_replace("?","",$url);
	$url=str_replace("¿","",$url);

	$url=str_replace("@","a",$url);
	$url=str_replace("á","a",$url);
	$url=str_replace("é","e",$url);
	$url=str_replace("í","i",$url);
	$url=str_replace("ó","o",$url);
	$url=str_replace("ú","u",$url);
	$url=str_replace("ñ","n",$url);

	$url=str_replace("Á","A",$url);
	$url=str_replace("É","E",$url);
	$url=str_replace("Í","I",$url);
	$url=str_replace("Ó","O",$url);
	$url=str_replace("Ú","U",$url);
	$url=str_replace("Ñ","N",$url);

	/*

	$url=str_replace("$","",$url);
	$url=str_replace("%","",$url);
	$url=str_replace("(","",$url);
			$url=str_replace(")","",$url);
	//$url=str_replace("–","",$url);
	$url=str_replace("/","",$url);
	$url=str_replace(":","",$url);
	//$url=str_replace("-","",$url);
	$url=str_replace("\"","",$url);
	$url=str_replace("'","",$url);
	$url=str_replace("”","",$url);
	$url=str_replace("“","",$url);

	$url=str_replace("–","-",$url);

	$url=str_replace(".","",$url);
	$url=str_replace(",","",$url);
	$url=str_replace(";","",$url);
	*/

	$url=encodeUrlParam($url);

	$url=urlencode($url);

	$url=str_replace("+"," ",$url);
	$url=str_replace("~"," ",$url);
	$url=str_replace("-"," ",$url);

	$urlA=explode(" ",$url);
	foreach($urlA as $urlB){
		if(trim($urlB)!=''){
			$urlC[]=$urlB;
		}
	}
	$url=implode(" ",$urlC);

	$url=strtolower($url);

	$url=str_replace(" ","-",$url);

	$url=(strlen($url)<2)?"index.html":substr($url,0,100);

	return $url;

}

function encodeUrlParam ( $string )
{
	$string = trim($string);

	if ( ctype_digit($string) )
	{
		return $string;
	}
	else
	{
		// replace accented chars
		$accents = '/&([A-Za-z]{1,2})(grave|acute|circ|cedil|uml|lig);/';
		$string_encoded = htmlentities($string,ENT_NOQUOTES,'UTF-8');

		$string = preg_replace($accents,'$1',$string_encoded);

		// clean out the rest
		$replace = array('([\40])','([^a-zA-Z0-9-])','(-{2,})');
		$with = array('-','','-');
		$string = preg_replace($replace,$with,$string);
	}

	return strtolower($string);
}

function cleantext($txt){

	//	$txt = strip_tags($txt,"<ul>,<li>,<p>,<br>,<blockquote>,<strong>,<i>,<b>");
	//	$txt = strip_tags($txt,"<ul>,<li>,<p>,<br>,<strong>,<i>,<b>,<h2>,<h3>,<span>");
	//	$txt = strip_tags_attributes($txt,"<h2>,<h3>,<ul>,<li>,<ol>,<p>,<br>,<strong>,<i>,<b>","");
	$txt = str_replace("&nbsp;"," ",$txt);
	$txt = strip_tags_attributes($txt,"<h2>,<ul>,<li>,<ol>,<p>,<br>,<strong>,<i>,<b>,<table>,<tr>,<td>,<tbody>,<th>,<h3>,<h4>,<h5>,<h6>","");
	//	$txt = fix_latin($txt);
	$txt = str_replace(array("\n","\r","\s","\t","\0","\XC2","\XA0"),"",$txt);
	$txt = str_replace("<p>&nbsp;</p>","",$txt);
	$txt = str_replace("&nbsp;","",$txt);
	$txt = str_replace("<p> </p>","",$txt);
	$txt = str_replace("<P> </P>","",$txt);
	$txt = str_replace("<p></p>","",$txt);
	$txt = str_replace("<p>\XC2\XA0</p>","",$txt);
	//	$txt = str_replace("\X3C\X70\X3E\X20\X3C\X2F\X70\X3E","",$txt);
	//	$txt = strhex($txt);
	//	$txt = "<textarea style='height:200px;width:100%;'>".$txt."</textarea>";
	return $txt;

}

function strhex($string) {

	$hexstr = unpack('H*', $string);
	return array_shift($hexstr);

}

function strip_tags_attributes($string,$allowtags=NULL,$allowattributes=NULL){

	$string = strip_tags($string,$allowtags);
	if (!is_null($allowattributes)) {
		if(!is_array($allowattributes))
			$allowattributes = explode(",",$allowattributes);
		if(is_array($allowattributes))
			$allowattributes = implode(")(?<!",$allowattributes);
		if (strlen($allowattributes) > 0)
			$allowattributes = "(?<!".$allowattributes.")";
		$string = preg_replace_callback("/<[^>]*>/i",create_function(
				'$matches',
				'return preg_replace("/ [^ =]*'.$allowattributes.'=(\"[^\"]*\"|\'[^\']*\')/i", "", $matches[0]);'
		),$string);
	}
	return $string;

}

function url_encode_seo($url){
	$url=urlencode($url);
	$url=str_replace(".","~",$url);
	$url=str_replace("-","_",$url);
	$url=str_replace("+","-",$url);
	return $url;
}

function url_decode_seo($url){
	$url=str_replace("-","+",$url);
	$url=str_replace("_","-",$url);
	$url=str_replace("~",".",$url);
	$url=urldecode($url);
	return $url;
}

function oppColour($c, $inverse=false){

	if(strlen($c)== 3)
	{ // short-hand
		$c = $c{0}.$c{0}.$c{1}.$c{1}.$c{2}.$c{2};
	}
	if ($inverse)
	{ // => Inverse Colour
		$r = (strlen($r=dechex(255-hexdec($c{0}.$c{1})))<2)?'0'.$r:$r;
		$g = (strlen($g=dechex(255-hexdec($c{2}.$c{3})))<2)?'0'.$g:$g;
		$b = (strlen($b=dechex(255-hexdec($c{4}.$c{5})))<2)?'0'.$b:$b;
		return $r.$g.$b;
	}
	else
	{ // => Monotone based on darkness of original
		return array_sum(array_map('hexdec', str_split($c, 2))) > 255*1.5 ? '000000' : 'FFFFFF';
	}

}

function crear_email_debug($notificaciones,$file){

	global $PARAMETROS_EMAIL;
	global $PARAMETROS_EMAIL_MASTER;
	//	print_r($notificaciones);
	$html="";

	$num=0;
	if($PARAMETROS_EMAIL_MASTER['debug']){
		if(sizeof($notificaciones)>0){
			foreach($notificaciones as $notificacion=>$emails){

				$html.="<div class='titulo'>".$notificacion."</div>";

				unset($emails1);
				foreach($emails as $email){
					$num++;
					$emails1[]="<sup>$num</sup>".$email['to'];
				}
				$email=$emails[0];
				//$num++;
				$html.="<div class='ficha'>";
				$html.="<div class='line'><b>DE</b> <span>: ".$email['FromName']."&lt;".$email['From']."&gt;</span></div>";
				$html.="<div class='line'><b>PARA</b> <span>: ". ( implode(", ",$emails1) )."</span></div>";
				$html.="<div class='line'><b>ASUNTO</b> <span>: ".$email['Subject']."</span></div>";
				$html.="<div class='content'>".$email['body']."</div>";
				$html.="</div>";

			}
		}

		$html='
				<html><head>
				<title>Emails que se envian</title>
				<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
				<style>
				.titulo { color:#999; font-size:13px; font-weight:bold; float:left; padding:0px; clear:left; }
				.ficha { padding:4px 0 10px 0px; clear:left; margin-bottom:10px; float:left; }
				.ficha .line b { width:50px; float:left; clear:left; }
				.ficha .line span { width:auto; float:left; }
				.ficha .line span sup { color:red; }
				.ficha .content { background:#FFF; width:auto; float:left; heitht:auto; clear:left; padding:10px; margin:10px 0px;
				-moz-border-radius: 5px;
				-webkit-border-radius: 5px;
				-khtml-border-radius: 5px;
				border-radius:5px;
				-moz-box-shadow: 0 0 4px #000000;
				-webkit-box-shadow: 0 0 4px #000000;
				box-shadow: 0 0 4px #000000;
				border:1px solid #999;
	}
				</style>
				</head><body style="font-size:12px;font-family:calibri,helvetica,arial,sans-serif,tahoma,verdana;background-color:#F9F9F9;">'.$html.'</body></html>
						';
		//echo $file;
		$path=explode("/",$file);
		unset($path[sizeof($path)-1]);
		$debugdir=implode("/",$path);
		//echo $debugdir;

		@mkdir($debugdir);

		$f1=fopen($file,"w+");
		fwrite($f1,$html);
		fclose($f1);

	}

}

function quitar_repetidos($includes){

	$Inc=array();
	foreach($includes as $i=>$include){
		if($i=='script' or $i=='style'){
			$Inc[$i]=$include;
		} else {
			$Inn=array();
			foreach($include as $e=>$inn){
				if(!in_array($inn,$Inn)){
					$Inn[$e]=$inn;
				}
			}
			$Inc[$i]=$Inn;
			unset($Inn);
		}
	}
	return $Inc;

}

function removeemptytags($html_replace){

	$pattern = "/<[^\/>]*>([\s]?)*<\/[^>]*>/";
	return preg_replace($pattern, '', $html_replace);

}


function procesar_url($url,$debug=0){

	global $URLS; global $MASTERCOFIG;
	//	prin($URLS);

	if(substr($url,-5)=='.html'){
		return $url;
	}

	if($MASTERCOFIG['friendly_url']=='0'){

		return $url;

	}

	if(isset($URLS[$url])){

		$url=$URLS[$url];

	} else {

		$file="index.php?";
		$url2=str_replace($file,"",$url);

		parse_str($url2,$gets);
		$url='';

		/*	ANTIGUO*/
		if( $gets['modulo']=='home' ){
			if( $gets['tab']=='productos' ){
				if( isset($gets['buscar']) ){
					$url.='buscar/'.url_encode_seo($gets['buscar']);
				} elseif( $gets['id_grupo']!='' ){
					$url.='productos/'.url_encode_seo($gets['id_grupo']);
				} else {
					$url.='';
				}
				$slash=($url=='')?'':'/';
				$url.=( ($gets['pag'])?$slash.$gets['pag']:"" );
			}

		} elseif($gets['modulo']=='item'){
			if( $gets['tab']=='productos' ){
				$url="producto/".$gets['id'];
			}
		}

		/*ESPECIALES*/
		if($gets['modulo']=='formularios' and $gets['tab']=='login' and $gets['redir']!=''){
			$url.="index.php?modulo=formularios&tab=login&redir=".urlencode($gets['redir']);
		}
		/**/
		elseif( $gets['modulo']=='items' ){
			$url.=$gets['tab'];
			//			$url.=( ($gets['grupo'])?"/".$gets['grupo']."/". ( ($gets['friendly'])?url_friendly($gets['friendly']):"index.html" ):"" );
			if( $gets['acc']=='file' ){
				$url.=( ($gets['id'])?"/".$gets['id']."/". ( ($gets['friendly'])?url_friendly($gets['friendly']):"index.html" ):"" );

				$url.=( ($gets['pag'])?"/pag-".$gets['pag']:"" );
			} elseif( $gets['acc']=='list' ){
				$url.=( ($gets['gru'])?"-".$gets['gru']."/". ( ($gets['friendly'])?url_friendly($gets['friendly']):"categoria" ):"" );

				$url.=( ($gets['fil'])?"/".$gets['fil'].(($gets['val'])?"/".$gets['val']."/".( ($gets['friendly'])?url_friendly($gets['friendly']):"index.html" ):''):'');

				$url.=( ($gets['buscar'])?"/buscar=".$gets['buscar']:"" );

				$url.=( ($gets['pag'])?"/pag-".$gets['pag']:"" );
			}
		}
		elseif( $gets['modulo']=='app' and $gets['tab']=='pages' ){
			$url.=$gets['page'];
			//$url.=( ($gets['pag'])?"/pag-".$gets['pag']:"" );
		}
		elseif( $gets['modulo']=='app' ){
			$url.=$gets['tab'];
			//$url.=( ($gets['pag'])?"/pag-".$gets['pag']:"" );
		}
		elseif( $gets['modulo']=='formularios'){
			$url.=$gets['tab'];
		}

		if($debug==1){
			prin($gets); prin($url);
		}

	}
	$url=str_replace('&amp;','&',$url);
	return $url;

}



function paginacion($parametros,$campos,$tabla,$donde,$debug=0,$opciones=NULL,&$concat=NULL){
	//$return paginacionnumerada($parametros,$campos,$tabla,$donde,$debug,$opciones,&$concat);
	return paginacionnumerada($parametros,$campos,$tabla,$donde,$debug,$opciones,$concat);
}

function matriz($campos,$tabla,$donde,$debug=0,$opciones=NULL){
	return select($campos,$tabla,$donde,$debug,$opciones);
}

function fila($campos,$tabla,$donde,$debug=0,$opciones=NULL){
	return select_fila($campos,$tabla,$donde,$debug,$opciones);
}

function dato($campos,$tabla,$donde,$debug=0,$opciones=NULL){
	return select_dato($campos,$tabla,$donde,$debug,$opciones);
}


function url($url,$debug=0){
	return procesar_url($url,$debug);
}

function showRenderData($OO,$LL){

	foreach($OO['campos'] as $cam=>$obj){

		$ite=$LL[$cam];
		switch($obj['tipo']){
			case "fch":	case "fcr":
				$LL[$cam]=fecha_formato($ite,'8');
				//$LL[$cam]=$ite;
				break;
			case "html":
				$LL[$cam]=stripslashes($ite);
				break;
			case "hid":
				if($obj['constante']=='1'){
					list($primO,$tablaO)=explode("|",$obj['opciones']);
					list($idO,$camposO)=explode(",",$primO);
					$camposOA=array();
					$camposOA=explode(";",$camposO);
					$bufy='';
					foreach($camposOA as $COA){
						$bufy.= select_dato($COA,$tablaO,"where ".$idO."='".$ite."'")." ";
					}
					$LL[$cam]=$bufy;
				} else {
					$LL[$cam]=$ite;
					//if($obj['directlink']!=''){
					$s1=explode("|",$obj['opciones']);
					$s2=explode(",",$s1['0']);
					$IdD=$s2['0'];
					$s3=explode(";",$s2['1']);
					$Fila=fila(array("CONCAT_WS(' ',".implode(",",$s3).") as v"),$s1['1'],"where $IdD='".$ite."'",0);
					$LL[$cam]=$Fila['v'];
					//}
				}
				break;
			default:
				$LL[$cam]=$ite;
				break;
		}

	}
	return $LL;
}

function make_array($input_array,$camps=array('id','nombre')){
	$return_array=array();
	foreach($input_array as $each)
		$return_array[$each[$camps['0']]]=$each[$camps['1']];

	return $return_array;
}
