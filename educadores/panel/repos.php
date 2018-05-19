<?php
$LoadWithoutSession='1';
include("objeto.php");
//prin($_GET);
$DIR=($_GET['dir']!='')?$_GET['dir']."/":'';
?>
<ul class="formulario fst">
	<?php

	?>
	<div class="sv" id="load" style="display: none; top: -30px; left: 0px;">cargando...</div>
	<?php
	?>
	<h1 class="titulo_formulario" id="titulo_repos">
		<?php
		?>
		Reportes
	</h1>
	<?php

	$reportes=explode("&",$datos_tabla['repos']);

	foreach($objeto_tabla[$_GET['OB']]['campos'] as $can){
		if($can['queries']=='1'){
			$qus[]=$can;
		}
	}

	//$html_filter='<input type="hidden" id="obfs" value="'.$_GET['OB'].'" >';
	//$html_filter.='<input type="hidden" id="filtr_fs_orderby" value="" >';

	$rpt=0;
	$defaultfilter='';
	foreach($reportes as $rt=>$reporte)
	{
			$rrrr=explode("=",$reporte);
			$html_filter.= '<li>
			<input name="report_file" class="option_report_file rad" type="radio" id="rp_'.$rt.'" value="'.$rrrr['0'].'"  '.
			'onchange="if(this.checked){ render_filderRP({FECHA},this); } " '. ( ($rpt==0 and sizeof($reportes)==1)?'checked':'').' >
			<label for="rp_'.$rt.'" class="alink">'.$rrrr['1'].'</label>
			</li>';
			if($rpt==0) $defaultfilter='rp_'.$rt;
			$rpt++;
	}

	foreach($qus as $querie){
		//if(in_array($querie['tipo'],array('fch','fcr'))){
		if(in_array($querie['tipo'],array('fcr'))){

			$Fechaaa[]=$querie['campo'];

			$first=dato('min('.$querie['campo'].')',$tbl,"where ".$querie['campo']."!=0",0);
			$first=(!$first)?date("Y-m-d"):$first;
			//$last =dato($querie['campo'],$tbl,"where 1 order by ".$querie['campo']." desc limit 0,1");
			$last=dato('max('.$querie['campo'].')',$tbl,"where ".$querie['campo']."!=0",0);
			$last=(!$last)?date("Y-m-d"):$last;
			//prin($first);

			$FromYear = substr($first,0,4);
			$FromMonth = substr($first,5,2);

			//$ToYear = substr($last,0,4);
			$ToYear = date("Y");

			//prin($FiL[$querie['campo']]);

			$uno=explode("between",$FiL[$querie['campo']]);
			$dos=explode("and",$uno[1]);
			$ff=str_replace("'","",trim($dos['0']));
			$tt=str_replace("'","",trim($dos['1']));
			$fftt=$ff."|".$tt;

			$html_filter_fecha="<div style='clear:left;'>";

			$html_filter_fecha.="<select ".(($FiL[$querie['campo']]!='')?"class='inuse'":"")."  onchange=\"betweenST('".$querie['campo']."',this.value);fechaChangeFilterST('".$querie['campo']."');\">";

			$opciones_fechas=opciones_fechas($querie);

			foreach($opciones_fechas as $of){
				$html_filter_fecha.="<option value='".$of['value']."' ".(($of['value']==$fftt)?'selected':'')." ".(($of['class']!='')?"class='".$of['class']."'":'').">".$of['label']."</option>";
			}

			/*
			if(0){

				$html_filter_fecha.="<option value='' class='empty'>".$querie['label']."</option>";
				//DATE(myDate) = DATE(NOW())"Y-m-d H:i:s"
				$fron=date("Y-m-d");
				$ton=date("Y-m-d");
				$quer2=$fron."|".$ton;
				$html_filter_fecha.="<option ".(($quer2==$fftt)?'selected':'')." value=\"".$quer2."\">Hoy</option>";

				$fron=date("Y-m-d",strtotime("-".(date("N")-1)." days"));
				$ton=date("Y-m-d",strtotime("+".( 7 - date("N"))." days"));
				$quer2=$fron."|".$ton;
				$html_filter_fecha.="<option ".(($quer2==$fftt)?'selected':'')." value=\"".$quer2."\">Esta Semana</option>";

				$yy=date("Y");$mm=date("m");
				for($i=0;$i<12+date("m");$i++){
					if($mm==0){
						$yy=$yy-1; $mm=12;
					}
					$ym[]="$yy-".sprintf("%02d",$mm);
					$mm=$mm-1;
				}

				foreach($ym as $my=>$mmy){
					$tt=date("t",date($mmy."-01"));
					$fron=date($mmy."-01");
					$ton =date($mmy."-$tt");
					$quer2=$fron."|".$ton;
					list($yeamy,$monmy)=explode("-",$mmy);
					$mos=$Array_Meses[$monmy*1]; $nmons=strlen($mos);
					$mmyy=ucfirst($mos).str_repeat("&nbsp;",9-$nmons);
					$mmyy.=" ".$yeamy;
					$html_filter_fecha.="<option ".(($quer2==$fftt)?'selected':'')." value=\"".$quer2."\">".$mmyy.(($mmy==date("Y-m"))?" Este Mes":"")."</option>";
				}

				for($ii=$ToYear;$ii>=$FromYear;$ii--){
					$fron=date($ii."-01-01");
					$ton =date($ii."-12-31");
					$quer2=$fron."|".$ton;
					$html_filter_fecha.="<option class='filyer' ".(($quer2==$fftt)?'selected':'')." value=\"".$quer2."\">".$ii.(($ii==date("Y"))?" Este Año":"")."</option>";
				}

			}
			*/

			$html_filter_fecha.="</select>";


			$html_filter_fecha.=input_date_filtroST('fs_'.$querie['campo'],$FromYear,$ToYear,($FiL[$querie['campo']])?$FiL[$querie['campo']]:"date(fecha_consulta) between '".substr($first,0,10)."' and '".substr($last,0,10)."'");

			$html_filter_fecha.="</div>";
			$terfilSTFECHA=$querie['campo'];

		}
	}

	?>
	<div class='filters' style='width: 100%;'>
		<div style='padding: 1px 0 0 20px;'>
			<?php echo $html_filter_fecha; ?>
		</div>
	</div>


	<ul style='width: 174px; float: left; margin-top: 10px; <?php if(sizeof($reportes)==1){ echo "display:none;"; } ?>'>
		<?php
		echo str_replace("{FECHA}","'".$terfilSTFECHA."'",$html_filter);
		//echo $html_filter;
		?>
	</ul>

	<div style='margin-left: 5px; min-height: 380px; padding: 10px;' id="html_reporte"><?php
		/*
		$rrrr=explode("=",$reportes['0']);
		$_GET['f']=$Fechaaa['0']."||";
		$_GET['file']=$rrrr['0'];
		$_GET['ajax']=0;
		//echo getcwd();
		include("load_html_reportes.php");
		*/
	?></div>

</ul>
<script type="text/javascript">
	<?php if($defaultfilter!='' and  0){ ?> $('<?php echo $defaultfilter; ?>').fireEvent('checked'); <?php } ?>
</script>
<style>
.bloque_content_stat {
	display: block;
}
</style>
<?php
if(isset($_GET['ran']) and $_GET['ran']!=''){
	include("lib/compresionFinal.php");	/*para Content-Encoding*/
}

