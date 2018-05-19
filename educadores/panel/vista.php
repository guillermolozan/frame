<?php


include("objeto.php");
include("setup.php");
//prin(sizeof($objeto_tabla[$this_me]['campos']));

if( in_array($_GET['verdesarrollo'],array('1','0')) ){
	$_SESSION['verdesarrollo']=$_GET['verdesarrollo'];
	redireccionar_a($_SERVER['HTTP_REFERER']);
}


if(1){


// $_GET['conf']=(is_null($_GET['conf']))?$_GET['conf2']:$_GET['conf'];
if($_GET['conf2']){
// var_dump($datos_tabla);
$_GET['conf']=$_GET['conf2'];
$confes=explode("&",$_GET['conf']);
// var_dump($confes);
foreach($confes as $confe){
	list($uno,$dos)=explode("=",$confe);
	if(enhay($uno,"|")){
		// var_dump($uno);
		list($tres,$cuatro)=explode("|",$uno);
		$objeto_tabla[$_REQUEST['OB']]['campos'][$tres][$cuatro]=$dos;
	} else {
		$objeto_tabla[$_REQUEST['OB']][$uno]=$dos;
	}
}
if(isset($_GET['conf2'])) unset($_GET['conf2']);
$datos_tabla = procesar_objeto_tabla($objeto_tabla[$_REQUEST['OB']]);
// $datos_tabla;
// var_dump($datos_tabla);
}



if(isset($datos_tabla['por_linea']) and $datos_tabla['por_linea']>3){ $datos_tabla['set_fila_fijo']='1';  }
if($datos_tabla['set_fila_fijo']){	$_COOKIE[$tb.'_colap']=$datos_tabla['set_fila_fijo']; $ocultar_opciones_filas=1;	}
$_COOKIE[$tb.'_colap']=(isset($_COOKIE[$tb.'_colap']))?$_COOKIE[$tb.'_colap']:(($datos_tabla['por_linea']>1)?1:(($tblistadosize>6)?4:1));
$ocultaresquina=($tblistadosize<8)?1:0;

?><!-- INICIO AJAX --><?php

if(!isset($_GET['ran']) or $_GET['ran']==''){


	?><style><?php
	 if($datos_tabla['crear_label']!='x'){ ?> .formulario label { width:<?php echo $datos_tabla['crear_label']?>; }<?php }
	 if($datos_tabla['crear_txt']!=''){ ?>.formulario .form_input, .formulario .in_span span  { width:<?php echo $datos_tabla['crear_txt']?>; }<?php }
	 if($datos_tabla['altura_listado']!=''){ ?>.bl .bd { height:<?php echo $datos_tabla['altura_listado']?>; }.bl .bd { height:auto; }<?php }
	 $porr_linea=($datos_tabla['por_linea']=='')?'100':((ceil(100/$datos_tabla['por_linea']))-1);
	 ?>.bl { float:left; clear:none; width:<?php echo $porr_linea;?>%;   }<?php
	?></style><script>/**/</script><?php

	echo '<input type="hidden" id="resaltar"  />';

    if($_GET['block']!='form'){
	echo '<div class="div_bloque_cuerpo" '. ( ($datos_tabla['width_listado'])?"style=\"width:".$datos_tabla['width_listado'].";\"":"" ) .' >';
	echo '<div class="refreshing2" id="cargando_form" style="display:none;">cargando</div>';
	//echo "<div>ocho</div>";
	//echo show_parent($_GET,$objeto_tabla,$datos_tabla['me']);

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		formulario inicio 		//////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////

		if($Open){ $datos_tabla['crear']='1'; }
		//prin($SERVER);
		echo '<div class="bloque_titulo">';

			$saved[$datos_tabla['me']]['crearopen']=($saved[$datos_tabla['me']]['crearopen']=='')?0:$saved[$datos_tabla['me']]['crearopen'];


			if($datos_tabla['repos']!=''){

			?><span id="abri_cerrar_repos"><?php
            ?><a href="custom/<?php echo $SERVER['ARCHIVO'];?>#repos" id="abrir_repos" <?php
            ?>onclick="abrir_repos('1','0');" <?php
            ?>class="btn btn-small" <?php
            ?>style=" <?php echo ($saved[$datos_tabla['me']]['repos']=='1')?"display:none;":""?>" <?php
            ?>><i class="itl ico_reportes"></i>reportes</a><?php

            ?><a href="custom/<?php echo $SERVER['ARCHIVO'];?>#repos" id="cerrar_repos" <?php
            ?>onclick="abrir_repos('0','0');" <?php
            ?>class="btn btn-small btn-inverse" <?php
            ?>style=" <?php echo ($saved[$datos_tabla['me']]['repos']=='1')?"":"display:none;"?>" <?php
            ?>>cerrar reportes</a> <?php
			?></span><?php
            }


			if($datos_tabla['mass_actions']!=''){

			?><span id="abri_cerrar_mass"><?php
            ?><a href="custom/<?php echo $SERVER['ARCHIVO'];?>#mass" id="abrir_mass" <?php
            ?>onclick="abrir_mass('1','0');" <?php
            ?>class="btn btn-small" <?php
            ?>style=" <?php echo ($saved[$datos_tabla['me']]['mass']=='1')?"display:none;":""?>" <?php
            ?>>Acciones</a><?php

            ?><a href="custom/<?php echo $SERVER['ARCHIVO'];?>#mass" id="cerrar_mass" <?php
            ?>onclick="abrir_mass('0','0');" <?php
            ?>class="btn btn-small btn-inverse" <?php
            ?>style=" <?php echo ($saved[$datos_tabla['me']]['mass']=='1')?"":"display:none;"?>" <?php
            ?>>cerrar acciones</a> <?php
			?></span><?php
            }

			if($datos_tabla['stat']=='1'){

			?><span id="abri_cerrar_stat"><?php
            ?><a href="custom/<?php echo $SERVER['ARCHIVO'];?>#stat" id="abrir_stat" <?php
            ?>onclick="abrir_stat('1','0');" <?php
            ?>class="btn btn-small" <?php
            ?>style=" <?php echo ($saved[$datos_tabla['me']]['stat']=='1')?"display:none;":""?>" <?php
            ?>>gráficos</a><?php

            ?><a href="custom/<?php echo $SERVER['ARCHIVO'];?>#stat" id="cerrar_stat" <?php
            ?>onclick="abrir_stat('0','0');" <?php
            ?>class="btn btn-small btn-inverse" <?php
            ?>style=" <?php echo ($saved[$datos_tabla['me']]['stat']=='1')?"":"display:none;"?>" <?php
            ?>>cerrar gráficos</a> <?php
			?></span><?php
            }

			if(!($datos_tabla['crear']=='0' or $tblistadosize=='0' )){
			//prin($SERVER);
            ?><span id="abri_cerrar_crear"><?php
            ?><a href="custom/<?php echo $SERVER['URL'];?>#create" id="abrir_crear" <?php
            ?>onclick="abrir_crear('1','0');" <?php
            ?>class="btn btn-small btn-primary" <?php
            ?>style=" <?php echo ($saved[$datos_tabla['me']]['crearopen']=='1')?"display:none;":""?>" <?php
            ?>><i class="itr ico_crea"></i>crear <?php echo $datos_tabla['nombre_singular']?></a><?php

            ?><a href="custom/<?php echo $SERVER['URL'];?>#list" id="cerrar_crear" <?php
            ?>onclick="abrir_crear('0','0');" <?php
            ?>class="btn btn-small btn-inverse" <?php
            ?>style=" <?php echo ($saved[$datos_tabla['me']]['crearopen']=='1')?"":"display:none;"?>" <?php
            ?>>cancelar crear</a> <?php
			?></span><?php
			}

			if($Open and ($datos_tabla['crear_pruebas']!='0' and $EdicionPanel) ){

            ?><a onclick="ax('insertar_prueba_rapida',''); return false;" <?php
            ?>class="linkstitu" <?php
            ?>id="insertar_prueba" <?php
            ?>style=" background-color:<?php echo $BGCOLOR_DESARROLLO;?>; color:#000; display:none;" <?php
            ?>>Crear <?php echo $datos_tabla['nombre_singular']?> de prueba</a><?php
            ?><script>window.addEvent('domready',function(){	$1("insertar_prueba");	});</script><?php

            }

            if(trim($datos_tabla['controles'])!=''){ echo procesar_controles_html($datos_tabla['controles']); }

			/*

			*/

			if($datos_tabla['exportar_gm']=='1'){

			?><a href="#" onclick="javascript:exportar_gm();return false;" <?php
			?>class="btn btn-small" <?php
			?>title="Descargar Base para Group Mail"><i class="itl ico_gm"></i>
			Exportar Group Mail</a><script>function exportar_gm(){ var url='exportar_gm.php?me=<?php echo $datos_tabla['me'];?>'+(($('ffilter')?'&filter='+$('ffilter').value:'')); location.href=url; }</script> <?php
			}

			if($datos_tabla['exportar_excel']=='1'){

			?><a href="#" id="boton_imprimir" onclick="javascript:window.print();return false;" <?php
			?>class="btn btn-small" <?php
			?>title="Imprimir"><i class="itl ico_Print"></i>Imprimir</a><?php

			?><a href="#" id="boton_excel" onclick="javascript:exportar_excel();return false;" <?php
			?>class="btn btn-small" <?php
			?>title="Descargar Excel"><i class="itl ico_Excel"></i>Exportar Excel</a><script>function exportar_excel(){ var url='exportar_excel.php?conf=<?php echo urlencode($_GET['conf']); ?>&me=<?php echo $datos_tabla['me'];?>'+(($('ffilter')?'&filter='+$('ffilter').value:'')); location.href=url; }</script> <?php
			}

			if($datos_tabla['importar_csv']=='1'){
			echo '<a href="#" rel="nofollow" onclick="javascrip:procesar_recargar(\'importar_csv.php?conf='.$_GET['conf'].'&me='.$datos_tabla['me']."&".$SERVER['PARAMS'].'\');return false;" class="btn btn-small" title="Importar CSV"><i class="itl ico_Excel"></i>Importar CSV</a>';
			}

			?><a id="msino"></a><script>window.addEvent('domready',function(){ $("msino").addEvent('click',function(){ 
					$('contenido_principal').toggleClass('menu_colapsed'); 
					val = ( $('contenido_principal').hasClass('menu_colapsed') )?1:0;
					Cookie.write('men', val, {duration: 10});
					new Request({url:"ajax_change_cookie.php?var=men&val="+val+"&ajax=1", method:'get', onSuccess:function(ee) {
					 } } ).send();
				}); });</script><?php

            ?><span class='titulo' name="titulo" ><?php echo $tbtitulo?></span><?php



    ?></div><?php

	} else {


	$_COOKIE[$tb.'_colap']=0;

	?><style>
	#linea_buscador { display:none; }
	#segunda_barra_2 { float:left; width:38%; clear:none; #margin-top:10px; margin-top:0px; }
	.bl { width:99%;#width:95%; }
	.inner_listado { overflow:auto; min-height:135px;position:relative; background-color:#F7F7F7; float:left; width:48%; }
	.formulario label { padding-left:0px; }
	.nohay { text-align:center; font-family:Arial; padding:10px 0px; width:100%; color:#666666; font-size:16px;  }
	.segunda_barra {
	background-color:#FFF; color:#000; border:0; margin-top:10px;
	}
	body { background:#FFF; }
	h1.titulo_formulario { display:none; }
	.contenido_principal { border:0; padding-right:0px; }
	#segunda_barra_3 { display:none;}
	.form_boton_1 {
background-color:#FF0000;
background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    color-stop(0, #FF0000),
    color-stop(1, #000000)
);
background-image: -moz-linear-gradient(
    center top,
    #FF0000 0%,
    #000000 100%
);
	color:#FFF; padding-top:2px; padding-bottom:2px; border:0; position:relative; }
	.formulario { #padding-left:10px; }
	#contenido_principal {
    border-radius: 0;
    box-shadow:	none;
	}
	.bloque_content_crear { /*background-color:#FFF;*/ }

	<?php
	//$display_barra='display:none;';
	if($_GET['tipo']=='listado'){ $_COOKIE[$tb.'_colap']=4; ?>
    #div_allcontent { width:98%; }
	<?php } else { 	$_COOKIE[$tb.'_colap']=0; ?>
    #div_allcontent { width:680px; min-width:0%; }
	.bloque_content_crear { width:50%; float:left; }
	.formulario label { width:99%; }
	.formulario .form_input { width:99%; }
	<?php } ?>

    </style><?php

    	}

		?><div id="bloque_content_crear" class="bloque_content_crear"><?php
		if( ($Proceso=='login') or ($_GET['block']=='form') or ($datos_tabla['crear_quick']=='1') ){ include("formulario.php");
		?><script>window.addEvent('load',function(){ pre_crear(); });</script><?php
		} ?></div><?php

		?><div id="bloque_content_stat" class="bloque_content_stat"></div><?php
		?><div id="bloque_content_mass" class="bloque_content_mass"></div><?php
		?><div id="bloque_content_repos" class="bloque_content_repos"></div><?php

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	//		formulario fin 		//////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////

    echo '<div class="segunda_barra" id="segunda_barra_2">';

	if($tblistadosize!='0'){

    ?><b style="float:left; text-align:left;" id="inner_span_num" ></b><?php
    ?><b id="inner_span_tren" class="inner_span_tren" ></b><?php

    	}

    echo '</div>';


    echo '<div class="inner_listado"  id="inner" style=" width:100%; ';
	if($_GET['block']=='form' and $_GET['tipo']!='listado'){ echo 'width:50%; float:left;'; }
	echo '" >';


		///// ZONA AJAX INICIO  ////

		//////////////////////////////////////////////////////////////////////////////////////////////////////////
		//		listado inicio	//////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////

		}


		if(1){
			//prin(sizeof($objeto_tabla[$this_me]['campos']));
			foreach($objeto_tabla[$this_me]['campos'] as $df){
				if($df['queries']=='1'){
					$queries[]=$df;
				}
			}
			parse_str($_GET['filter'],$FiL);


			//prin($FiL);
			$html_filter_fecha='';
			$html_filter='';
			foreach($queries as $querie){
				if($querie['disabled']=='1'){ continue; }
				list($unon,$doos)=explode("|",$querie['opciones']);
				//prin($doos."=".$tabla_sesion_datos);
				if($doos!='' and $doos==$tabla_sesion_datos){ continue; }

				if(in_array($querie['tipo'],array('inp')) ){

					$html_filter.="<span class='filfchspan'>".$querie['label']."</span><input style='float:left;' type='text' id='filtr_".$querie['campo']."_dl' ".(($FiL[$querie['campo']]!='')?"class='inuse'":"")." value='".str_replace($querie['campo']."%3D","",urlencode($FiL[$querie['campo']]))."' onchange=\"render_filder();\" >";
					$html_filter.="<input type='hidden' id='filtr_".$querie['campo']."' value='".urlencode($FiL[$querie['campo']])."' >";
					$html_filter.="<input type='hidden' id='filtr_".$querie['campo']."' value=\"load_directlink_filtro_inp('".$querie['campo']."','".$objeto_tabla[$this_me]['tabla']."');\" class='jsloads' >";
					//$html_filter.="<script>load_directlink_filtro_inp('".$querie['campo']."','".$objeto_tabla[$this_me]['tabla']."');</script>";
					$terfil[]=$querie['campo'];

				} elseif(in_array($querie['tipo'],array('hid','user')) and ($querie['opciones'])){

					if($querie['select_multiple']=='1'){

						list($uno,$slex)=explode("=",$FiL[$querie['campo']]);
						$selex=explode(",",$slex);


						list($primO,$tablaO,$whereO)=explode("|",$querie['opciones']);
						$whereO=str_replace("where 0","where 1",$whereO);
						//echo "$primO,$tablaO,$whereO";
						list($idO,$camposO)=explode(",",$primO);

						$oopciones=select(array($idO,"CONCAT_WS(' ',". str_replace(";",",",$camposO) .") as value"),$tablaO,(($whereO)?$whereO:"where 1 ").get_extra_filtro_0($tablaO));
						$html_filter.="<ul class=qsm>";
						$html_filter.="<input type='hidden' value='".urlencode($FiL[$querie['campo']])."' id='filtr_".$querie['campo']."'>";
						//$html_filter.="<li ".(($FiL[$querie['campo']]!='')?"class='qsml inuse'":"qsml")." id='filtr_".$querie['campo']."' onchange=\"render_filder();\">";
						$html_filter.="<li class='qsml ".(($FiL[$querie['campo']]!='')?"inuse":"")."' >".$querie['label']."</li>";
						//$html_filter.="<label value='' class='empty'>".$querie['label']."</label>";
						$html_filter.="<div class='con'>";
						foreach($oopciones as $pppooo){
						$quer=urlencode($querie['campo']."=".$pppooo[$idO]);
						$html_filter.="<li class='qsml ".((in_array($pppooo[$idO],$selex))?"smcheck":"")."'>";
						$html_filter.="<input class='filtr_".$querie['campo']."' value=\"".$pppooo[$idO]."\" type='checkbox' id='filtr_".$querie['campo']."__".$pppooo[$idO]."' onchange=\"rf('".$querie['campo']."');\" ".((in_array($pppooo[$idO],$selex))?"checked":"").">";
						$html_filter.="<label for='filtr_".$querie['campo']."__".$pppooo[$idO]."' ".(($quer==urlencode($FiL[$querie['campo']]))?'selected':'')." >".$pppooo['value']."</label>";
						$html_filter.="</li>";
						}
						$html_filter.="</div>";
						$html_filter.="</ul>";
						//$html_filter.="</select>";
						$terfil[]=$querie['campo'];

					} elseif($querie['dlquery']=='1'){

						list($primO,$tablaO,$whereO)=explode("|",$querie['opciones']);
						$whereO=str_replace("where 0","where 1",$whereO);
						list($prim0id,$prim0nombre)=explode(",",$primO);

						$html_filter.="<span class='filfchspan'>".$querie['label']."</span>";
						$html_filter.="<input style='float:left;' type='text' id='filtr_".$querie['campo']."_dl' ".(($FiL[$querie['campo']]!='')?"class='inuse'":"")." value='";
						$fila=fila(array("CONCAT_WS(' ',". str_replace(";",",",$prim0nombre) .") as v"),$tablaO,"where id='".str_replace($querie['campo']."%3D","",urlencode($FiL[$querie['campo']]))."'",0);
						$html_filter.=$fila['v'];
						$html_filter.="' onchange=\"render_filder();\" >";-

						$html_filter.="<input type='hidden' id='filtr_".$querie['campo']."' value='".urlencode($FiL[$querie['campo']])."' >";
						$html_filter.="<input type='hidden' id='filtr_".$querie['campo']."' value=\"load_directlink_filtro_com('".$querie['campo']."','".$prim0id."','".$prim0nombre."','".$tablaO."','".$whereO."');\" class='jsloads' >";
						//$html_filter.="<script>load_directlink_filtro_inp('".$querie['campo']."','".$objeto_tabla[$this_me]['tabla']."');</script>";
						$terfil[]=$querie['campo'];

					} else {

						list($primO,$tablaO,$whereO)=explode("|",$querie['opciones']);
						$whereO=str_replace("where 0","where 1",$whereO);
						//echo "$primO,$tablaO,$whereO";
						list($idO,$camposO)=explode(",",$primO);

						$oopciones=select(array($idO,"CONCAT_WS(' ',". str_replace(";",",",$camposO) .") as value"),$tablaO,(($whereO)?$whereO:"where 1 ").get_extra_filtro_0($tablaO));
						$html_filter.="<select ".(($FiL[$querie['campo']]!='')?"class='inuse'":"")." id='filtr_".$querie['campo']."' onchange=\"render_filder();\">";
						$html_filter.="<option value='' class='empty'>".$querie['label']."</option>";
						foreach($oopciones as $pppooo){
						$quer=urlencode($querie['campo']."=".$pppooo[$idO]);
						$html_filter.="<option ".(($quer==urlencode($FiL[$querie['campo']]))?'selected':'')." value=\"".$quer."\">".$pppooo['value']."</option>";
						}
						$html_filter.="</select>";
						$terfil[]=$querie['campo'];

					}

				} elseif(in_array($querie['tipo'],array('com')) and ($querie['opciones'] or $querie['rango'])){

					if($querie['rango']!=''){
						list($uuno,$ddos)=explode(",",$querie['rango']);
						$FromYear = date("Y",strtotime($uuno));
						$ToYear = date("Y",strtotime($ddos));
						for($i=$FromYear;$i<$ToYear;$i++){
							$querie['opciones'][$i]=$i;
						}
					}
					$oopciones=$querie['opciones'];
					$html_filter.="<select ".(($FiL[$querie['campo']]!='')?"class='inuse'":"")." id='filtr_".$querie['campo']."' onchange=\"render_filder();\">";
					$html_filter.="<option value='' class='empty'>".$querie['label']."</option>";
					foreach($oopciones as $ipppooo=>$pppooo){
					$quer=urlencode($querie['campo']."=".$ipppooo);
					$html_filter.="<option ".(($quer==urlencode($FiL[$querie['campo']]))?'selected':'')." value=\"".$quer."\">".$pppooo."</option>";
					}
					$html_filter.="</select>";
					$terfil[]=$querie['campo'];

				} elseif(in_array($querie['tipo'],array('fch','fcr'))){

					$first=dato('min('.$querie['campo'].')',$tbl,"where ".$querie['campo']."!=0",0);
					$first=(!$first)?date("Y-m-d"):$first;
					//$last =dato($querie['campo'],$tbl,"where 1 order by ".$querie['campo']." desc limit 0,1");
					$last=dato('max('.$querie['campo'].')',$tbl,"where ".$querie['campo']."!=0",0);
					$last=(!$last)?date("Y-m-d"):$last;
					//prin($first);
					//prin($last);

					$FromYear = substr($first,0,4);
					$FromMonth = substr($first,5,2);

					$ToYear2 = substr($last,0,4);
					//$ToYear = substr($last,0,4);
					$ToYear = date("Y");

					$ToYear= ($ToYear<$ToYear2)?$ToYear2:$ToYear;


					$fftt=explode("|",$FiL[$querie['campo']]);
					$fftt=$fftt['1']."|".$fftt['2'];

					//prin($fftt);
					$html_filter_fecha.="<div style='clear:left;'>";

					$html_filter_fecha.="<select ".(($FiL[$querie['campo']]!='')?"class='inuse'":"")."  onchange=\"between('".$querie['campo']."',this.value);";
					$html_filter_fecha.="fechaChangeFilter('".$querie['campo']."');";
					$html_filter_fecha.="\">";

					$opciones_fechas=opciones_fechas($querie);

					foreach($opciones_fechas as $of){
					$html_filter_fecha.="<option value='".$of['value']."' ".(($of['value']==$fftt)?'selected':'')." ".(($of['class']!='')?"class='".$of['class']."'":'').">".$of['label']."</option>";
					}

					$html_filter_fecha.="</select>";


			$html_filter_fecha.=input_date_filtro($querie['campo'],$FromYear,$ToYear,
			($FiL[$querie['campo']])?$FiL[$querie['campo']]:"fecha_consulta|".substr($first,0,10)."|".substr($last,0,10)
			);

					$html_filter_fecha.="</div>";
					$terfil[]=$querie['campo'];

				}
			}
			?>
			<script>
			function rf(filter){
				var j=0;
				var eles = new Array();
				$$('.filtr_'+filter).each(function(ele) {
					if(ele.checked){
						eles[j]=ele.value;
						j++;
					}
				});
				$('filtr_'+filter).value=(j==0)?'':encodeURIComponent(filter+'='+eles.join(','));
				render_filder();
			}
			function render_filder(){
			var url='';
			<?php foreach($terfil as $tert){
			//echo "if($('filtr_".$tert."').value!=''){ url+=' and '+$('filtr_".$tert."').value; }\n";
			echo "if($('filtr_".$tert."').value!=''){ url+=encodeURIComponent('".$tert."='+$('filtr_".$tert."').value+'&'); }\n";
			//echo "if($('filtr_".$tert."').value!=''){ url+='".$tert."='+$('filtr_".$tert."').value+'&'; }\n";
			} ?>
			$('ffilter').value=url;
			//alert(0);
			url=url+'&conf=<?php echo $_GET['conf']?>';
			ax("pagina_filter",url,1);
			//location.href="custom/<?php echo $datos_tabla['archivo']; ?>.php?filter="+url;
			}
			</script>
			<?php
		}
		if($Open==1 and 0){
		$filtros1=array(); $filtros2=array(); $filtros3=array();
		$filtros1=explode(";",$datos_tabla['filtros']);
		$filtros2=explode(";",$datos_tabla['filtros_extra']);
		$filtros3=array_merge($filtros1,$filtros2);
		$datos_tabla['filtros']=implode(";",$filtros3);
		$datos_tabla['filtros']=($datos_tabla['filtros']==',')?$datos_tabla['filtros']:'';
		}
		if($datos_tabla['filtros']!=''){
			$fils=explode(";",$datos_tabla['filtros']);
            foreach($fils as $fil){
                list($label,$filt,$ordf,$txtx)=explode("|",trim($fil));
				$Filtross[$label]=array($filt,$ordf,$txtx);
            }

			if($Filtross[$datos_tabla['filtro_default']][0]!='' and $_GET['filtro']==''){	$_GET['filtro']=$datos_tabla['filtro_default']; }
			if($Filtross[$datos_tabla['filtro_default']][0]!='' ){ $no_mostrar_todos=1;	}

            $htmlfil = '<div class="blo_filtros">';
			if(!$no_mostrar_todos){
            $htmlfil.= "<a $selesele href='".$DIR_CUSTOM.$datos_tabla['archivo'].".php'>".$datos_tabla['nombre_plural']."</a><b>:</b>";
			}
            foreach($fils as $fil){
                list($label,$filt,$ordf,$txtx)=explode("|",trim($fil));
				$Filtross[$label]=array($filt,$ordf,$txtx);
				$selesele='';
				if($label==$_GET['filtro']){
					$FilTro=$filt;
					$FilTro_l=$label;
					$FilTro_o=$ordf;
					$selesele='class="selected"';
					if($txtx!=''){
					$BarFiltro=$txtx;
					}
				}
				if(!in_array(trim($label),array("","\n","\r","\t"))){
                	$htmlfil.= "<a $selesele href='".$DIR_CUSTOM.$datos_tabla['archivo'].".php?filtro=".$label."'>".$label."</a>";
				}
            }
            $htmlfil.= '</div>';
        }

		//if($BarFiltro!=''){
		//}

		if($BarFiltro!=''){
			echo "<div class='barfiltro'>$BarFiltro</div>";
		}

		echo "<div style='font-size:0px;line-height:0px;'>&nbsp;</div>";
	    if($tblistadosize!='0'){
		if($_GET['i']!=''){

			//$busqueda_query = " ".$_GET['filter']." ";
			$busqueda_query = " and id = '".$_GET['i']."' ";
			$linkPagina = "pagina_file";
			$linkRecPagina = "recargar_file";
			$vvvalos = $_GET['i'];
			$_COOKIE[$tb.'_colap']='2';

		}elseif($_GET['filter']!=''){

			//$busqueda_query = " ".$_GET['filter']." ";
			$busqueda_query = " and ( ".query_filter($_GET['filter'])." ) ";
			$linkPagina = "pagina_filter";
			$linkRecPagina = "recargar_filter";
			$vvvalos = $_GET['filter'];

		}elseif($FilTro!=''){

			$busqueda_query = " and ( ".$FilTro." ) ";
			$linkPagina = "pagina_filtro";
			$linkRecPagina = "recargar_filtro";
			$vvvalos = $FilTro_l;

		} elseif($_GET['buscar']!=''){


			$busqueda_query = search_query($datos_tabla['fulltext'],$datos_tabla['like'],$datos_tabla['id'],$_GET['buscar']);
			$linkPagina = "pagina_buscar";
			$linkRecPagina = "recargar_buscar";
			$vvvalos = $_GET['buscar'];

		} else {

			$busqueda_query = "";
			$linkPagina = "pagina";
			$linkRecPagina = "recargar";
			$vvvalos = "";

		}

//		prin($datos_tabla);
		//update_tags($objeto_tabla[$this_me],162);
		/*
		$tbcampos	=	$datos_tabla['form'];
		$tblistado	=	$datos_tabla['list'];
		$tbquery	=   $datos_tabla['query'];
		*/
		if($_GET['i']!=''){

		//$tblistado	=	$datos_tabla['list'] = $datos_tabla['form'];
		$tblistado	=	$datos_tabla['list']=$MEEE['campos'];

		//$array=$MEEE;
		if(is_array($datos_tabla['list']))
		foreach($datos_tabla['list'] as $tyt=>$camp){
			if($camp['disabled']=='1'){ continue; }
			if($camp['campo']!=$array['group'] and $camp['autotags']!='1'){
				//$objeto_tabla[$ME]['campos'][$camp['campo']]['listable']='1';
				$tblistado[$tyt]['listable']='1';
				$datos_tabla['list'][$tyt]['listable']='1';
				$query[]=$camp['campo'];
			}

		}

		$tbquery= $datos_tabla['query']= implode(",",$query);

		}
		/*
		prin(sizeof($tbcampos));
		prin(sizeof($tblistado));
		prin(sizeof($query));
		*/
		//prin($SERVER);
		//prin($vars['GENERAL']['mostrar_toolbars']);
		$pagina_items=paginacion(
								array(
									'separador'=>''
									,'porpag'=>($LOCAL and $vars['GENERAL']['mostrar_toolbars'])?20:$datos_tabla['por_pagina']
									,'anterior'=>'&laquo;'
									,'siguiente'=>'&raquo;'
									,'enlace'=>"#"
									,'onclick'=>"ax(\"". $linkPagina ."\",\"". urlencode($vvvalos) ."\",PAG);return false;"
									/*,'onclick':'go_page'*/
									,'tren_limite'=>'10'
									,'tipo'=>'bootstrap'
								),
								$tbquery,
								$tbl,
								"where 1 $EXTRA_FILTRO $busqueda_query ".$datos_tabla['where_id']."
								order by "
								. ( ($FilTro_o=='')?'':$FilTro_o."," )
								. ( ($datos_tabla['group'])?' '.$datos_tabla['group'].' desc, ':'' )
								. ( ($datos_tabla['order_by']=='')? (  $datos_tabla['id']." ". (($datos_tabla['orden']=='1')?"desc":"asc") ):$datos_tabla['order_by'] )
								,
								0);

		//var_dump($pagina_items); exit();

		$lineas	 = $pagina_items['filas'];
		$paginas_linea = $pagina_items['tren'];
		$anterior_linea = $pagina_items['anterior'];
		$siguiente_linea = $pagina_items['siguiente'];

		$total_linea = $pagina_items['total'];
		$desde_linea = $pagina_items['desde'];
		$hasta_linea = $pagina_items['hasta'];

		$lineassize=sizeof($lineas);

		echo '<input type="hidden" id="ffilter" style="width:500px;" value="'.urlencode($_GET['filter']).'" >';

        echo '<input type="hidden" id="pagina" value="'.(($_GET['pag']=='')?"1":$_GET['pag']).'"  />';
        //echo '<input type="text" id="tipolista" value="'.$linkRecPagina.'"  />';
        echo '<input type="hidden" id="edit_hidd"  />';

        echo '<div style="position:relative;height:auto;float:left;width:100%;">';
        ?><ul id="ordenable" ><?php
        echo '<div class="refreshing" id="refresh" style="display:none;">cargando......</div>';

		if($lineassize!=0 or $_GET['buscar']!='' or $_GET['filter']!=''){

        echo '<div style="background-color:#FFF;height:auto;padding:0;clear:left;float:left;width:100%;'.$display_barra.'">';

		$vars['GENERAL']['controles_listados']=($vars['GENERAL']['controles_listados'])?$vars['GENERAL']['controles_listados']:1;

		echo '<div class="barbar2">';

        ?><span style=" <?php echo ($ocultar_opciones_filas==1)?'display:none;':''; ?>"><?php

	   	?><a class="braz z <?php if($_COOKIE[$tb.'_colap']=='2'){?>brasselected<?php }?>" <?php
        ?>onclick="set_filas('<?php echo $tb?>','<?php echo $tbf?>','2');return false;" <?php
        ?>title="Vista de Resúmen" <?php
        echo (in_array($vars['GENERAL']['controles_listados'],array('1','2')))?'':'style="display:none;"';
        ?>id="set_filas_2"></a><?php

	   	?><a class="braz z <?php if($_COOKIE[$tb.'_colap']=='1'){?>brasselected<?php }?>" <?php
        ?>onclick="set_filas('<?php echo $tb?>','<?php echo $tbf?>','1');return false;" <?php
        ?>title="Filas en Bloque" <?php
        echo (in_array($vars['GENERAL']['controles_listados'],array('1','3')))?'':'style="display:none;"';
        ?>id="set_filas_1"></a><?php

	   	?><a class="braz z <?php if($_COOKIE[$tb.'_colap']=='3'){?>brasselected<?php }?>" <?php
        ?>onclick="set_filas('<?php echo $tb?>','<?php echo $tbf?>','3');return false;" <?php
        ?>title="Vista de Filas" <?php
        ?>id="set_filas_3"></a><?php

        ?><a class="braz z <?php if($_COOKIE[$tb.'_colap']=='4'){?>brasselected<?php }?>" <?php
        ?>onclick="set_filas('<?php echo $tb?>','<?php echo $tbf?>','4');return false;" <?php
        ?>title="Vista de tabla" <?php
        echo (in_array($vars['GENERAL']['controles_listados'],array('1','3')))?'':'style="display:none;"';
        ?>id="set_filas_4" style="text-decoration:none;"></a><?php

		?></span><?php

		if(sizeof($datos_tabla['fulltext'])>0 or sizeof($datos_tabla['like'])>0){
		?><form action="<?php echo "custom/".$datos_tabla['archivo'].".php";?>" method="get"
		onsubmit="if($v('buscar')=='buscar <?php echo $datos_tabla['nombre_singular'];?>'){ return false; }"
		><?php
			?><div id="linea_buscador"><?php
				?><span class="z ico_search"></span><input type="text" class="<?php echo ($_GET['buscar']!='')?"inuse":"";?>" style="color:<?php echo ($_GET['buscar']!='')?"#000":"#999";?>; " <?php
				?>onfocus="if(this.value=='buscar <?php echo $datos_tabla['nombre_singular'];?>'){ this.value=''; this.style.color='#000'; } " <?php
				?>onblur="if(this.value==''){ this.style.color='#999'; this.value='buscar <?php echo $datos_tabla['nombre_singular'];?>'; } " <?php
				/* onkeyup=" if(event.keyCode=='13' && this.value!=''){ ax('buscar',this.value,'buscar <?php echo $datos_tabla['nombre_singular'];?>'); } " */
				?>value='<?php echo ($_GET['buscar']!='')?$_GET['buscar']:"buscar ".$datos_tabla['nombre_singular'];?>' autocomplete="off" <?php
				?>id="buscar" name="buscar" /><?php

				?><input type="submit" value="buscar" <?php
				/*onclick="ax('buscar',$v('buscar'),'buscar <?php echo $datos_tabla['nombre_singular'];?>');" */
				?>style="background-color:#000; color:#FFF; padding:0px 2px 0px 0px; font-size:18px; text-transform:uppercase;float:left; border:0; margin-right:10px; font-weight:bold; display:none;" /> <?php
				?><span id="buscar_span"></span><?php
			?></div><?php
		?></form><?php
		}

		$html_filter="<div style='clear:left;' class='byother'>".$html_filter."</div>";
		echo "<div class='filters' id='dfilters' >".$html_filter_fecha.$html_filter."</div>";

		}

		echo $htmlfil;

		echo "</div>";

		if($lineassize==0){ ?><div class="nohay" style=" padding-top:60px; height:auto;">0 <?php echo $datos_tabla['nombre_plural']?> </div><?php }

		echo '<div>';

		//$lineas=array($lineas[0]);

		$numero_de_campo_en_lista=$tblistadosize-4;

		$needs['html']=0;
		foreach($tblistado as $tbli){
		if($tbli['tipo']=='html'){ $needs['html']=1; }
		if($tbli['cuantity']=='1'){ $hascuantity=1; $cuantities[]=$tbli['campo']; }
		}

		if($hascuantity==1 and $lineassize>1){
		echo "<table class='tblcalculo'>";
		echo "<tr><td></td><td class=nombre>m�nimo</td><td class=nombre>m�ximo</td><td class=nombre>media</td></tr>";
		foreach($cuantities as $cutt){
		echo "<tr><td class=nombre>$cutt</td>";
		echo "<td class=valor>";
		$valor = dato("min($cutt)",$tbl,"where 1 $EXTRA_FILTRO $busqueda_query ".$datos_tabla['where_id'],0);
		echo intval($valor*100)/100;
		echo "</td>";
		echo "<td class=valor>";
		$valor = dato("max($cutt)",$tbl,"where 1 $EXTRA_FILTRO $busqueda_query ".$datos_tabla['where_id'],0);
		echo intval($valor*100)/100;
		echo "</td>";
		echo "<td class=valor>";
		$valor = dato("avg($cutt)",$tbl,"where 1 $EXTRA_FILTRO $busqueda_query ".$datos_tabla['where_id'],0);
		echo intval($valor*100)/100;
		echo "</td>";
		echo "</tr>";
		//echo "<div>nunca jamas quiere decir tal vez</div>";
		}
		echo "</table>";
		}
		$datos_tabla['edicion_completa']=($datos_tabla['edicion_completa']!='')?$datos_tabla['edicion_completa']:( (($needs['html']) or($numero_de_campo_en_lista>$limite_campos_en_lista))?1:0 );

		$datos_tabla['edicion_rapida']=($datos_tabla['edicion_rapida']!='')?$datos_tabla['edicion_rapida']:( (($needs['html']) or($numero_de_campo_en_lista>$limite_campos_en_lista))?0:1 );

		$urd=0;
		$groupvalue='';

		//PRE
		if($datos_tabla['mass_actions']!=''){
			$tblistado=array_merge(array(array('listable'=>'1','campo'=>'check','tipo'=>'check')), $tblistado);
		}

		foreach($tblistado as $tbli){
			$pdfrom[]="[".$tbli['campo']."]";
		}
        foreach($lineas as $tete=>$linea){
		$ct=array();
		$ConF=array();
		/*
		parse_str($linea['conf'],$ConF);
		$ct['eliminar']=(isset($ConF['eliminar']))?$ConF['eliminar']:$datos_tabla['eliminar'];
		$ct['procesos']=(isset($ConF['procesos']))?procesproces($ConF['procesos']):$datos_tabla['procesos'];
		*/
		$ct=procesproces($datos_tabla,$linea['conf']);
		//prin($ct);

		//prin($ct);
		//prin();
		//$ct=$datos_tabla;
		$urd++;
		$datos_tabla['edicion_completa']=($_GET['block']=='form' and $_GET['tipo']=='listado')?0:$datos_tabla['edicion_completa'];

			if($datos_tabla['por_linea']!=''){ if($tete%$datos_tabla['por_linea']==0){ echo ($tete!=0)?"</div>":""; echo "<div style='clear:left;'>"; } }
            echo '<li ';
			if($datos_tabla['edicion_rapida']=='1'){
			echo ' ondblclick="if(!$(\'i_'.$linea[$datos_tabla['id']].'\').hasClass(\'editar_rapido\')){ax(\'e\',\''.$linea[$datos_tabla['id']].'\');}"';
			echo ' onkeypress="if( $(\'i_'.$linea[$datos_tabla['id']].'\').hasClass(\'editar_rapido\')){if(event.keyCode==27){ax(\'e_a\',\''.$linea[$datos_tabla['id']].'\');}}" ';
			}
			echo ' alt="'.$linea[$datos_tabla['id']].'" class="bl ';

			switch($_COOKIE[$tb.'_colap']){
				case "1": echo ''; break;
				case "2": echo 'modificador'; break;
				case "3": echo 'modificador_linea'; break;
				case "4": echo 'modificador_grilla'; break;
			}
			echo '" id="i_'.$linea[$datos_tabla['id']].'"  >';
			//prin($linea);
            echo '<a class="ie" href="custom/'.$datos_tabla['archivo'].'.php?i='.$linea[$datos_tabla['id']].'">'
			.fecha_formato($linea['fecha_creacion'],"7b")
			.$linea[$datos_tabla['id']]
			.'</a>';

			echo '<div class="lc '. ( ($urd=='1')?"lc1 ":" " ) . ( ($datos_tabla['vis']!='')?(($linea[$datos_tabla['vis']]=='0')?"oc":""):'' ).'" id="lc_'.$linea[$datos_tabla['id']].'">';



			if($ct['eliminar']=='1'){
			echo '<a  id="ad_'.$linea[$datos_tabla['id']].'" onclick="ax(\'x\',\''.$linea[$datos_tabla['id']].'\');return false;" class="bl1 itr i_x z" title="eliminar '.$datos_tabla['nombre_singular'].'" ></a>';
			}

			if($datos_tabla['vis']!='' and $datos_tabla['visibilidad']!='0' ){

                         ?><a  id="av_<?php echo $linea[$datos_tabla['id']]?>" onclick="ax('v','<?php echo $linea[$datos_tabla['id']]?>'); return false;" class="bl1 itr i_m z" title="habilitar <?php echo $datos_tabla['nombre_singular'];?>" ></a><?php
                         ?><a  id="ah_<?php echo $linea[$datos_tabla['id']]?>" onclick="ax('o','<?php echo $linea[$datos_tabla['id']]?>'); return false;" class="bl1 itr i_o z" title="deshabilitar <?php echo $datos_tabla['nombre_singular'];?>" ></a><?php

                    }

					if($datos_tabla['cal']!='' and $datos_tabla['calificacion']!='0' ){

                        ?><a  id="as_<?php echo $linea[$datos_tabla['id']]?>" onclick="ax('star','<?php echo $linea[$datos_tabla['id']]?>'); return false;" class="bl1 itr ico_star_<?php echo ($linea[$datos_tabla['cal']])?$linea[$datos_tabla['cal']]:'0';?> z" <?php  echo 'rel="'. ( ($linea[$datos_tabla['cal']]==5)?'0':($linea[$datos_tabla['cal']]+1) ).'"'; ?> title="calificar <?php echo $datos_tabla['nombre_singular'];?>" ></a><?php

                     }

					if($datos_tabla['editar']=='1'){

                        if($datos_tabla['edicion_completa']=='1'){

                             ?><a  id="ae_<?php echo $linea[$datos_tabla['id']]?>" onclick="ax('ec','<?php echo $linea[$datos_tabla['id']]?>'); return false;" class="bl1 itr i_ec z" title="editar <?php echo $datos_tabla['nombre_singular'];?>" ></a><?php


                            if($datos_tabla['duplicar']=='1' and $_GET['block']!='form'){

                                ?><a  id="ae_<?php echo $linea[$datos_tabla['id']]?>" onclick="if(confirm('Desea Crear un nuevo registro de <?php echo $datos_tabla['nombre_singular'];?> con estos datos?')){ ax('ec','<?php echo $linea[$datos_tabla['id']]?>','nuevo'); } return false;" class="bl1 itr i_d z" title="Crear un nuevo <?php echo $datos_tabla['nombre_singular'];?> con estos datos" ></a><?php

                             	}
							}
                        if($datos_tabla['edicion_rapida']=='1'){

                            ?><a  id="ae_<?php echo $linea[$datos_tabla['id']]?>" onclick="ax('e','<?php echo $linea[$datos_tabla['id']]?>'); return false;" class="bl1 itr i_e z" title="editar <?php echo $datos_tabla['nombre_singular'];?>" ></a><?php }

             			}
						foreach($ct['procesos'] as $iproceso=>$proceso){
							if($ct['procesos'][$iproceso]['disabled']=='1'){ unset($ct['procesos'][$iproceso]); }
						}
						// prin($ct['procesos']);
						if(sizeof($ct['procesos'])>0 and $ct['procesos']!=0){
						//echo '<ul>'; echo '<li class="menudown">';

						echo '<a rel="sm_'.$linea[$datos_tabla['id']].'" id="ab_'.$linea[$datos_tabla['id']].'" onclick="ax(\'b\',\''.$linea[$datos_tabla['id']].'\');return false;" class=" bl1 itr i_b z" ></a>';

							echo '<div id="sm_'.$linea[$datos_tabla['id']].'" class="div_fila_overflow">';
							echo '<ul class="li_cabecera">';
							foreach($ct['procesos'] as $iproceso=>$proceso){
							echo "<li>";
							// prin($proceso);
							echo '<a rel="';
							echo ($proceso['rel'])?$proceso['rel']:'width:1250,height:900';
							echo '" href="'. ( ($proceso['file']!='')?$proceso['file']:'formulario_quick.php' ) .'?proceso='.$iproceso.'&L='.$linea[$datos_tabla['id']].'&OT='.(($proceso['ot'])?$proceso['ot']."&parent=".$objeto_tabla[$this_me]['archivo']:$objeto_tabla[$this_me]['archivo']."&parent=").'&ran=1'.(($proceso['accion'])?"&accion=".$proceso['accion']:'').((sizeof($proceso['cargar'])>0)?'&load='.urlencode(json_encode($proceso['cargar'])):'').(($proceso['extra'])?"&".str_replace(array("[id]"),array($linea[$datos_tabla['id']]),$proceso['extra']):'').'"'.
							' class="'. ( (isset($proceso['class']))?$proceso['class']:'mb' ) . 
							'" >';
							//echo '<a onclick="ax(\'ec\',\e'9\'); return false;" href="#" >';
							echo $proceso['label'];
							echo '</a>';
							echo "</li>";
							}
							echo '</ul>';
							echo '</div>';


						//echo '</li>'; echo '</ul>';
						}

                    ?></div><?php

					 if($datos_tabla['editar']=='1'){
                    ?><div id="lec_<?php echo $linea[$datos_tabla['id']]?>" class="lec <?php echo ($urd=='1')?"first_linea_exl ":" ";?>" style="display:none;"><a  id="aec_<?php echo $linea[$datos_tabla['id']]?>" onclick="ax('e_a','<?php echo $linea[$datos_tabla['id']]?>'); return false;" class="bl1 itr ico_Cancelar z" title="cancelar edici�n" >cancel</a><a  id="aeg_<?php echo $linea[$datos_tabla['id']]?>" onclick="ax('e_g','<?php echo $linea[$datos_tabla['id']]?>'); return false;"   class="bl1 itr ico_Guardar z" title="guardar cambios" >guardar</a></div><?php
                     }


            //echo $_COOKIE[$tb.'_colap'];
            ?><a class="expanlink <?php echo ($urd=='1')?"first_linea_exl ":" ";?>" id="exl_<?php echo $linea[$datos_tabla['id']]?>" style=" <?php
			echo ( ( $_COOKIE[$tb.'_colap']=='2' or $_COOKIE[$tb.'_colap']=='1') )?"display:none;":""; ?>" onclick="ax('set_fila_2','<?php echo $linea[$datos_tabla['id']]?>'); return false;" title="expandir"></a><?php
			?><a class="colaplink <?php echo ($urd=='1')?"first_linea_exl ":" ";?>" id="cll_<?php echo $linea[$datos_tabla['id']]?>" style=" <?php
			echo ( ( $_COOKIE[$tb.'_colap']=='3' or $_COOKIE[$tb.'_colap']=='4') )?"display:none;":""; ?> " onclick="ax('set_fila_3','<?php echo $linea[$datos_tabla['id']]?>'); return false;" title="colapsar"></a><?php


                    echo '<ul id="ldd_'.$linea[$datos_tabla['id']].'" class="ldd ';
					echo ($urd=='1')?"first_linea ":"";


					if($datos_tabla['vis']!=''){ echo ($linea[$datos_tabla['vis']]=='0')?"oc":""; }
					if($datos_tabla['vis']!=''){ echo ($linea[$datos_tabla['vis']]=='0')?"oc":""; }
					echo '" >';

					echo '<div class="truc"></div>';
					$tbid=0;
					$pdto=array();



					foreach($tblistado as $tbli){
						$pdto[]=$linea[$tbli['campo']];
					}

					$fefe=1;
					//var_dump($tblistado);
					foreach($tblistado as $tbli){

                        if($tbli['listable']=='1'){
						$tbid++;
							//prin($linea);
							if($urd==1){
								if($tbli['controles']!=''){
								list($tbli['controles'],$controles)=getControles($tbli['controles'],$objeto_tabla);
								//prin($controles);
								$controlEs[$tbli['campo']]=$tbli['controles'];
								$load_foto[$tbli['campo']]=$controles['foto'][0]['obj'];
								if($controles['file']){ 	$load_file[$tbli['campo']]=$controles['file']; }
								if($controles['subs']){ 	$load_subs[$tbli['campo']]=$controles['subs']; }
								if($controles['mensajes']){ $load_mensajes[$tbli['campo']]=$controles['mensajes']; }
								}
							}

							$SuprimirLabel=(
											strtolower($tbli['label'])=='nombre'
											or strtolower($tbli['label'])==strtolower($datos_tabla['nombre_singular'])
											or $tbli['label']=='T�tulo'
											or strtolower($tbli['label'])=='foto'
											or strtolower($tbli['label'])=='fecha'
											or strtolower($tbli['label'])=='vista'
											or strtolower($tbli['label'])=='email'
											or strtolower($tbli['label'])=='estado'
											or strtolower($tbli['label'])=='web'
											or strtolower($tbli['label'])=='categor�a'
											or strtolower($tbli['label'])=='tipo'
											or strtolower($tbli['listhtml'])=='1'
											or strtolower($tbli['campo'])==strtolower($datos_tabla['group'])
											)?1:0;

							$nuevoDad='';
							if(strtolower($tbli['campo'])==strtolower($datos_tabla['group'])){
								$nuevoDad='od';
								if($groupvalue!=$linea[$datos_tabla['group']]){
									$groupvalue=$linea[$datos_tabla['group']];
									$nuevoDad='nd';
								}
							}

							if($fefe==1){
							$Firstmain=(
											enhay(strtolower($tbli['label']),'nombre')
											or strtolower($tbli['label'])==strtolower($datos_tabla['nombre_singular'])
											or $tbli['label']=='Título'
											or strtolower($tbli['label'])=='código'
											or strtolower($tbli['label'])=='código'
											or strtolower($tbli['label'])=='numero'
											or strtolower($tbli['label'])=='número'
											or $tbli['campo']=='fecha_creacion'
											)?1:0;
							if($Firstmain) $fefe=0;
							} else $Firstmain=0;

							$nomodificar=(
											strtolower($tbli['label'])=='fecha'
											or strtolower($tbli['label'])=='email'
											)?1:0;
							$poner_title=(
											(
											$tbli['tipo']!='com'
											and $SuprimirLabel
											and !$nomodificar
											)
										 or ($tbid==1)
										 or $tbli['tipo']=='pas'
										)?1:0;
//							$tbli['label']=str_replace(array('Categor�a'),array('Cat'),$tbli['label']);

							$tbli['controles']=($tbli['control']=='0')?'':procesar_controles_html($controlEs[$tbli['campo']]);

							$tbli['width']=($tbli['width']=='' or $tbli['width']=='0px')?"":"width:".$tbli['width'].";";
                            echo '<li class="bld '. (($tbli['tipo']=='check')?'lchk':'').' '.(($tbli['listclass'])?$tbli['listclass']:'').' '.$nuevoDad.'" >';

							if($tbli['tipo']=='inp' and $load_foto[$tbli['campo']]!=''){
																		$obj=$load_foto[$tbli['campo']];
																		$hayfotoexterna=render_foreig_foto($objeto_tabla[$obj],$linea[$datos_tabla['id']]);
																		}

							//CHECK
							if($tbli['tipo']=='check')
							{
								?><b class="nc sp"><?php
								if($urd=='1'){
?><input type=checkbox onchange="var s=(this.checked)?true:false; s2=(this.checked)?'add':'remove'; $$('.chk').each(function(cc){ $(cc).checked=s; if(s){ $('i_'+$(cc).getAttribute('data-chk')).addClass('selectd'); } else { $('i_'+$(cc).getAttribute('data-chk')).removeClass('selectd'); } });" ><?php
								} else {
									?>&nbsp;<?php
								}
								?></b><div class="bd" style="width:auto;"><input class="chk" data-chk="<?php echo $linea[$datos_tabla['id']]; ?>" type="checkbox"
								onchange="var ee='i_'+this.getAttribute('data-chk'); if(this.checked){ $(ee).addClass('selectd'); } else { $(ee).removeClass('selectd'); }"></div><?php
							}


							//IMG
							if($tbli['tipo']=='img'){
									echo '<b class="nc '.(($SuprimirLabel)?'sp':'').'" '.( ($urd=='1')?' title="'.$tbli['label'].'" ':'').' >'.$tbli['label'].'&nbsp;';
									if($urd=='1' and $EdicionPanel){ ?><a class='edot' onclick='tog("<?php echo $tbli['campo']?>");return false;'>&diams;</a><?php }
									echo '</b>';

                                     echo '<span class="bd" ';
									 echo 'style="'.($tbli['style']=='')?"":str_replace(",",";",$tbli['style']).'"';
									 echo ' id="i_'.$tbli['campo'].'_'.$linea[$datos_tabla['id']].'">';
                                     if($linea[$tbli['campo']]!=''){
								   $cec=0; if(($tbli['enlace']=='lightbox') or !($tbli['enlace']) ){ $cec=1;
                                   ?><a style="float:none;margin:0;text-align:center;" href="<?php echo get_imagen($datos_tabla[$tbli['campo']]['carpeta'], $linea[$datos_tabla['fcr']],$linea[$tbli['campo']]);?>" rel="[images],noDesc" class="mb" ><?php } elseif($tbli['enlace']) { $cec=1;
								   echo '<a href="'.str_replace(array("[id]","[enlace]"),array($linea[$datos_tabla['id']],$linea[$tbli['campo']]),$tbli['enlace']).'" >'; }
                                   ?><img  id="<?php echo $tb?>_file_<?php echo $tbli['campo']?>_<?php echo $linea[$datos_tabla['id']]?>" <?php echo dimensionar_imagen($datos_tabla[$tbli['campo']]['carpeta'], $linea[$datos_tabla['fcr']],$linea[$tbli['campo']],$tbli['tamano_listado']);?> /><?php if($cec){?></a><?php }
								   } else {
                                   ?><img id="<?php echo $tb?>_file_<?php echo $tbli['campo']?>_<?php echo $linea[$datos_tabla['id']]?>" <?php
                                   ?>class='img_default' src="<?php echo $USU_IMG_DEFAULT;?>" /><?php
                                   }
								   echo '</span>';
								   ?><div class="pt" id="p_<?php echo $tbli['campo']?>_<?php echo $linea[$datos_tabla['id']]?>" ></div><?php
                                    if($tbli['controles']){
                                    $dts=str_replace(
													$pdfrom,
													$pdto,
													//"[id]",
													//$linea[$datos_tabla['id']],
													procesar_dato($tbli['controles'],$linea[$datos_tabla['id']]));
									if($urd==1){ $sizeE[$tbli['campo']]='style="width:'.( str_control($dts) ).'px;"'; }
									echo "<div class='cd' ".$sizeE[$tbli['campo']].">";
                                    echo $dts;
									echo "</div>";
                                    }

									}
							//STO
							if($tbli['tipo']=='sto'){

									list($uuno,$extens)=explode(".",$linea[$tbli['campo']]);

									echo '<b class="nc '.(($SuprimirLabel)?'sp':'').'"
									'.( ($urd=='1')?' title="'.$tbli['label'].'" ':'').'
									>'.$tbli['label'].'&nbsp;';
									if($urd=='1' and $EdicionPanel){ ?><a class='edot' onclick='tog("<?php echo $tbli['campo']?>");return false;'>&diams;</a><?php }
									echo '</b>';
									;?><span class="bd" style=' padding-left:10px;' id="i_<?php echo $tbli['campo']?>_<?php echo $linea[$datos_tabla['id']]?>" ><?php
                                    if($linea[$tbli['campo']]!=''){
								   $cec=0;
								   if(($tbli['enlace']=='lightbox') or !($tbli['enlace']) and in_array($extens,array('gif','jpg','png','swf')) ){
								   $cec=1;
                                   echo '<a style="float:none;margin:0;text-align:left;" href="'.get_imagen($datos_tabla[$tbli['campo']]['carpeta'], $linea[$datos_tabla['fcr']],$linea[$tbli['campo']]).'" rel="[images],noDesc" class="mb" >';
								    } elseif($tbli['enlace']) {
								   $cec=1;
								   echo "<a href=\"";

								   if($tbli['enlace']=='down'){
								   		echo "down.php?name=".urlencode($linea[($tbli['name'])?$tbli['name']:'nombre'])."&file=".urlencode(str_replace($vars['REMOTE']['httpfiles'],'',get_imagen($datos_tabla[$tbli['campo']]['carpeta'], $linea[$datos_tabla['fcr']],$linea[$tbli['campo']])))."\" title=\"Descargar ".$linea[($tbli['name'])?$tbli['name']:'nombre'];
								   } else {
								   		echo str_replace(array("[id]","[enlace]"),array($linea[$datos_tabla['id']],$linea[$tbli['campo']]),$tbli['enlace']);
								   }
								   echo "\">";

								   }

								   if(($tbli['enlace']=='down') and in_array($extens,array('txt','doc','xls','pdf')) ){
									   echo "Descargar <img src='img/ico_".$extens.".png' align=center border=0 >";
								   }else{
									   echo $linea[$tbli['campo']];
								   }

								   if($cec){ echo "</a>"; }

								   } else { ?>---<?php }
								   ?></span><?php

                                   ?><input type='hidden' value='' id="txt_<?php echo $tb?>_<?php echo $tbli['campo']?>_name_<?php echo $linea[$datos_tabla['id']]?>" /><?php

                                   ?><div class="pt" id="p_<?php echo $tbli['campo']?>_<?php echo $linea[$datos_tabla['id']]?>" style=' <?php echo ($tbli['style']=='')?"":str_replace(",",";",$tbli['style'])?>'></div><?php
								   if($tbli['controles']){
                                    $dts=str_replace($pdfrom,$pdto,procesar_dato($tbli['controles'],$linea[$datos_tabla['id']]));
									if($urd==1){ $sizeE[$tbli['campo']]='style="width:'.( str_control($dts) ).'px;"'; }
									echo "<div class='cd' ".$sizeE[$tbli['campo']].">";
                                    echo $dts;
									echo "</div>";
                                    }

								}

							//PAS
							if($tbli['tipo']=='pas'){
                                   ?><b class="nc"><?php echo $tbli['label']?>:</b><?php
                                   ?><span class="bd" style=' <?php echo $tbli['width']; ?>' <?php
                                   ?>id="i_<?php echo $tbli['campo']?>_<?php echo $linea[$datos_tabla['id']]?>" <?php
								   if($_COOKIE['admin']=='1') echo "title=\"".addslashes($linea[$tbli['campo']])."\"";
                                   ?>><?php

								   	$passs='';
									for($iu=0;$iu<strlen($linea[$tbli['campo']]);$iu++){
										$passs.="*";
									}
									echo ($_COOKIE['admin']=='1')?$linea[$tbli['campo']]:$passs;

                                   ?></span><input type="hidden" value="<?php echo $linea[$tbli['campo']]?>" id="i_<?php echo $tbli['campo']?>_<?php echo $linea[$datos_tabla['id']]?>_temp" /><div class="pt" id="p_<?php echo $tbli['campo']?>_<?php echo $linea[$datos_tabla['id']]?>" style=" <?php echo $tbli['width']; ?>"></div><?php
								 }

								if($tbli['controles']){
									$dts=str_replace($pdfrom,$pdto,procesar_dato($tbli['controles'],$linea[$datos_tabla['id']]));
									if($urd==1){
									$sizeE[$tbli['campo']]='style="width:'.( str_control($dts) ).'px;"';
									if($load_foto[$tbli['campo']]!=''){
									$sizeF[$tbli['campo']]='style="width:'.( str_control($dts) ).'px;margin-left:52px;"';
									}else{
									$sizeF[$tbli['campo']]='style="width:'.( str_control($dts) ).'px;"';
									}

									}
								}

							//OTROS
							if(
							in_array($tbli['tipo'],array('txt','inp','com','yot','fch','fcr','html','bit','id'))
							or
							($tbli['tipo']=='hid' and ($tbli['combo']=='1' or $tbli['listable']=='1') )
							){
									$tbli['tip_foreig']=( ($tbli['tipo']=='hid') and ($tbli['opciones']!=''))?$tbli['tip_foreig']:0;

									//echo ($SuprimirLabel)?"":'<b class="nc">'.$tbli['label'].':</b>';
									echo '<b class="nc '.(($tbli['label']=='' or $SuprimirLabel)?'sp':'').'" '.( ($urd=='1')?' title="'.$tbli['label'].'" ':'').' >'.
									str_replace(array('(',')'),array('<span style="display:none;">','</span>'),$tbli['label']).
									'&nbsp;';
									if($urd=='1' and $EdicionPanel){ ?><a class='edot' onclick='tog("<?php echo $tbli['campo']?>");return false;'>&diams;</a><?php }
									echo '</b>';

                                    if($tbli['extra']!='')
									echo "<span style='float:left;margin:0 3px; font-size:11px; '>".procesar_dato($tbli['extra'],$linea[$datos_tabla['id']])."</span>";
									if($tbli['tipo']=='yot'){
									echo "<img style='float:left;' src='http://i4.ytimg.com/vi/".$linea[$tbli['campo']]."/default.jpg' />";
									}
									$adiv0='';
									if($tbli['enlace'] or $tbli['tip_foreig']=='1' or $Firstmain){ $adiv0.='<a class="bd '; } else { $adiv0.='<div class="bd '; }
									if($tbli['tip_foreig']=='1'){ $adiv0.='tipper '; } else { $adiv0.=''; }

									$adiv0.= ($SuprimirLabel and !$nomodificar)?"mn ":"";
									$adiv0.= ($Firstmain and !$nomodificar and $tbli['listhtml']!='1')?"fm ":"";
									$adiv0.= ($Firstmain and !$nomodificar and $tbli['listhtml']!='1')?"fmf ":"";
									$adiv0.= '"';
									if($tbli['tip_foreig']=='1'){
									list($primO,$tablaO)=explode("|",$tbli['opciones']);
									list($idO,$camposO)=explode(",",$primO);
									list($tablaO,$notablaO)=explode(",",$tablaO);
									$lllink='custom/'.$tablaO.'.php?i='.$linea[$tbli['campo']];
									$adiv0.='rel="{ajax:\'ajax_sql.php?v_t='.$tablaO.'&v_d='.$idO.'%3D'.$linea[$tbli['campo']].'&exc='.$camposO.'&f=get_quick\'}"';
									} else { $adiv0.=''; }
									$adiv0.= "style='".$tbli['width'].";";
									$adiv0.= ($tbli['tipo']=='txt')?'max-height:95px;overflow:hidden;':'';
									$adiv0.= "' ";
									$adiv0.= "id=\"i_".$tbli['campo']."_".$linea[$datos_tabla['id']]."\" ";
									if($tbli['enlace'] or $tbli['tip_foreig']=='1'){
									if($tbli['tip_foreig']=='1'){
									$adiv0.= "href=\"$lllink\" ";
									} else {
									$adiv0.= "href=\"".str_replace(array("[id]","[enlace]"),array($linea[$datos_tabla['id']],$linea[$tbli['campo']]),$tbli['enlace'])."\" ";
									}
									} else {
										if($Firstmain)
										$adiv0.= "href=\"custom/".$datos_tabla['archivo'].".php?i=".$linea[$datos_tabla['id']]."\" ";										
									}
									

									$adiv1= '';
									switch($tbli['tipo']){
										case "fch":case "fcr":
										$adiv1.= fecha_formato($linea[$tbli['campo']],($tbli['formato'])?$tbli['formato']:'0b')."<input type='hidden' value='".substr($linea[$tbli['campo']],0,13)."' id='".$tb."_fchhid_".$tbli['campo']."_".$linea[$datos_tabla['id']]."' >";
										break;
										case "html":
										if($tbli['listhtml']=='1'){	$adiv1.= "<div class='htmlenlista'>".stripslashes($linea[$tbli['campo']])."</div>"; } else {
										$adiv1.= substr(strip_tags($linea[$tbli['campo']]),0,3000);
										}
										$adiv1.= "<textarea style='".(($tbli['width'])?'width:'.$tbli['width'].';':'')."display:none;' id='".$tb."_htmlhid_".$tbli['campo']."_".$linea[$datos_tabla['id']]."'  >".stripslashes($linea[$tbli['campo']])."</textarea>";
										break;
										case "hid":
										$adiv1.= '<input type="hidden" value="'.$linea[$tbli['campo']].'" id="i_'.$tbli['campo'].'_hido_'.$linea[$datos_tabla['id']].'" />';
										list($primO,$tablaO)=explode("|",$tbli['opciones']);
										list($idO,$camposO)=explode(",",$primO);
										$camposOA=array();
										$camposOA=explode(";",$camposO);
										$bufy='';
										foreach($camposOA as $COA){
										$bufy.= select_dato($COA,$tablaO,"where ".$idO."='".$linea[$tbli['campo']]."'")." ";
										}
										$adiv1.= $bufy;
										$adiv0.= ( $poner_title )?"title=\"".addslashes($bufy)."\"":"";
										break;
										case "bit":
										$adiv1.= '<input type="hidden" value="'.$linea[$tbli['campo']].'" id="i_'.$tbli['campo'].'_hido_'.$linea[$datos_tabla['id']].'" />';
										switch($linea[$tbli['campo']]){
											case "1":$adiv1.= "&nbsp;<a title='si' class='ico_yes z ico_list'></a>"; break;
											case "0":$adiv1.= "&nbsp;<a title='no' class='ico_no z ico_list'></a>"; break;
										}
										break;
										case "com":
										$adiv1.= '<input type="hidden" value="'.$linea[$tbli['campo']].'" id="i_'.$tbli['campo'].'_hido_'.$linea[$datos_tabla['id']].'" />';
										if(is_array($tbli['opciones'])){
										list($opppp,$color)=explode("|",$tbli['opciones'][$linea[$tbli['campo']]]);
										switch(str_replace(
											array('�','�','�','�','�'),
											array('a','e','i','o','u'),
											strtolower($opppp))){
										case "comentario":							$adiv1.= "&nbsp;<a title='enviado' class='ico_tack z ico_list'></a>"; break;
										case "soporte":								$adiv1.= "&nbsp;<a title='soporte' class='ico_clip z ico_list'></a>"; break;
										case "enviado":								$adiv1.= "&nbsp;<a title='enviado' class='ico_left z ico_list'></a>"; break;
										case "recibido":							$adiv1.= "&nbsp;<a title='recibido' class='ico_right z ico_list'></a>"; break;
										case "si":case "sí":						$adiv1.= "&nbsp;<a title='si' class='ico_yes z ico_list'></a>"; break;
										case "no":									$adiv1.= "&nbsp;<a title='no' class='ico_no z ico_list'></a>"; break;
										case "nuevos soles":case "soles": 			$adiv1.= "S/."; break;
										case "dolares":case "dolares americanos": 	$adiv1.= "\$US"; break;
										default : 									$adiv1.= "<span style='color:$color;'>".$opppp."</span>";	break;
											}
										} else {
										$adiv0.= ( $poner_title )?"title=\"".addslashes($linea[$tbli['campo']])."\"":"";
										$adiv1.= $linea[$tbli['campo']];
										}
										break;

										default:
										$adiv0.= ( $poner_title )?"title=\"".addslashes($linea[$tbli['campo']])."\"":"";
										$adiv1.= $linea[$tbli['campo']];
										break;

									}

									if($tbli['enlace'] or $tbli['tip_foreig']=='1' or $Firstmain ){ $adiv2= '</a>'; } else { $adiv2= '</div>'; }

									$adiv0.= " >";

									echo $adiv0.$adiv1.$adiv2;
									//echo ($tbli['foreig'])?"�":"";
									?><div class="pt" id="p_<?php echo $tbli['campo']?>_<?php echo $linea[$datos_tabla['id']]?>" style=" <?php echo $tbli['width']; ?>"></div><?php
									if($tbli['controles']){
									echo "<div class='cd' ". ( ($hayfotoexterna)?$sizeE[$tbli['campo']]:$sizeF[$tbli['campo']]).">";
                                    //echo str_replace($pdfrom,$pdto,procesar_dato($dts,$linea[$datos_tabla['id']]));
                                    echo $dts;
									echo "</div>";
									}

									}
                    		 echo '</li>';
							 }
                    	}

					echo '</ul>';

						if($urd==1){
						$load_subs_render=(sizeof($load_subs)>0)?1:0;
						}
						if($urd==1){
						$load_file_render=(sizeof($load_file)>0)?1:0;
						}

						if($load_subs_render){
						render_foreig_subs($load_subs,$linea[$datos_tabla['id']],$urd);
						}
						if($load_file_render){
						render_foreig_file($load_file,$linea,$urd);
						}

                    echo "</li>";


		//////////////////////////////////////////////////////////////////////////////////////////////////////////
		//		listado fin 	//////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////
		 }

		if($datos_tabla['por_linea']!=''){ echo "</div>"; }

		?></ul><?php
        ?></div><?php

        }
		?><input type="hidden" id="inner_hidden_num" value='<span class="spa2n"><span id="span_num" ><?php echo $total_linea; ?></span> <?php echo ($total_linea==1)?$datos_tabla['nombre_singular']:$datos_tabla['nombre_plural']?></span> <span style="font-weight:normal;"><?php echo ($total_linea==$lineassize)?"":"(desde $desde_linea hasta $hasta_linea)"; ?></span>' /><?php
		?><input type="hidden" id="inner_hidden_num2" value='<span id="span_num2" ><?php echo $total_linea; ?></span> <?php echo ($total_linea==1)?$datos_tabla['nombre_singular']:$datos_tabla['nombre_plural']?> <span style="font-weight:normal;"><?php echo ($total_linea==$lineassize)?"":"(desde $desde_linea hasta $hasta_linea)"; ?></span>' /><?php
		?><textarea id="inner_hidden_tren" style="display:none;"><div class='pagination' style='margin:0;'><ul><?php echo $anterior_linea.$paginas_linea.$siguiente_linea;?></ul></div></textarea><?php
		?><script>

		window.addEvent('domready',function(){
	        ax('actualizar_total',this.value);
		});

        </script><?php


     /**/

	if(strpos($_SERVER['SCRIPT_NAME'], "login.php")===false){

	/*
    ?><div class="segunda_barra"  id="segunda_barra_3" style="clear:left;" ><?php

		 if($tblistadosize!='0'){
            ?><b style="float:left; text-align:left; width:33%;" id="inner_span_num2" ></b><?php
            ?><b id="inner_span_tren2" class="inner_span_tren" ></b><?php
         }

	?></div><?php
	*/

    } else {
    ?><style>
	#div_allcontent { width:630px; margin-top:7%; min-width:0%; }
	ul.ul_menus { width:25%;}
    .div_bloque_cuerpo { float:left; width:60%; margin-left:4%; }
	.formulario .linea_form:hover label { background:none; }
    </style>
    <script>
	window.addEvent('domready',function() {
	$('error_creacion').innerHTML='';
	$('val_in_nombre');
	});
	</script>
    <?php }

	?></div><?php

    ?><!-- FIN AJAX --><?php


if(!isset($_GET['ran']) or $_GET['ran']==''){

echo "</div>";
include("vista_ax.php");
}

}
//prin(0);
if(isset($_GET['ran']) and $_GET['ran']!=''){
	include("lib/compresionFinal.php");	/*para Content-Encoding*/
}

?>
<script language="javascript">
if(window.location.hash=='#create'){ abrir_crear('1','0'); }
/*
var HM = new HashListener();
//add an event listener to the manager
HM.addEvent('hashChanged',function(new_hash){
    console.log(new_hash);
});
*/
</script>