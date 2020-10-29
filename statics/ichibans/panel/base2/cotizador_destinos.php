<?php //á

	$LI=array(
	'00'=>'todas',
	'99'=>'ninguna', 
	'AR'=>'AEROLINEAS ARGENTINAS',
	'AM'=>'AEROMEXICO',
	'VH'=>'AEROPOSTAL ALAS DE VENEZUELA',
	'AC'=>'AIR CANADA',
	'AA'=>'AMERICAN AIRLINES',
	'AV'=>'AVIANCA',
	'CM'=>'COPA AIRLINES',
	'LP'=>'LAN PERU',
	'T0'=>'TACA AIRLINES',
	'JJ'=>'TAM MERIDIONAL');
	
	$meses=array('1'=>'enero','febrero','marzo','abril','mayo','junio','julio','agosto','setiembre','octubre','noviembre','diciembre');
	
	$URL_INICIO	="http://www.etravelseeker.com/ptaweb/pag_paquete_imp_pax.jsp";

	$URL_FIN	="&sel=1&orden=3&grupos=&categorias=1.00&codigo_agencia_firma=15405&nombre_agencia=CALANDRIA TRAVEL S.A.C.&ruc=20524872855&tipo_ruc=RUC&tipo_importe=1&h=900&transportador_nombre=&fecha=00&pres=0&id_tipo_tarifario=1&mail_counter=&nombre_counter=Elisa Rocca&e_mail=elisarocca@calandriatravel.com&gastosad=0.00&tipo_paq=03&subcodigo=0&muestra_nchs=1&muestra_thabs=sgl,dbl,tpl,qua,chd,ch2,cadic&varimgtd=0&vartd=0&varpaxtd=0&varp=";


	
//if($_GET['paso']=='get_paquete'){
if(1){	
	
	/*
	chdir("../");
	include('lib/compresionInicio.php');
	include("lib/includes.php");*/
	require_once('lib/simple_html_dom.php');
	/*chdir("base2");	
	*/	
		if(0){
			
			$source='http://www.etravelseeker.com/ptaweb/pag_paquete_imp_pax.jsp?id_paquete=12657&mes=7&mes_fin=8&anio=2011&id_aerea=CM&sel=1&orden=3&grupos=&categorias=1.00&codigo_agencia_firma=15405&nombre_agencia=CALANDRIA%20TRAVEL%20S.A.C.&ruc=20524872855&tipo_ruc=RUC&tipo_importe=1&h=900&transportador_nombre=&fecha=00&pres=0&id_tipo_tarifario=1&mail_counter=&nombre_counter=Elisa%20Rocca&e_mail=elisarocca@calandriatravel.com&gastosad=0.00&tipo_paq=03&subcodigo=0&muestra_nchs=1&muestra_thabs=sgl,dbl,tpl,qua,chd,ch2,cadic&varimgtd=0&vartd=0&varpaxtd=0&varp=';
			
			$content = file_get_contents($source);
			$f1=fopen("base2/paquete_ets.txt","w+");
			fwrite($f1,$content);
			fclose($f1);
				
		} else {
	
			$lineas=file("base2/paquete_ets.txt");
			$content=implode("",$lineas);
				
		}

	//$content=preg_replace("/(\n*)/","",$content);
	//$content=preg_replace("/(^\s+)/","",$content);	
	$html = str_get_html(utf8_encode($content));

	$tables1=$html->find("#Table1");
	$tables=$tables1[0]->parent();
	$tablesc=$tables->children();
	foreach($tablesc as $tblc){ $ht=$tblc->outertext; if($ht!='<br>'){ $TBL[]=$tblc; } }
	$TABLE['incluye']=$TBL['0'];
	$TABLE['hoteles']=$TBL['1'];
	$TABLE['info']=array($TBL['2'],$TBL['3'],$TBL['4']);
	

	$html = str_get_html(utf8_encode($content));
	
	$incluyes=$TABLE['incluye']->find(".textoNegro");
	$TABLE['incluye']=array();
	foreach($incluyes as $incluye){ 
		$TABLE['incluye'][]=clean($incluye->innertext);
	}
	//prin($TABLE['incluye']);
//	echo "<textarea style='width:100%;height:500px;'>". $TABLE['hoteles']->outertext ."</textarea>";

	$tables=$TABLE['hoteles']->find("table table table table");
	$TABLE['hoteles']=array();
	foreach($tables as $table){ 
	    $ht=$table->find(".textoGuinda",0);
	    $pw=$table->find(".prueba2",0);
		$hotel['nombre']=clean($ht->innertext);
		$partes=explode("/",$hotel['nombre']);
		$parteshotel=explode("(",$partes[0]);
		$hotel['hotel']=trim($parteshotel[0]);
		$hotel['alimentacion']=trim($partes[1]);
		$hotel['habitacion']=trim($partes[2]);
		list($hotel['from'],$hotel['to'])=explode(" ",clean($pw->innertext));
	    $trs=$table->find("tr");
		$tri=0;
		foreach($trs as $tr){
			$tri++;
			if($tri>2){ 
				$tdvar=$tr->find(".textoInferriorAzul");
				$tdval=$tr->find(".textoNegro");
				$prec  =clean(str_replace(array("US$","Edad","FREE","&nbsp;"),array("","",0,""),$tdval[0]->innertext));
				$precna=clean(str_replace(array("US$","Edad","FREE","&nbsp;"),array("","",0,""),$tdval[2]->innertext));
				if($prec!=''){ 	$pre[trim($tdvar[0]->innertext)]		=$prec; }
				if($precna!=''){$pre[trim($tdvar[0]->innertext)."NA"]	=$precna; }
			}
		}
		$hotel['precios']=$pre; unset($pre);
		$TABLE['hoteles'][]=$hotel; unset($hotel);
	}
	
	$PAQUETE=array('incluye'=>$TABLE['incluye'],'opciones'=>$TABLE['hoteles']);
	prin($PAQUETE);
	//$hthoteles=preg_replace("/^(\s+)/","",$TABLE['precios']->outertext);
	//echo "<textarea style='width:100%;height:500px;'>".$hthoteles."</textarea>";
//	echo $TABLE['incluye'];
//		echo "<table><tr>". $tables->outertext. "</tr></table>";
	
	/*
	$TB[]= $tables1[1]->outertext;	
	$TB = $tables1[1];
	$TB= $TB->next_sibling();
	while($TD){
		$TB[]="<table>".$TD."</table>";
	}
	*/
	
	/*
	$textoTituloBlanco=$html->find(".textoTituloBlanco");		
	echo "<table>".$textoTituloBlanco[3]->parent()->parent()->innertext."</table>";
	*/
	//echo $tables1[2]->innertext;
		
	$body=$html->find("body",0);		
	$body=$body->innertext;

	/*
	$body0=preg_replace("/(\n+)/","",$body0);
	$body0=preg_replace("/(^\s+)/","",$body0);	
	echo "<textarea style='width:100%;height:500px;'>".$body0."</textarea>";
	*/
	
	
	$html->clear();
	unset($html);
		
} elseif($_GET['paso']=='cotizar'){
	
	chdir("../");
	include('lib/compresionInicio.php');
	include("lib/includes.php");
	require_once('lib/simple_html_dom.php');
	chdir("base2");
	
	$params=array(
				'from'=>$_GET['from'],
				'to'=>$_GET['to'],
				'year'=>$_GET['year'],
				'ciudad'=>select_dato('cod','lugares','where id='.$_GET['id_lugar']),
				'pais'=>select_dato('cod','paises','where id='.$_GET['id_pais']),
				'aereo'=>$_GET['cod_aereo']
				);

	$items=cotizador($params);
	if($items==false){
		echo json_encode(array('total'=>'0','aereo'=>$_GET['cod_aereo']));		
	}
	else {
		$items2=array(); foreach($items as $item){ $items2[]=array_values($item); } $items=$items2;		
		echo json_encode(array('total'=>sizeof($items),'aereo'=>$_GET['cod_aereo'],'data'=>$items));
	}
	
	/*
	chdir("../");		
	include('lib/compresionFinal.php');	
	*/
			
} else {

	foreach($meses as $m=>$mes){ 
		if($m>=date("n")){ $meses1[$m]=$mes; }
	} 
	$meses=$meses1;
	
	$tbcampos=array(
		'from'=>		array(
			//'legend'=>'Fecha', //LEGEND
			'campo'		=>'from',
			'label'		=>'De',
			'tipo'		=> 'com',
			'derecha'	=> '2',
			'style'		=> 'text-transform:capitalize;',
			'default'	=> date("n"),
			'opciones'  => $meses
		),
		'to'=>			array(
			'campo'		=>'to',
			'label'		=>'A',
			'tipo'		=> 'com',
			'derecha'	=> '2',
			'style'		=> 'text-transform:capitalize;',
			'default'	=> date("n")+1,
			'opciones'  => $meses
		),
		'year'=>		array(
				'campo'		=>'year',
				'label'		=>'Año',
				'tipo'		=> 'inp',
				'derecha'	=> '2',
				'style'		=> 'width:60px;',
				'default'	=> date("Y")
			),
		'id_pais'		=>array(
				//'legend'		=> 'Destino',
				'campo'		=> 'id_pais',
				'label'		=> 'País',
				'tipo'		=> 'hid',
				'listable'	=> '0',
				'validacion'=> '1',
				'foreig'	=> '1',
				'derecha'	=> '1',
				'opciones'		=> 'id,nombre|paises|where coti=1',
				'load'			=> 'id_lugar||id,nombre|lugares|where coti=1 and id_pais=',
				'style'			=> 'width:100px,'
		),
		'id_lugar'		=>array(
				'campo'			=> 'id_lugar',
				'label'			=> 'Ciudad',
				'tipo'			=> 'hid',
				'listable'		=> '1',
				'validacion'	=> '1',
				'foreig'		=> '1',
				'derecha'		=> '2',
				'style'			=> 'width:100px,',
				'onchange'		=> 'getAereos'
		),
		'cod_aereo'		=>array(
				'campo'			=> 'cod_aereo',
				'label'			=> 'Aereo',
				'tipo'			=> 'hid',
				'listable'		=> '1',
				'validacion'	=> '1',
				'foreig'		=> '1',
				'derecha'		=> '2',
				'style'			=> 'width:100px;text-transform:capitalize;'
		)		
	);
	

	?>
	<div class="bloque_content_crear" ><ul class="formulario">
	<?php include('formulario_campos.php'); ?>
	<li id="linea_crear" class="linea_form linea_derecha" style="margin-top:-15px;">
	<label>&nbsp;</label>
	<input type="button" onclick="cotizar();" style="float:left;" value="Cotizar" class="form_boton_1" id="in_submit">
	</li>
	</ul></div>
    <div style="float:left;width:400px;" id="listado_paquetes"></div>
    <div style="margin-left:400px;"><iframe id="iframe_paquete" name="iframe_paquete" height="600px" ></iframe></div>
	<style>
	.formulario label { width:40px; } 
	.table_paquetes { float:left; width:100%; background:#EEE; }
	.table_paquetes thead th { color:#999; text-transform:uppercase; font-weight:bold; }
	.table_paquetes thead th,
	.table_paquetes tbody td { padding:0 0px 6px 4px; }	
	#iframe_paquete {
		 border:1px solid #888;
		 width:100%;
		 height:600px;
		 background-color:#FFF;
	}
	#listado_paquetes div { font-weight:bold; text-align:center; margin-bottom:5px; }
	.select { background-color:#FFC; }
	</style> 
	<script>
	
	function cotizar(){
		var url_inicio='<?php echo $URL_INICIO;?>';
		var url_fin='<?php echo $URL_FIN;?>';		
		var json;
		var ae;
		var html='';
		var r=[];
		data={};
		data.paso='cotizar';
		$('in_submit').value='Cotizando....';
		$('in_submit').setStyle('opacity','0.5');				
		$('in_submit').disabled=true;
		$$('.form_input').each(function(el) {
			eval("data."+el.name+"='"+el.value+"';");
		});	
		new Request({
			url: "base2/cotizador_destinos.php",
			method: 'get',
			data : data,
			onSuccess: function(result){
				json=JSON.decode(result,true);
				r=json.data;
				if(json.total==0){
					html+='<div style="color:red;">No se encontraron paquetes, por favor elija otros parametros de busqueda</div>';			
				} else {
					html+='<div>Se encontraron '+json.total+' paquetes</div>'
					html+="<table class='table_paquetes'><thead><tr><th>Paquete</th><th>Nchs</th><th>Desde</th>";
					if(json.aereo!='99') html+="<th>Aéreo</th></tr>";
					html+="<tbody>";
					for(var i=0;i<r.length;i++){
						html+="<tr id='tr_"+i+"'>";
						html+="<td><a href='"+url_inicio+r[i][6]+url_fin+"' onclick='setFila("+i+");' target='iframe_paquete'>"+r[i][3]+"</a></td>";
						html+="<td>"+r[i][0]+"</td>";
						html+="<td>$"+r[i][4]+"</td>";
						if(json.aereo!='99'){
						eval("ae=jsonAereo."+r[i][2]);
						html+="<td><b title='"+ae+"'>"+r[i][2]+"</b></td>";
						}
						html+="</tr>";
					}
				}
				html+="</tbody></table>";
				$('listado_paquetes').innerHTML=html;
				//new Element('div',{html:html}).inject($('inner'), 'bottom');
				$('in_submit').value='Cotizar';
				$('in_submit').disabled=false;
				$('in_submit').setStyle('opacity','1');				
			}
		}).send();
								
	}
	function setFila(i){
	$$(".table_paquetes tr").removeClass('select');
	$("tr_"+i).addClass('select');
	}
	var	jsonAereo=<? echo json_encode($LI);?>;
	function getAereos(dis){
		var value;
		$('in_cod_aereo').innerHTML='';
		new Element('option',{'value':'','html':'.............'}).inject($('in_cod_aereo'), 'bottom');
		new QuerySelect({type:'dato',camps:'aerolineas',table:'lugares',where:'where id='+dis,onSuccess:function(e){  
			var co=new Array();
			cods=e.split(",");
			$('in_cod_aereo').innerHTML='';
			new Element('option',{'value':'','html':''}).inject($('in_cod_aereo'), 'bottom');
			new Element('option',{'value':'00','html':'todas','selected':true}).inject($('in_cod_aereo'), 'bottom');
			new Element('option',{'value':'99','html':'ninguna'}).inject($('in_cod_aereo'), 'bottom');
			for(var i=0;i<cods.length;i++){	
				eval("value=jsonAereo."+cods[i]);
				new Element('option',{
					'value'	:cods[i],
					'html'	:value
				}).inject($('in_cod_aereo'), 'bottom');	
			} 
		}
		}).send();	
	
	}
	
	
	
	var QuerySelect = new Class({
	
		Implements: [Options, Events],	
		options : {
			url		: 'query_select.php',
			dir		: '',			
			type	: 'select',//select,fila,dato
			camps	: 'id',	
			table	: 'items',
			where	: 'where 1 limit 100'
		},
		initialize: function(options){
			this.setOptions(options);
		},
		send : function() {
			new Request({
				url: this.options.dir+this.options.url,
				method: 'get',
				data : {
						'r':this.options.type,
						'c':this.options.camps,
						't':this.options.table,
						'w':this.options.where
						},
				onSuccess: function(result){
					var json;
					if(this.options.type=='select'){
						json=JSON.decode(result,true);
						json=json.s;
					} else if(this.options.type=='fila'){
						json=JSON.decode(result,true);
						json=json.f;
					} if(this.options.type=='dato'){
						json=JSON.decode(result,true);
						json=json.d;
					}
					this.fireEvent('onSuccess', json);				
				}.bind(this)
			}).send();
		}
	});
		
	</script>

<?php } 



function cotizador($opc){

	/*PARSER ARBOL DE PAQUETES CONFIRMADOS*/
	$post ='chk_fecha2=on';
	$post.='&as_mes='.$opc['from'];
	$post.='&as_mes_fin='.$opc['to'];
	$post.='&as_annio='.$opc['year'];
	$post.='&as_fecha=00';
	$post.='&as_pais='.$opc['pais'];
	$post.='&as_ciudad='.$opc['ciudad'];
	$post.='&as_linea='.$opc['aereo'];	
	$post.='&as_pres=0';
	$post.='&gastos=0.00';
	$post.='&as_campana=0';
	$post.='&tipo_importe=1';
	$post.='&num_alea=1309222869046&email=elisarocca%40calandriatravel.com&ruc=20524872855&nombre_counter=Elisa+Rocca&counter_pref=dverano%40destinosmundialesperu.com&oficina_codigo=0&usuwebcodigo=15234&tipo_ruc=RUC&tipo_pagina=1&vartd=0&varimgtd=0&ls_id_cliente_agencias_web=15405&ls_nombre_empresa=&pagina=Servlet_Obtiene_Filtro_cons';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
	curl_setopt($ch, CURLOPT_URL, "http://www.etravelseeker.com/ptaweb/Servlet_Session"); 
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	$content = curl_exec($ch);
	curl_close($ch);
	$content=utf8_encode($content);
	$html = str_get_html($content);

	$isempty=$html->find("table table table table table tr td div",0);
//	echo "<textarea style='width:100%;height:200px;'>".$isempty->innertext."</textarea>";
	if(enhay($isempty->innertext,'No se encontraron datos')){ return false; }
	$trs=$html->find("table table table table table tr");
	foreach($trs as $tr){
		
		$tds=$tr->find("td");
		foreach($tds as $r=>$td){
			$TD[]=trim(preg_replace("/(\s+)/"," ",str_replace("\n"," ",strip_tags($td->innertext,"<img><a>"))));
		}
		$parts1=between($TD['1'],":ver(",")'>");
		$parts2=between($TD['1'],")'>","</a>");
		$parts3=between($TD['3'],"US\$","S/");
		$parts4=between($TD['4'],"\"images/","\"");
		$parts5=explode(",",str_replace("\"","",$parts1[1]));
		$part6=implode("",$TD);
		$TDS=array(
			'noches'=>$TD['2'],
			'id_paquete'=>$parts5['0'],
			'aereo'=>$parts5['1'],
			'nombre'=>$parts2['1'],
			'desde'=>trim($parts3['1']),
			'tipo'=>$parts4['1'],
			);
		unset($TD);
		if(!(enhay($part6,'Nchs'))){
			$TDS['link']=urlpaquete(array('id_paquete'=>$TDS['id_paquete'],'from'=>$opc['from'],'to'=>$opc['to'],'year'=>$opc['year'],'aereo'=>$TDS['aereo']),false);	
			$PAQUETES[]=$TDS; unset($TDS); 
		}
	}
	$html->clear();
	unset($html);
	
	return $PAQUETES;
		
	}
	
	function urlpaquete($pa,$complete=true){
		global $URL_INICIO; global $URL_FIN;
		$url ="";
		if($complete){
		$url.=$URL_INICIO;
		}
		$url.="?id_paquete=".$pa['id_paquete']."&mes=".$pa['from']."&mes_fin=".$pa['to']."&anio=".$pa['year']."&id_aerea=".$pa['aereo'];
		if($complete){
		$url.=$URL_FIN;
		}
		return $url;
	}

	function quitar_espacios($tdd){
		$tdd1=explode("\n",$tdd);
		foreach($tdd1 as $tdd0){ if(trim($tdd0)!=''){ $tdd3[]=trim($tdd0); } }
		$tdd=implode(" ",$tdd3);
		$tdd=trim($tdd);
		return $tdd;
	}

	function preprocess($str){
		global $monitores;
		$array=explode("\n",$str);
		foreach($array as $iten){
	
	//		$iten =preg_replace("/[^a-zA-Z0-9<>\s]/", "", $iten);
			$iten =str_replace("-","",$iten);
			$iten =str_replace("-","",$iten);
			$iten =str_replace("*","",$iten);
			$iten =preg_replace("/\s+/", " ", $iten);
			$iten =trim($iten);
			$iten2=strip_tags($iten,"<table><tr><td>");
			if($iten!='' and $iten2!='' and !enhay($iten,"siguientes páginas web")){
				//$array2[]=trim($iten);
				$array2[]=$iten;			
			}
		}
	//	if($monitores) echo "<textarea style='float:left;width:49%;height:250px;margin-bottom:5px;font-size:10px;'>". ( implode("\n",$array2) ) ."</textarea>";	
		return $array2;
	}
	
	function strip_only($str, $tags, $stripContent = false) { 
		 $content = ''; 
		 if(!is_array($tags)) { 
			 $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) : array($tags)); 
			 if(end($tags) == '') array_pop($tags); 
		 } 
		 foreach($tags as $tag){
			 if($stripContent)
				  $content = '(.+</'.$tag.'[^>]*>|)'; 
			  $str = preg_replace('#</?'.$tag.'[^>]*>'.$content.'#is', '', $str); 
		 } 
		 return $str; 
	}	

	function get_edades($paquete,$grupo,$chd){
		$url="http://www.etravelseeker.com/ptaweb/pag_muestra_rangos_paquete.jsp?paquete=".$paquete."%20&grupo_paquete=".$grupo."&tipo_chd=".$chd;
	//	echo $url."<br>";
		$html0 = file_get_html($url);
		$divs = $html0->find("div");	
		foreach($divs as $div){
			if(is_numeric(trim($div->innertext))){ $number[]=trim($div->innertext); }
		}
		$html0->clear();
		unset($html0);
		return $number[0]." a ".$number[1];
	//http://www.etravelseeker.com/ptaweb/pag_muestra_rangos_paquete.jsp?paquete=11113%20&grupo_paquete=6&tipo_chd=0	
	}

function get_datos3($content){
	$content=strip_only($content, "script", true);
	$content=strip_only($content, "style", true);
	$content=strip_tags($content);
	$partes=between($content,"Nombre del Paquete","Incluye");
	$partes[1]=quitar_espacios($partes[1]);	
	$partes[1]=preg_replace("/(&nbsp;|\s+)/"," ",$partes[1]);	
	$parte=between($partes[1],":","N&deg; de Noches"); $nombre=trim($parte[1]);
	$parte=between($partes[1],"N&deg; de Noches :","Ciudad :"); $noches=trim($parte[1]);	
	$ciudad=trim($parte[2]);
	$fila=select_fila("id_pais,id","lugares","where nombre LIKE '%".trim($ciudad)."%'");			
	$ciudad_id=$fila['id'];
	$pais_id=$fila['id_pais'];	
	$array=array($nombre,$noches,$ciudad,$ciudad_id,$pais_id);
//	prin($array);
	return $array;
}
	
function regla_descripcion($array){	
if(sizeof($array[1]>0)){
	$webs='';	
	foreach($array[1] as $arra){
		if(trim($arra)!=''){
		$webs.=$arra."<br>\n";
		}
	}
	$webs=($webs!='')?"<br>Mayor informacion de los hoteles pueden visitar las sgtes páginas web:<br>\n<br>\n".$webs.'<br>':'<br>';
}
return trim($array[0]."\n".$webs);	
}

function regla_comentarios($array){	

//$txt="<p>\nMayor informacion de los hoteles pueden visitar las sgtes páginas web:<br>\n<br>\n";
foreach($array as $arra){	
//	if(enhay($arra,"prepago no reembolsable")) continue;	
	if(enhay($arra,"Stock")) continue;		
	if(enhay($arra,"Entrega:")) continue;			
	if(enhay($arra,"taxes")) continue;			
	if(enhay($arra,"No Show")) continue;	
	if(enhay($arra,"vigentes al")) continue;	
	if(enhay($arra,"comisionable")) continue;
	if(enhay($arra,"ncentivo")) continue;	
	if(enhay($arra,"prepago no reembolsable")){ list($uno,$PRECIO_PREPAGO,$tres)=between($arra,"\$","."); $PRECIO_PREPAGO=$PRECIO_PREPAGO.".00"; continue; }	
	$TXT[]="<li>".$arra."</li>";
}
$TXT2="<li>Precio por persona en dólares americanos de acuerdo al tipo de habitación.</li>
<li><strong>Reservaciones con prepago no reembolsable de $[precio_prepago]. Pago Total [dias_prepago] dias antes del viaje.</strong></li>
<li>Impuestos sujetos a variación de la propia línea aérea hasta el momento de la compra de boletos.</li>
<li>Anulaciones o cancelaciones se penalizará al 100%.</li>
<li>Los vouchers y boletos serán entregados como máximo 48 hrs. antes de la fecha de salida. Paquete no reembolsable, no endosable ni transferible.</li>
<li>Los traslados &nbsp;mencionados en el itinerario son en servicio compartido con otros pasajeros se deberá esperar al transportista en el lugar y hora indicada (esto se le comunicará en el destino) de no ser así el transportista no está en obligación de esperar ni buscar al pasajero, no está sujeto a reembolso ni reclamos de no cumplir con los horarios establecidos.</li>
<li>Sujetos a disponibilidad de espacios.</li>
<li>Precios incluyen todos los impuestos obligatorios para la compra de los boletos.</li>
<li>Precios sujetos a cambio sin previo aviso hasta el momento de realizar la reserva.</li>";
$TXT2=str_replace("[precio_prepago]",$PRECIO_PREPAGO,$TXT2);
$TXT2=str_replace("[dias_prepago]","25",$TXT2);
//$txt.="</p>";

return "<ul>\n".$TXT2."\n</ul>";	
}
	
function clean($html){

	return trim(preg_replace("/(\s+)/"," ",preg_replace("/(\r|\t|\n)/","",strip_tags($html))));
		
}	
	
?>