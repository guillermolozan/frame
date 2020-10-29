function $v(a){ return $(a).value; }
function $1(a){ $(a).setStyles({"display":"block"}); }
function $0(a){ $(a).setStyles({"display":"none"}); }
function $H(a,val){ $(a).innerHTML=val; }

function opcl(cls){
	$$('.ul_menus .opcl').each(function(div) { div.removeClass('open'); });
	$(cls).addClass('open'); 	
}




function over_menu(obj){

	var ee=obj.e;
	if($(ee.getProperty('rel'))){
		
	var subb=$(ee.getProperty('rel'));
	subb.inject(document.body);
	subb.setStyles({'position':'absolute','z-index':'1'});
	var granpa=ee.getParent().getParent().getParent();
	var granpadisplay=granpa.getStyle('display');
		
	granpa.setStyle('display',granpadisplay);		
	ee.addEvent('mouseover', function(){ 
		granpa.setStyle('display','block');
		if(obj.rel=='content'){ var cors=granpa.getCoordinates(); } else { var cors=ee.getCoordinates(); }			
		eval("var xx=cors."+obj.x);
		eval("var yy=cors."+obj.y);
		subb.setPosition({x:xx,y:yy-5});	
		subb.setStyles({'display':'block'}); ee.addClass('hover'); 
	});
	ee.addEvent('mouseout', function(){ subb.setStyle('display','none'); ee.removeClass('hover'); });
	subb.addEvent('mouseover', function(){ ee.fireEvent('mouseover'); granpa.fireEvent('mouseover'); });
	subb.addEvent('mouseout', function(){ ee.fireEvent('mouseout'); granpa.fireEvent('mouseout'); });
	} else { 
	
	return 
	
	}
	
}


function fechaChange(input){
	var aa=$(input+'_a').value;
	var mm=$(input+'_m').value;
	var dd=$(input+'_d').value;
	var tt=$(input+'_t').value;
	var time=(aa==''||mm==''||dd=='')?'':aa+'-'+mm+'-'+dd+' '+((tt=='')?'00':tt)+':00:00';
	$(input).value=time;
}

function input_date(id_input,id_span,fromYear,toYear,sethoras){
	var meses = new Array();
	var horas = new Array();

	meses[1]="Ene";
	meses[2]="Feb";
	meses[3]="Mar";
	meses[4]="Abr";
	meses[5]="May";
	meses[6]="Jun";
	meses[7]="Jul";
	meses[8]="Ago";
	meses[9]="Set";
	meses[10]="Oct";
	meses[11]="Nov";
	meses[12]="Dic";
	
	horas[0]="12am";
	horas[1]="1am";
	horas[2]="2am";
	horas[3]="3am";
	horas[4]="4am";
	horas[5]="5am";
	horas[6]="6am";
	horas[7]="7am";
	horas[8]="8am";
	horas[9]="9am";
	horas[10]="10am";
	horas[11]="11am";
	horas[12]="12pm";
	horas[13]="1pm";
	horas[14]="2pm";
	horas[15]="3pm";
	horas[16]="4pm";
	horas[17]="5pm";
	horas[18]="6pm";
	horas[19]="7pm";
	horas[20]="8pm";
	horas[21]="9pm";
	horas[22]="10pm";
	horas[23]="11pm";						
	
	var html = "<select id='"+id_input+"_d' class='form_input form_input_fecha' onchange='fechaChange(\""+id_input+"\")'>";
	html+= "<option></option>";
	for(var i=1; i<=31;i++){
	html+="<option value='"+ ( (i<10)?"0"+i:i) +"'>"+i+"</option>";
	}
	html+= "</select>";
	
	html+= "<select id='"+id_input+"_m' class='form_input form_input_fecha' onchange='fechaChange(\""+id_input+"\")'>";
	html+= "<option></option>";
	for(var i=1; i<=12;i++){
	html+="<option value='"+ ( (i<10)?"0"+i:i) +"'>"+meses[i]+"</option>";
	}										
	html+= "</select>";
	html+= "<select id='"+id_input+"_a' class='form_input form_input_fecha' onchange='fechaChange(\""+id_input+"\")'>";
	html+= "<option></option>";										
	for(var i=toYear; i>=fromYear;i--){
	html+="<option value='"+i+"'>"+i+"</option>";
	}										
	if(sethoras=='1'){
	html+= "</select>";
	html+= "<select id='"+id_input+"_t' class='form_input form_input_fecha' onchange='fechaChange(\""+id_input+"\")'>";
	html+= "<option></option>";										
	for(var i=0; i<24;i++){
	html+="<option value='"+ ( (i<10)?"0"+i:i) +"'>"+horas[i]+"</option>";
	}										
	html+= "</select>";	
	} else {
	html+= "<input id='"+id_input+"_t' type='hidden' />";		
	}
	html+= "<input id='"+id_input+"' type='hidden' />";
				
	$(id_span).innerHTML=html;
	
}	

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
	swfobject.embedSWF("js/open-flash-chart.swf", "my_chart","550", "380", "9.0.0", "expressInstall.swf",{"data-file":url} );
	load_html_estadistica(vurl);
}

function load_html_estadistica(vurl){			
new Request({url:'load_html_estadistica.php?'+vurl,  method:'get', onSuccess:function(ee) { 
$("load_html_estadistica").innerHTML=ee;
 } } ).send();
}

function input_date_filtro(id_input,id_span,fromYear,toYear){
	var meses = new Array();

	meses[1]="Ene";
	meses[2]="Feb";
	meses[3]="Mar";
	meses[4]="Abr";
	meses[5]="May";
	meses[6]="Jun";
	meses[7]="Jul";
	meses[8]="Ago";
	meses[9]="Set";
	meses[10]="Oct";
	meses[11]="Nov";
	meses[12]="Dic";
	
	var html = "";
	html += "<span class='filfchspan'>Desde</span>";
	html += "<select id='from_"+id_input+"_d' class='form_input form_input_fecha' onchange='fechaChangeFilter(\""+id_input+"\")'>";
	html += "<option></option>";
	for(var i=1; i<=31;i++){
	html+="<option value='"+ ( (i<10)?"0"+i:i) +"'>"+i+"</option>";
	}
	html+= "</select>";
	html+= "<select id='from_"+id_input+"_m' class='form_input form_input_fecha' onchange='fechaChangeFilter(\""+id_input+"\")'>";
	html+= "<option></option>";
	for(var i=1; i<=12;i++){
	html+="<option value='"+ ( (i<10)?"0"+i:i) +"'>"+meses[i]+"</option>";
	}										
	html+= "</select>";
	html+= "<select id='from_"+id_input+"_a' class='form_input form_input_fecha' onchange='fechaChangeFilter(\""+id_input+"\")'>";
	html+= "<option></option>";										
	for(var i=toYear; i>=fromYear;i--){
	html+="<option value='"+i+"'>"+i+"</option>";
	}
	html+= "</select>";
	html+= "<span class='filfchspan'>Hasta</span>";
	html+= "<select id='to_"+id_input+"_d' class='form_input form_input_fecha' onchange='fechaChangeFilter(\""+id_input+"\")'>";
	html+= "<option></option>";
	for(var i=1; i<=31;i++){
	html+="<option value='"+ ( (i<10)?"0"+i:i) +"'>"+i+"</option>";
	}
	html+= "</select>";
	html+= "<select id='to_"+id_input+"_m' class='form_input form_input_fecha' onchange='fechaChangeFilter(\""+id_input+"\")'>";
	html+= "<option></option>";
	for(var i=1; i<=12;i++){
	html+="<option value='"+ ( (i<10)?"0"+i:i) +"'>"+meses[i]+"</option>";
	}										
	html+= "</select>";
	html+= "<select id='to_"+id_input+"_a' class='form_input form_input_fecha' onchange='fechaChangeFilter(\""+id_input+"\")'>";
	html+= "<option></option>";										
	for(var i=toYear; i>=fromYear;i--){
	html+="<option value='"+i+"'>"+i+"</option>";
	}	
	html+= "</select>";
	html+= "<input id='filtr_"+id_input+"' type='hidden' style='width:400px;' />";
				
	$(id_span).innerHTML=html;
	
}	

function fechaChangeFilter(input){
	var aa0=$('from_'+input+'_a').value;
	var mm0=$('from_'+input+'_m').value;
	var dd0=$('from_'+input+'_d').value;
	var aa1=$('to_'+input+'_a').value;
	var mm1=$('to_'+input+'_m').value;
	var dd1=$('to_'+input+'_d').value;
	//var time=(aa0==''||mm0==''||dd0==''||aa1==''||mm1==''||dd1=='')?'':"date("+input+") between '"+aa0+"-"+mm0+"-"+dd0+"' and '"+aa1+"-"+mm1+"-"+dd1+"'";
	var time=(aa0==''||mm0==''||dd0==''||aa1==''||mm1==''||dd1=='')?'':input+"|"+aa0+"-"+mm0+"-"+dd0+"|"+aa1+"-"+mm1+"-"+dd1;

	//time=encodeURIComponent(time);
	$('filtr_'+input).value=time;
	render_filder();
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
function between(campo,query){
	var q0=new Array();
	var q1=new Array();
	var q2=new Array();
	q0=query.split('|');
	q1=q0[0].split('-');
	q2=q0[1].split('-');
	$('from_'+campo+'_d').value=q1[2];
	$('from_'+campo+'_m').value=q1[1];
	$('from_'+campo+'_a').value=q1[0];
	$('to_'+campo+'_d').value=q2[2];
	$('to_'+campo+'_m').value=q2[1];
	$('to_'+campo+'_a').value=q2[0];
}							

function cargar_combo(span,sql,value){			
if($(span+"_load_combo"))
$(span+"_load_combo").innerHTML='<option style="color:#CCC;">&nbsp;&nbsp;&nbsp;cargando opciones...</option>';
new Request({url:'cargar_combo.php?obj='+MMEE+'&s='+sql.replace("=","")+'&s2='+value+'&camp='+span,  method:'get', onSuccess:function(ee) { 
if($(span+"_load_combo"))
$(span+"_load_combo").innerHTML=ee;
 } } ).send();
}

function load_combo(span,sql,value){
	if(!$('in_'+span)) return;
	$('in_'+span).innerHTML='';	
	new Element('option',{'value':'','html':'.............'}).inject($('in_'+span), 'bottom');
	new Request({url:'load_combo.php?s='+encodeURIComponent(sql)+'&s2='+value+'&camp='+span,  method:'get', onSuccess:function(ee) { 
	var json=JSON.decode(ee,true);
	$('in_'+span).innerHTML='';	
	new Element('option',{'value':'','html':''}).inject($('in_'+span), 'bottom');
	for(var i=0;i<json.length;i++){	
		new Element('option',{
			'value'	:json[i][0],
			'html'	:json[i][1]
		}).inject($('in_'+span), 'bottom');	
	}
	$('in_'+span).value=$('in_'+span).rel;
 } } ).send(); 
}

function load_datos(sql,value,after){ 
	new Request({url:'load_datos.php?s='+encodeURIComponent(sql)+'&s2='+value,  method:'get', onSuccess:function(ee) { 
	var json=JSON.decode(ee,true);
	Object.each(json, function(value, key){ $('in_'+key).value=value; });
	//alert(sql+' * '+value+' * '+after);
	eval(value+"()");
 } } ).send(); 
}
function load_datos_fecha(sql,value){
	new Request({url:'load_datos.php?s='+encodeURIComponent(sql)+'&s2='+value,  method:'get', onSuccess:function(ee) { 
	var json=JSON.decode(ee,true);
	Object.each(json, function(value, key){ 
	$('in_'+key).value=value; 
	$('in_'+key+'_d').value=value.substring(8, 10); 
	$('in_'+key+'_m').value=value.substring(5, 7); 
	$('in_'+key+'_a').value=value.substring(0, 4); 	
	})
 } } ).send(); 
}		
		
function cargar_combo2(span,sql,value,tab){	
var opc;
new Request({url:'cargar_combo.php?obj='+MMEE+'&s='+sql.replace("=","")+'&s2='+value+'&camp='+span,  method:'get', onSuccess:function(ee){
$(span+"_load_combo").innerHTML=ee;
opc = $(span+"_load_combo").getProperty('title');
$(span+"_load_combo").removeProperty('title');
$('in_'+span).value=opc;
 } } ).send();			 
}
 
function abrir_crear(set,save){
	if($('titulo_crear')){
		if(set=='1'){
			$('bloque_content_crear').setStyles({'display':'block'});
			//load_crear();
			ax('resetear'); 
		} else {
			$('bloque_content_crear').setStyles({'display':'none'});
		}
	} else {
		load_crear();		
	}
	if($('abrir_crear')){
		$0(((set==1)?"abrir":"cerrar" )+"_crear");
		$1(((set==1)?"cerrar":"abrir" )+"_crear");	
	}
}

function abrir_stat(set,save){
	if($('titulo_stat')){
		if(set=='1'){
			$('bloque_content_stat').setStyles({'display':'block'});
			$('inner').setStyles({'display':'none'});
			$('segunda_barra_2').setStyles({'display':'none'});
			//load_crear();
		} else {
			$('bloque_content_stat').setStyles({'display':'none'});
			$('inner').setStyles({'display':'block'});
			$('segunda_barra_2').setStyles({'display':'block'});
		}
		//alert('resetear');
		//ax('resetear'); 
	} else {
		//
		load_stat();	
		$('inner').setStyles({'display':'none'});
		$('segunda_barra_2').setStyles({'display':'none'});
		//alert('load_crear');
		
	}
	if($('abrir_stat')){
		$0(((set==1)?"abrir":"cerrar" )+"_stat");
		$1(((set==1)?"cerrar":"abrir" )+"_stat");	
	}
}
		 

/* Javascript de upload de imagen */


function eliminar_img_foto(tab,camp)
{
	$1('image_'+camp+'_controles1');
	$0('image_'+camp+'_copiando');
	$1('image_'+camp+'_default');
	$('image_'+camp+'_img').src=USU_IMG_DEFAULT;
	$('form_'+camp).reset();
	$0('image_'+camp+'_img_cerrar');
	$('upload_in_'+camp).value='eliminar';
	
}
function eliminar_img_sto(tab,camp)
{	
	$1('image_'+camp+'_controles1');
	$0('image_'+camp+'_copiando');
	$1('image_'+camp+'_default');
	$('image_'+camp+'_img').src=USU_IMG_DEFAULT;
	$('form_'+camp).reset();
	$0('image_'+camp+'_img_cerrar');
	$('upload_in_'+camp).value='eliminar';
	
}
function reset_img_foto(tab,camp)
{

	$1('image_'+camp+'_controles1');
	$0('image_'+camp+'_copiando');
	$1('image_'+camp+'_default');
	$('image_'+camp+'_img').src=$('image_'+camp+'_temp').value;
	$('form_'+camp).reset();
	$0('image_'+camp+'_img_cerrar');
	$('upload_in_'+camp).value='';
	
}

function reset_img_sto(tab,camp)
{

	$1('image_'+camp+'_controles1');	
	$0('image_'+camp+'_copiando');	
	$('txt_'+camp+'_name').innerHTML='';
	//$1('image_'+camp+'_default');	alert(4);
	//$('image_'+camp+'_img').src=$('image_'+camp+'_temp').value;	alert(5);
	$('form_'+camp).reset();
	$0('image_'+camp+'_img_cerrar');
	$('upload_in_'+camp).value='';
	
}

function upload(tab,camp)
{
	$1('image_'+camp+'_controles1');
	$1('image_'+camp+'_copiando');
	$0('image_'+camp+'_default');
	$('form_'+camp).submit();
	$('error_'+camp).innerHTML='';

}

function upload_sto(tab,camp)
{
	$1('image_'+camp+'_controles1');
	$1('image_'+camp+'_copiando');
	$('form_'+camp).submit();
	$('error_'+camp).innerHTML='';

}
    
function upload_err(m,tab,camp)
{
	$1('image_'+camp+'_controles1');
	$0('image_'+camp+'_copiando');
	$1('image_'+camp+'_default');
	$('error_'+camp).innerHTML=m;
	$('form_'+camp).reset();
}

function upload_err_sto(m,tab,camp)
{
	$1('image_'+camp+'_controles1');
	$0('image_'+camp+'_copiando');
	$('error_'+camp).innerHTML=m;
	$('form_'+camp).reset();
}

function upload_terminar_sto(i,tab,camp,name)
{
	$0('image_'+camp+'_copiando');
	$('error_'+camp).innerHTML='';
	$('upload_in_'+camp).value=i;
	$('txt_'+camp+'_name').innerHTML=name;
	$0('image_'+camp+'_controles1');
	$1('image_'+camp+'_img_cerrar');
}

function upload_terminar(i,tab,camp,resized,crear_quick)
{
	//alert('error_'+camp); 
	$('error_'+camp).innerHTML='';	
	//alert('image_'+camp+'_img');
	 $('image_'+camp+'_img').src=i;
	if(resized!=null){
	if(resized==true){
	//alert('image_'+camp+'_img'); 
	$('image_'+camp+'_img').width='100';
	}
	}
	$('upload_in_'+camp).value=i;	//alert(6);
	$0('image_'+camp+'_controles1');	//alert(7);
	$1('image_'+camp+'_img_cerrar');	//alert(8);
	if(crear_quick==1){
		ax('insertar','');
	} else {
		//alert('image_'+camp+'_copiando');
		$0('image_'+camp+'_copiando');
		//alert('image_'+camp+'_default'); 
		$1('image_'+camp+'_default');			
	}
}


function render_upload(tb,campo,id,img_default){

	var id2=(id=='')?'':'_'+id;
	var html='<div style="width:auto;float:left;position:relative; ">';
	if(img_default!=USU_IMG_DEFAULT){
	html+='<a style="position:absolute;display:block;top:3px;right:10px;font-weight:bold;color:red;background-color:#FFF;padding:0 1px;"  onclick="eliminar_img_foto(\''+tb+'\',\''+campo+id2+'\');return false;"  title="eliminar imágen">X</a>';
	}
	html+='<input type="hidden" id="upload_in_'+campo+id2+'" />'+
	'<input type="hidden" id="image_'+campo+id2+'_temp"  value="'+img_default+'" />'+
	'<form style="float:left;height:auto;" id="form_'+campo+id2+'" action="script_upload.php?obj='+MMEE+'&tb='+tb+'&camp='+campo+id2+'&objcam='+campo+'" enctype="multipart/form-data" method="post" target="iframe_upload" >'+
		'<table id="image_'+campo+id2+'_default" cellpadding="0" border="0" cellspacing="0"  class="upload_table1">'+
		'<tr><td align="center" valign="middle" class="upload_table2">'+
			'<img src="'+img_default+'" id="image_'+campo+id2+'_img" class="upload_img_default"/>'+
		'</td></tr></table>'+
		'<img src="img/cerrarfoto.gif" id="image_'+campo+id2+'_img_cerrar" class="upload_img_cerrar" '+
		 'style="display:none;" onclick="reset_img_foto(\''+tb+'\',\''+campo+id2+'\');" title="cerrar"/>'+
		'<span  class="upload_copiando" style=" display:none;" id="image_'+campo+id2+'_copiando">'+
			'<span class="upload_preview">vista previa</span><br />'+
			'<img src="img/load.gif" />'+
		'</span>'+
		'<div class="upload_controles1" id="image_'+campo+id2+'_controles1">'+
			'<div id="error_'+campo+id2+'" class="upload_error"></div>'+
			'<div class="input_file_content">'+
			'<input style="'+styleinfi+'" type="file" name="v_file_'+campo+id2+'"   '+
			'onchange="if(this.value!=\'\') upload(\''+tb+'\',\''+campo+id2+'\'); " '+
			'class="upload_input_file"  autocomplete="off" />'+
			'</div>'+						
		'</div>'+
	'</form>'+
	'<iframe width="300" height="300" frameborder="0" style="position: absolute; display:none;" name="iframe_upload" id="iframe_upload"></iframe>';
	html+='</div>'
	return html;
	
}

function render_upload_sto(tb,campo,id,name){

	var id2=(id=='')?'':'_'+id;
	var html='<div style="width:auto;float:left;position:relative;">';
	if(name!=USU_IMG_DEFAULT && name!=''){	
	html+='<a style="position:absolute;display:block;top:3px;right:10px;font-weight:bold;color:red;background-color:#FFF;padding:0 1px;"  onclick="eliminar_img_sto(\''+tb+'\',\''+campo+id2+'\');return false;"  title="eliminar">X</a>';
	}
	html+='<input type="hidden" id="upload_in_'+campo+id2+'" />'+
	'<span id="txt_'+campo+id2+'_name" value="'+name+'" style="float:left;" ></span>'+
	'<form style="float:left;height:auto;" id="form_'+campo+id2+'" action="script_upload_sto.php?obj='+MMEE+'&tb='+tb+'&camp='+campo+id2+'&objcam='+campo+'" enctype="multipart/form-data" method="post" target="iframe_upload" >';
		/*html+='<table id="image_'+campo+id2+'_default" cellpadding="0" border="0" cellspacing="0"  class="upload_table1">'+
		'<tr><td align="center" valign="middle" class="upload_table2">'+
			'<img src="'+img_default+'" id="image_'+campo+id2+'_img" class="upload_img_default"/>'+
		'</td></tr></table>';*/
		html+='<img src="img/cerrarfoto.gif" id="image_'+campo+id2+'_img_cerrar" class="upload_img_cerrar" '+
		 'style="display:none;" onclick="reset_img_sto(\''+tb+'\',\''+campo+id2+'\');" title="cerrar"/>'+
		'<span  class="upload_copiando2" style=" display:none;" id="image_'+campo+id2+'_copiando">'+
			'<img src="img/load2.gif" />'+
		'</span>'+
		'<span class="upload_controles1" id="image_'+campo+id2+'_controles1">'+
			'<span class="input_file_content">'+
			'<input style="margin-top:0px;'+styleinfi+'" type="file" name="v_file_'+campo+id2+'"   '+
			'onchange="if(this.value!=\'\') upload_sto(\''+tb+'\',\''+campo+id2+'\'); " '+
			'class="upload_input_file"  autocomplete="off" />'+
			'<span id="error_'+campo+id2+'" class="upload_error"></span>'+
			'</span>'+						
		'</span>'+
	'</form>'+
	'<iframe width="300" height="300" frameborder="0" style="position: absolute; display:none;" name="iframe_upload" id="iframe_upload"></iframe>';
	html+='</div>'
	return html;
	
}
								
 /* Fin de Javascript de upload de imagen */

	function show_error(a){
		$('error_creacion').innerHTML=errores[a];	
	}
	
	function show_error_texto(txt){
		$('error_creacion').innerHTML=txt;
	}	
	
	function show_error_alert(a){
		alert(errores[a]);
	}
	
	function show_error_alert_text(text){
		alert(text);
	}	
		
	function hide_error(){
		$('error_creacion').innerHTML='<span style="color:#000000;">los campos con * son obligatorios</span>';
	}		 
	
	
function set_filas(tb,tbf,val){

	var eee=0;	 

    $$('.braz').each(function(ele) { 	
		$(ele).setStyles({'border':'1px solid #CCC'}); 
		$(ele).removeClass('brasselected');		
	});	
	
    $$('.bl').each(function(blo) { 
		$(blo).removeClass('modificador_linea');					
		$(blo).removeClass('modificador');				
		$(blo).removeClass('modificador_grilla');
	});	

	$("set_filas_"+val).setStyles({'border':'1px solid #000'}); 
	$("set_filas_"+val).addClass('brasselected'); 
						
	if(val=='1'){
		
		$$('.bl').each(function(blo) { 
			$("exl_"+blo.get('alt')).setStyles({'display':'none'}); 
			$("cll_"+blo.get('alt')).setStyles({'display':''}); 				
		});								
		
	} else if(val=='2'){
									
      	$$('.bl').each(function(blo){
			$("exl_"+blo.get('alt')).setStyles({'display':'none'}); 
			$("cll_"+blo.get('alt')).setStyles({'display':''}); 	
			$(blo).addClass('modificador');				
		});
		
	} else if(val=='3'){	
									
      	$$('.bl').each(function(blo){
			$("exl_"+blo.get('alt')).setStyles({'display':''}); 
			$("cll_"+blo.get('alt')).setStyles({'display':'none'}); 				
			$(blo).addClass('modificador_linea');
		});
			
	} else if(val=='4'){
		
		$$('.bl').each(function(blo) { 
			$("exl_"+blo.get('alt')).setStyles({'display':'none'}); 
			$("cll_"+blo.get('alt')).setStyles({'display':''}); 				
			$(blo).addClass('modificador_grilla');
		});								
		
	}
	
	Cookie.write(tb+'_colap', val, {duration: 10});
	new Request({url:"ajax_change_cookie.php?var="+tb+'_colap'+"&val="+val+"&ajax=1", method:'get', onSuccess:function(ee) { 	
//	$1( ( (set==1)?"cerrar":"abrir" )+"_crear");	
	 } } ).send();	


}
	
	
function procesar_proyecto(){
	
	datos = { 
				'indice'	: 'jsonproy',
				'json'		: $('jjjsonproy').value
			};		
	
	new Request({url:"modificar_objeto.php", method:'post', data:datos, onSuccess: function(eee){
		if(eee.trim()!='')
			alert(eee);
		else	
				location.href='maquina.php?rn='+Math.random()+'#eth';
	
	} } ).send();
	
}	

function loadinfopage(){
if($('pagespan') && $('pagetime') && $('pagesize')){
	$('pagespan').innerHTML=$('pagesize').value+'Kb generados en '+$('pagetime').value+'s.';
}
}

function procesar_recargar(urll){
//window.open(((Browser.ie)?'../':'')+urll,'proceso','width=850,height=450,scrollbars=yes,menubar=yes,toolbar=no,location=no,directories=no,resizable=no,top=100,left=140');	
window.open(((Browser.ie)?'../':'')+urll,'proceso','width=950,height=450,scrollbars=yes,resizable=no,top=100,left=140');		
}


function eliminar_objeto(obj,dis){

	dis.getParent().getParent().dispose();	
	datos = { 
				me			: obj,
				valor		: 'destroyobjeto'
			};	
	new Request({url:"modificar_objeto.php", method:'post', data:datos, onSuccess: function(eee){
		if(eee.trim()!=''){
			alert(eee);
		} else	{
			dis.getParent().getParent().dispose();
		}
	} } ).send();

}

function eliminar(obj,dis,coman){

	dis.getParent().getParent().dispose();	
	datos = { 
				me			: obj,
				valor		: coman
			};	
	new Request({url:"modificar_objeto.php", method:'post', data:datos, onSuccess: function(eee){
		if(eee.trim()!=''){
			alert(eee);
		} else	{
			dis.getParent().getParent().dispose();
		}
	} } ).send();

}


function setqc(clas,set){
	if($('quickcontrols')){
	if(set==1){
		$('quickcontrols').addClass(clas);
		$('quickcontrols').addClass('quickcontrolsHover');	
	} else {
		$('quickcontrols').removeClass(clas);	
	}	
	}
}
function cancelar_edit2(me,indice,dis){
var parent=$(dis).getParent();	
	parent.removeProperty('rel');
	parent.innerHTML=$(me+'_'+indice).getProperty('rel');	
}
function edit2(me,indice,dis){
	if($(dis).getProperty('rel')!='edit'){
		$(dis).setProperty('rel','edit');
		$(dis).innerHTML='<input id="'+me+'_'+indice+'" type="text" value="'+dis.innerHTML+'" rel="'+dis.innerHTML+'"  onkeypress="if(event.keyCode==13){ modificar_dato_valor2(\''+me+'\',\''+indice+'\',this); } if(event.keyCode==27){ cancelar_edit2(\''+me+'\',\''+indice+'\',this); }" />';
		$(me+'_'+indice).focus();
	} else {
		/*
		$(dis).removeProperty('rel');
		$(dis).innerHTML=$(me+'_'+indice).getProperty('rel');
		*/
	}
}
function modificar_dato_valor2(me,indice,dis){	
var parent=$(dis).getParent();
datos = {
	me			: me,
	indice		: indice,
	valor		: dis.value
};	
new Request({url:"modificar_objeto.php", method:'post', data:datos, onSuccess: function(eee){
	parent.removeProperty('rel');
	parent.innerHTML=dis.value;
} } ).send();	
}

Element.Events.hashchange = {
    onAdd: function(){
        var hash = self.location.hash;

        var hashchange = function(){
            if (hash == self.location.hash) return;
            else hash = self.location.hash;

            var value = (hash.indexOf('#') == 0 ? hash.substr(1) : hash);
            window.fireEvent('hashchange', value);
            document.fireEvent('hashchange', value);
        };

        if ("onhashchange" in window){
            window.onhashchange = hashchange;
        } else {
            hashchange.periodical(50);
        }
    }
};

function send_crear(id,tbl,lrp,lrp2){
	var iid; var iida=new Array();
	var ht; var hta=new Array(); var hti=0;
	var datos={}
    $$('.'+tbl+'-_'+id).each(function(ele) { 	
		iid=ele.id;	
		iida=iid.split('-_'); 
		eval("datos."+iida[2]+"=ele.value");
	});
	
	new Request({url:"ajax_sql.php?f=insert&debug=0", method:'post', data:datos, onSuccess:function(ee) { 
	var json=eval("(" + ee + ")");
	if(json.success=='1'){
	//alert(ee);
	/*
	if(Recargar=='ajax'){
	//ax("resetear");*/
	//alert(lrp);
	ax(lrp,lrp2,$('pagina').value);
	/*
	$('bloque_content_crear').setStyles({'opacity':'1'});
	} else if(Recargar=='sin_ajax'){
	location.reload();
	}
	*/
	} /*else if(json.success=='0'){
	show_error_texto(json.error);
	$('in_submit').value='crear <?php echo $datos_tabla['nombre_singular']?>';
	$('in_submit').disabled=false;
	$('bloque_content_crear').setStyles({'opacity':'1'});
	}
	*/
	} } ).send();
	
}
function changelogin(u,p){
var datos={
'nombre':u,
'password':p,
'v_o':'USUARIOS_ACCESO'
}
new Request({url:"ajax_sql.php?f=login&debug=0&forge=1", method:'post', data:datos, onSuccess:function(ee) { 
//var json=eval("(" + ee + ")");
location.reload();
} } ).send();
}

function crearforeig(t){
var url='formulario.php?OB='+o+'&ran=1&proceso=&';
var datos={
'nombre':u,
'password':p,
'v_o':'USUARIOS_ACCESO'
}
new Request({url:"ajax_sql.php?f=login&debug=0&forge=1", method:'get', data:datos, onSuccess:function(ee) { 
//var json=eval("(" + ee + ")");
location.reload();
} } ).send();
}
function load_directlink_filtro_inp(campo,tabla){
new Meio.Autocomplete.Select('filtr_'+campo+'_dl','load_json.php?s='+campo+','+campo+'|'+tabla+'|', {minChars:1,selectOnTab :true,maxVisibleItems:12,requestOptions: {'method':'get'},valueField: $('filtr_'+campo),valueFilter: function(data){$('filtr_'+campo).value=campo+'%3D'+data.i;render_filder();},syncName: false,filter: {type: 'contains',path: 'v'},});
}
function load_directlink_filtro_com(campo,id,nombre,tabla,where){
new Meio.Autocomplete.Select('filtr_'+campo+'_dl','load_json.php?s='+id+','+nombre+'|'+tabla+'|'+where, {minChars:1,selectOnTab :true,maxVisibleItems:12,requestOptions: {'method':'get'},valueField: $('filtr_'+campo),valueFilter: function(data){$('filtr_'+campo).value=campo+'%3D'+data.i;render_filder();},syncName: false,filter: {type: 'contains',path: 'v'},});
}


function alljsloads(){
	$$('.jsloads').each(function(ele) { eval(ele.value); });
}