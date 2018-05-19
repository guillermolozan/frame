<?php //á
//prin($PAGINA);

$THIS=$PARAMS['this'];

$PAGINA=$OBJECT[$THIS];

?>
<div class="cuadro <?php 
    web_selector_control($SELECTED,$PARAMS['classStyle'],"bloques");
    ?>" ><?php web_render_esquinas(1,4);?>

    <div class="barra_arriba">
    <?php //web_render_item_borde('bors-b',1,2);?>        
    <?php echo "Estadística de Consultas"; ?>
    </div>
    <div class="div_borde div_inner">
	<div id='idstat'></div>

	<div class='clear'></div>
    </div>

</div>
<script>
window.addEvent('domready',function(){
new Request({url:"panel/estadistica.php?OB=CONSULTAS_ITEMS&ran=1&proceso=&dir=panel",  method:'get', onSuccess:function(ee) { 
$('idstat').innerHTML=ee;
}}).send();
});


function fechaChangeFilterST(input){
	input=input.replace("fs_","");
	var aa0=$('from_fs_'+input+'_a').value;
	var mm0=$('from_fs_'+input+'_m').value;
	var dd0=$('from_fs_'+input+'_d').value;
	var aa1=$('to_fs_'+input+'_a').value;
	var mm1=$('to_fs_'+input+'_m').value;
	var dd1=$('to_fs_'+input+'_d').value;
	var time=(aa0==''||mm0==''||dd0==''||aa1==''||mm1==''||dd1=='')?'':input+"|"+aa0+"-"+mm0+"-"+dd0+"|"+aa1+"-"+mm1+"-"+dd1;
	$('filtr_fs_'+input).value=time;
	render_filderST(input);
}

function render_filderST(input){
	var url='b=';
	var vurl;
	url+=''+$('obfs').value;
	url+='|'+$('filtr_fs_orderby').value+'|';
	if($('filtr_fs_'+input)){ url+=$('filtr_fs_'+input).value; }
	vurl=url;
	url="load_estadistica.php?"+url;
	swfobject.embedSWF("panel/js/open-flash-chart.swf", "my_chart","550", "380", "9.0.0", "expressInstall.swf",{"data-file":'panel/'+url} );
	load_html_estadistica(vurl);
}

function betweenST(campo,query){
	var q0=new Array();
	var q1=new Array();
	var q2=new Array();
	q0=query.split('|');
	q1=q0[0].split('-');
	q2=q0[1].split('-');
	$('from_fs_'+campo+'_d').value=q1[2];
	$('from_fs_'+campo+'_m').value=q1[1];
	$('from_fs_'+campo+'_a').value=q1[0];
	$('to_fs_'+campo+'_d').value=q2[2];
	$('to_fs_'+campo+'_m').value=q2[1];
	$('to_fs_'+campo+'_a').value=q2[0];
}	

function load_html_estadistica(vurl){			
new Request({url:'panel/load_html_estadistica.php?'+vurl,  method:'get', onSuccess:function(ee) { 
$("load_html_estadistica").innerHTML=ee;
 } } ).send();
}

</script>
<style>

#load_html_estadistica { float:left; }
#load_html_estadistica .reporte tr { border:1px solid #ccc; }
#load_html_estadistica .reporte { padding:1px 3px; }
#load_html_estadistica .reporte td.nombre { font-weight: bold; max-width:300px;
    padding: 0 30px 0 10px;
    text-transform: uppercase; font-family:10px; }
#load_html_estadistica .reporte td.valor { padding: 0 10px 0 10px; font-family:10px;}
#load_html_estadistica .reporte td.porcentaje	 { padding: 0 10px 0 10px; color:#999999; font-family:10px;}

.filters { float:left; } 
.filters select { float:left; margin:0 -1px 5px 0px; border:1px solid #ccc; font-size:11px; text-align:justify; color:#999; max-width:140px; font-family:Lucida Console,Monaco,monospace;}
.filters select option { font-weight:normal; background-color:#FFF; color:#000;}
.filters select option.empty { color:#999999; }
.filters select option.filyer { font-weight:bold; }
.inuse { color:#000 !important; font-weight:bold !important; border:1px solid #333 !important; background-color:#FBECB2 !important; } 

.filfchspan { float:left; padding:2px 5px 0 15px; font-weight:bold; text-transform:uppercase; }

</style>