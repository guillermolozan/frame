function $v(a){ return $(a).value; }
function $1(a){ $(a).style.display=''; }
function $0(a){ $(a).style.display='none'; }
function $01(a){ if($(a).style.display=='none') $1(a); else $0(a); }

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
		subb.setPosition({x:xx,y:yy});	
		subb.setStyles({'display':'block'}); ee.addClass('hover'); 
	});
	ee.addEvent('mouseout', function(){ subb.setStyle('display','none'); ee.removeClass('hover'); });
	subb.addEvent('mouseover', function(){ ee.fireEvent('mouseover'); granpa.fireEvent('mouseover'); });
	subb.addEvent('mouseout', function(){ ee.fireEvent('mouseout'); granpa.fireEvent('mouseout'); });
	} else { 
	
	return 
	
	}
	
}
	
function currency(value){
	
	var va=value.toFloat();
	if(va<1000){
	
	return MONEDA+va.toFixed(2);
		
	} else {
	
	var int=va.toFloat(0);
//	alert(int);
	var decimal=((va-int).toFixed(2)).toString();
	var parts = new Array();
	parts=decimal.split(".");
	var partedecimal=parts[1];
		
	var entero1=va.toFixed();
	var punto=(entero1/1000).toFixed(3);
	var coma=punto.replace(".",",");
	return MONEDA+coma+'.'+partedecimal;
	
	}
		
}

function switch_tab(name,tab){

	$$(".area_tab_"+name).setStyles({'display':'none'});
	$("area_tab_"+name+"_"+tab).setStyles({'display':''});
	
}

function show_tab(tab){

	$$(".tabs li").removeClass('selected');
	$("tab_"+tab).addClass('selected');
	$$(".area_tab").setStyles({'display':'none'});
	$("area_tab_"+tab).setStyles({'display':''});
	
}

function ShowTab(menu,num){
	$$("#"+menu+" li").removeClass('selected');
	$(menu+"_"+num).addClass('selected');
	$$("."+menu+"_area_tab").setStyles({'display':'none'});
	if($(menu+"_area_tab_"+num)){
		$(menu+"_area_tab_"+num).setStyles({'display':'block'});
	}	
}

function onsubmit_buscar(){

	for(var i=0;i<OBJ_CATEGORIAS.length;i++){
	//alert($('formulario_buscar').value + " - "+OBJ_CATEGORIAS[i].nombre);
		if($('formulario_buscar').value.trim()==OBJ_CATEGORIAS[i].nombre.trim()){
			location.href=OBJ_CATEGORIAS[i].link;		
			return;
		}
	}
		
	if($('formulario_buscar').value!=''){
		location.href=LINK_BUSQUEDA+$('formulario_buscar').value;
	}	

}

function carrito(obj,main,precio){

$1('actualizar_carrito');	
if($('carrito_contenido')){ $('carrito_contenido').setStyles({opacity:'0.5'}); }
new Request({url:"ajax.php?mode=carrito", method:'post', data:{'accion':obj.accion,'id':obj.id,'c':obj.c}, onSuccess:function(ee) {
	var json=JSON.decode(ee,true);
	json_carrito=json;
	render_carrito(json_carrito,{main:main,precio:precio});
	$0('actualizar_carrito');	
	
	}}).send();
	
}

function carrito_gastosdeenvio(id){
	
	var id_distrito=$(id).value;
	if($(id+'_gastos')){ $0(id+'_gastos'); }
	if(id_distrito!=''){
	new Request({url:"ajax.php?mode=get", method:'get', data:{'get':'shipping','id':id_distrito}, onSuccess:function(ee) {
		var json=JSON.decode(ee,true);

		new Element('small', {'id':id+'_gastos', 'html': 'El costo de envío para el distrito de <b style="text-decoration:underline;">'+json.n+'</b> es : '+MONEDA+json.s+' el cual ha sido agregado a tu pedido'}).inject($(id), 'after');
		
	$('pedido_gastos_envio').value=json.s;
	
	render_carrito(json_carrito,{main:'1',controles:'1',precio:'1',enviar:'0',gastos:{i:'Gastos de Envio',m:json.s}},0,0);

	}}).send();	
	} else {

	$('pedido_gastos_envio').value='';
	
	render_carrito(json_carrito,{main:'1',controles:'1',precio:'1',enviar:'0'},0,0);
		
	}
}


function intro(){
	
var Height=1105;
var Width=892;

var Intro = new Element('div', {
    'id': 'intro',
	'styles':{
			top:0,
			left:0, 
			width:Width, 
			height:Height,
			display:'none'
			}
}).inject($('div_allcontent'), 'top');

/*
var IntroDivClose= new Element('div', {
    'id': 'intro_div_close',
	'styles':{
			'width':'802px', 
			'height':Height,
			'position':'absolute'
//			'margin-top':'0px'
	},
    'events': {
        'click': function(){
            close_intro();
        }
    }	
}).inject(Intro, 'top');
*/

//alert($('intro').height);
var IntroContent = new Element('div', {
    'id': 'intro_content',
	'styles':{
			'width':'802px', 
			'padding':'5px 45px',
			'height':Height,
			'margin-top':'-'+Height+'px'
//			'margin-top':'0px'
	}	
}).inject(Intro, 'top');



var IntroDiv= new Element('div', {
    'id': 'intro_div'
    }
).inject(IntroContent, 'top');

/*
var IntroClose= new Element('a', {
    'id': 'intro_close',
	'html':'cerrar intro',
    'events': {
        'click': function(){
            close_intro();
        }
    }
}).inject(IntroContent, 'top');
*/

var IntroOpen= new Element('a', {
    'id': 'intro_open',
	'html':'ver intro',
    'events': {
        'click': function(){
            open_intro();
        }
    }
}).inject($('div_menu'), 'top');


}

function open_intro(){
	
	$("intro_div").innerHTML="<div id='swf_intro_div'></div>";
	swfobject.embedSWF("swf/intro.swf", "swf_intro_div", "800", "600", "9.0.0", "expressInstall.swf",
	{},{ allowscriptaccess:"always", allowfullscreen:"true", wmode:"transparent" },
	{wmode:"transparent"}
	);	

	var myEffect = new Fx.Morph($('intro_content'),
								  { 
									  duration: 'long'
									  ,'onStart':function(){ 
									  if($('swf_div_home_publicidad_content'))$('swf_div_home_publicidad_content').style.visibility='hidden';
									  $('intro').style.display=''; 
									  } 
									  ,'onComplete':function(){
									  //if($('div_home_publicidad_content'))$('div_home_publicidad_content').style.visibility='hidden';												
									  /*
									  $('swf_intro_div').addEvent('click',function(){
								      close_intro();											  
									  });
									  */
									  
									  }
								  }
	  ).start({
		'margin-top':0
		,'opacity':1
	});
	 
}

function close_intro(){

	var myEffect = new Fx.Morph($('intro_content')
								  ,{ duration: 'long',
								  			'onStart':function(){
											$('div_contenedor').style.display='block';
											},
								  			'onComplete':function(){ 
											$('intro').style.display='none'; 
											$('intro_div').innerHTML=''; 											
											
	if($('swf_div_home_publicidad_content'))$('swf_div_home_publicidad_content').style.visibility='visible';
	
	if($('div_home_publicidad_content'))
	$('div_home_publicidad_content').innerHTML='<div id="swf_div_home_publicidad_content"></div>';
	swfobject.embedSWF("swf/banner.swf", "swf_div_home_publicidad_content", "285", "310", "9.0.0", "expressInstall.swf",
	{},
	{
	allowscriptaccess:"always",
	allowfullscreen:"true",
	wmode:"transparent"
	},
	{wmode:"transparent"}
	);
	
	
			} }
											
	  ).start({
		'margin-top':'-'+$('intro').style.height
		,'opacity':0.1
	});
	 
}

function get_modelos(nom,id){
	
	$(nom+'_modelo').innerHTML='';
	new Element('option', {'value': '','html': 'Elige Modelo'}).inject($(nom+'_modelo'), 'bottom');
	
	if(id==''){

	$(nom+'_modelo').set('disabled', 'active');
	
	} else {
		
		new Request({url:"ajax.php?mode=get", method:'get', data:{'get':'modelos','id':id}, onSuccess:function(ee) {

		var json=JSON.decode(ee,true);
		
		for(var i=0;i<json.length;i++){
		new Element('option', {'value': json[i].i,'html': json[i].n}).inject($(nom+'_modelo'), 'bottom');
		}
		
		if(json.length==0){ $(nom+'_modelo').set('disabled', 'active'); } else {	$(nom+'_modelo').erase('disabled');	}
		
		}}).send();
	
	}
	

}

function get_subcategorias(nom,id){
	
	$(nom+'_id_subgrupo').innerHTML='';
	new Element('option', {'value': '','html': 'Elige Sub-categoría'}).inject($(nom+'_id_subgrupo'), 'bottom');
	
	if(id==''){

	$(nom+'_subcategoria').set('disabled', 'active');
	
	} else {
		
		new Request({url:"ajax.php?mode=get", method:'get', data:{'get':'subcategorias','id':id}, onSuccess:function(ee) {

		var json=JSON.decode(ee,true);
		
		for(var i=0;i<json.length;i++){
		new Element('option', {'value': json[i].i,'html': json[i].n}).inject($(nom+'_id_subgrupo'), 'bottom');
		}
		
		if(json.length==0){ $(nom+'_id_subgrupo').set('disabled', 'active'); } else {	$(nom+'_id_subgrupo').erase('disabled');	}
		
		}}).send();
	
	}
	

}

function get_provincias(idnom,id){
	
	var rel=$(idnom).getProperty('rel');
	$(rel).innerHTML='';
	new Element('option', {'value': '','html': 'Provincia'}).inject($(rel), 'bottom');
		
	if(id==''){
	
	$(rel).set('disabled', 'active');
	
	} else {
		
		new Request({url:"ajax.php?mode=get", method:'get', data:{'get':'provincias','id':id}, onSuccess:function(ee) {
		
		var json=JSON.decode(ee,true);
		
		for(var i=0;i<json.length;i++){
		new Element('option', {'value': json[i].i,'html': json[i].n}).inject($(rel), 'bottom');
		}
		if(json.length==0){ $(rel).set('disabled', 'active');	} else {	$(rel).erase('disabled');	}
	
		}}).send();
	
	}

	//get_distritos(idnom.replace('provincia','distrito'),'');
	
}

function get_distritos(idnom,id){

	var rel=$(idnom).getProperty('rel');
	$(rel).innerHTML='';
	new Element('option', {'value': '','html': 'Distrito'}).inject($(rel), 'bottom');
	
	if(id==''){

	$(rel).set('disabled', 'active');
	
	} else {
		
	new Request({url:"ajax.php?mode=get", method:'get', data:{'get':'distritos','id':id}, onSuccess:function(ee) {
	
	var json=JSON.decode(ee,true);
		
	for(var i=0;i<json.length;i++){
	new Element('option', {'value': json[i].i,'html': json[i].n}).inject($(rel), 'bottom');
	}
	if(json.length==0){ $(rel).set('disabled', 'active');	} else {	$(rel).erase('disabled');	}
	
	}}).send();
	
	}

}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function eliminar_img_foto(ran)
{
	$1('image_'+ran+'_controles');
	$0('image_'+ran+'_copiando');
	$1('image_'+ran+'_default');
	$('image_'+ran+'_img').src='';
	$('form_'+ran).reset();
	$0('image_'+ran+'_img_cerrar');
	//$().value='eliminar';
	
}

function reset_img_foto(ran)
{
	
	$1('image_'+ran+'_controles');
	$0('image_'+ran+'_copiando');
	$0('image_'+ran+'_default');
	$('image_'+ran+'_img').src='';	
//	$('image_'+ran+'_img').src=$('image_'+ran+'_temp').value;
	$('form_'+ran).reset();
	$0('image_'+ran+'_img_cerrar');
	$($('target_'+ran).value).value='';
	$1('image_'+ran+'_men_1');
	
}

function upload(ran)
{
	$1('image_'+ran+'_controles');
	$1('image_'+ran+'_copiando');
	$0('image_'+ran+'_default');
	$('form_'+ran).submit();
	$('error_'+ran).innerHTML='';
	$0('image_'+ran+'_men_1');
	
}
    
function upload_err(m,ran)
{
	$1('image_'+ran+'_controles');
	$0('image_'+ran+'_copiando');
	$0('image_'+ran+'_default');
	$('error_'+ran).innerHTML=m;
	$('form_'+ran).reset();
}

function upload_terminar(i,ran,original)
{
	$0('image_'+ran+'_copiando');
	$1('image_'+ran+'_default');
	$('error_'+ran).innerHTML='';
	$('image_'+ran+'_img').setProperty('width','103px');
	$('image_'+ran+'_img').src=i;
	$($('target_'+ran).value).value=original;
	$0('image_'+ran+'_controles');
	$1('image_'+ran+'_img_cerrar');
	$0('image_'+ran+'_men_1');
	//if($('next_'+ran)){	$1('next_'+ran); }
	var ultimo;
	$$('.actived').each(function(el, index){									 
	ultimo=el.value;
	});	
	if( ultimo!='' && $('next_'+ran).value==1 ){
		web_render_control_foto({'render':$v('render_'+ran),'class_input':$v('class_input_'+ran)});
	}
	
	return;
	
}



function web_render_control_foto(obj){
	
var target;	
var iii=0;
var next=0;
var class_input=obj.class_input;
$$('.'+obj.class_input).each(function(el, index){
if(!el.hasClass('actived')){									 
if(iii==1){ next=1; }
if(iii==0){	target=el.id; $(el).set('class', 'actived'); iii=1; }
}
});
if(iii==0)return;

var ran=Math.round(10000*Math.random());
var render=obj.render;
var img_default='';
var WIDTH='141px';
var margin_file;
if(Browser.Engine.presto){ margin_file=129; }
else if(Browser.Engine.trident){ margin_file=152; }
else { margin_file=148; }
new Element('div', {
    'id': 'content_'+ran,
	html:'&nbsp;',
	'styles':{
			height:'110px',
			width:WIDTH,
			//'background-color':'#ccc',
			//clear:'left',
			float:'left'
			}
}).inject($(render), 'bottom');

new Element('div', {
    'id': 'div_absolute_'+ran,
	'class' : 'absolutes_upload_form'
}).inject(document.body, 'top');

	var html='';	
	html+=''+
	'<input type="hidden" id="precarga_'+ran+'" style="width:100px;" />'+
	'<input type="hidden" id="target_'+ran+'"  value="'+target+'" style="width:100px;" />'+
	'<input type="hidden" id="render_'+ran+'"  value="'+render+'" style="width:100px;" />'+
	'<input type="hidden" id="class_input_'+ran+'"  value="'+class_input+'" style="width:100px;" />'+
	'<input type="hidden" id="next_'+ran+'"  value="'+next+'" style="width:100px;" />'+
	'<form id="form_'+ran+'" action="panel/script_upload_web.php?ID='+ran+'" enctype="multipart/form-data" method="post" target="iframe_upload_'+ran+'" style="position:relative;  float:left; height:93px; width:'+WIDTH+';" >'+
	'<div  id="image_'+ran+'_default"  class="upload_tabla" style="display:none;height:80px;overflow:hidden;" >'+
		'<table cellpadding="0" border="0" cellspacing="0">'+
		'<tr><td align="center" valign="middle" >'+
			'<img src="'+img_default+'" id="image_'+ran+'_img" class="upload_img_default" width="103"/>'+
		'</td></tr></table></div>'+
		//'<img src="img/cerrarfoto.gif" id="image_'+tb+'_'+campo+id2+'_img_cerrar" '+
		// 'style="display:none;" onclick="reset_img_foto(\''+tb+'\',\''+campo+id2+'\');" title="cerrar"/>'+
		'<div class="upload_controles" id="image_'+ran+'_controles">'+
			'<input type="file" name="v_file_'+ran+'"   '+
			'onchange="if(this.value!=\'\') upload(\''+ran+'\'); " '+
			'style="margin-left:-'+margin_file+'px; " '+
			'class="upload_input_file"  autocomplete="off" '+
			' />'+
			'<div id="error_'+ran+'" class="upload_error"></div>'+
		'</div>'+
		'<div id="image_'+ran+'_men_1" style="font-size:10px;position:absolute;top:27px;left:2px;width:auto;height:auto;">'+
		'subir foto'+
		'</div>'+
		'<a class="upload_img_cerrar" id="image_'+ran+'_img_cerrar"  style="width:108px;text-align:center; margin-right:0px; display:none;position:absolute;left:0px;bottom:2px;text-decoration:underline;" href="#" rel="nofollow" onclick="javascript:reset_img_foto(\''+ran+'\');return false;">eliminar</a>';

		html+='<span  class="upload_copiando" style=" display:none;" id="image_'+ran+'_copiando"></span>'+		
	'</form>'+
	'<iframe width="300" height="300" frameborder="0" style="position: absolute; display:none;" name="iframe_upload_'+ran+'" id="iframe_upload_'+ran+'"></iframe>';

	$('div_absolute_'+ran).innerHTML=html;

	$('div_absolute_'+ran).set('styles', {'position': 'absolute','z-index': '1','height':'90px','overflow':'hidden'});		

		if($v($v('target_'+ran)).trim()!=''){
			upload_terminar($v($v('target_'+ran)),ran,$v($v('target_'+ran)));
		}
		
	setTimeout("fixposition('"+ran+"');","1");


}

function fixposition(ran){
	
	var tocords=$('content_'+ran).getCoordinates();
	
	$('div_absolute_'+ran).set('styles', {'top': tocords.top,'left': tocords.left});		

}

function cerrar_sesion(url){
	
	new Request({url:"ajax.php?mode=form&tab=cerrar_sesion&url="+url, method:'get', onSuccess:function(ee) {
	var json=JSON.decode(ee,true);
	eval(json.js);
	}}).send();	
	
}

function onsubmit_buscar(){
	/*
	for(var i=0;i<OBJ_CATEGORIAS.length;i++){
	//alert($('formulario_buscar').value + " - "+OBJ_CATEGORIAS[i].nombre);
		if($('formulario_buscar').value.trim()==OBJ_CATEGORIAS[i].nombre.trim()){
			location.href=OBJ_CATEGORIAS[i].link;		
			return;
		}
	}
	*/	
	if($('formulario_buscar').value!=''){
		location.href=BASE+"/"+LINK_BUSQUEDA+$('formulario_buscar').value;
	}	

}














function carrito(obj,main,precio){


if($('actualizar_carrito')){ $1('actualizar_carrito');}
if($('carrito_contenido')){ $('carrito_contenido').setStyles({opacity:'0.5'}); }

new Request({url:"ajax.php?mode=carrito", method:'post', data:{'accion':obj.accion,'id':obj.id,'c':obj.c}, onSuccess:function(ee) {
	var json=JSON.decode(ee,true);
	render_carrito(json,{main:main,precio:precio,actualizar:obj.actualizar});
	$0('actualizar_carrito');	
	
	}}).send();
	
}

function render_carrito(json,obj){

	var main=obj.main;
	var precio=obj.precio;
	var enviar=obj.enviar;
	var gastos=obj.gastos;
	var controles=(obj.controles==null)?1:obj.controles;

	if(main!='1'){
		if(json!=null){ 
			if($('bloque_marcas'))	{ 	$0('bloque_marcas'); 	}
			if($('bloque_marcas2'))	{ 	$0('bloque_marcas2'); 	}
		} else {
			if($('bloque_marcas'))	{ 	$1('bloque_marcas'); 	}
			if($('bloque_marcas2'))	{ 	$1('bloque_marcas2'); 	}		
		}
	}
	
	
	if(json==null && main==1){
		 history.go(-1);
	}
	if(json && json.length>0){	
	var subt=0;
	var tot=0;
	
	html ='<div id="actualizar_carrito" style="display:none;">actualizando carrito</div>';
	
	if(main==0){
	html+='<div id="bloque_carrito" class="div_fila cuadro" >'+
        '<div class="barra_arriba">Estatus de compra</div>';
	}	

	if(main==0){
	html+='<div id="carrito_contenido" class="div_inner">';
	} else {
	html+='<div style="position:relative;clear:left; " id="carrito_contenido">';		
	}
	if(main==1){
	html+='<div class="linea" style="position:relative;';
	html+='">';
	html+='<span class="precio_subtotal" style="position:relative;">Producto</span>';
	html+='<span class="precio_subtotal" ';
	if(precio==1){ html+=' style="right:126px;" '; }
	html+=' >Cantidad</span>';
	if(precio==1){
	html+='<span class="precio_subtotal">Total</span>';
	}
	html+='</div>';
	}
	
	
	for(var i=0;i<json.length;i++){
	subt=json[i].c*json[i].u;
	tot=subt+tot;
	html+='<div class="linea"';
	if(precio==0){
		html+='style="padding-right:35px;"';
	} else {
		if(main==1){
		html+='style="padding-right:176px;"';
		}else{
		html+='style=""';
		}	
	}
	
	html+='>'+
	//foto		
	'<a class="foto" href="'+json[i].l+'">'+
		"<img src='"+ json[i].f +"' width=25 border=1 />"+
	'</a>'+
	//nombre		
	'<a class="nombre" href="'+json[i].l+'">'+json[i].n+'</a>';
	
	if(main==0){
		if(precio==0){
			//cantidad	
			html+='<span class="cantidad-precio">(<b>'+json[i].c+'</b>)</span>';			
		} else {
			//cantidad	
			html+='<span class="cantidad-precio">(<b>'+json[i].c+'</b><i>x'+
			//p unitario	
			''+currency(json[i].u)+'</i>)</span>';
		}
	} else {
	//cantidad	
	html+='<span class="cantidad-precio">';
	if(precio==1){
	html+='(<b>'+currency(json[i].u)+'</b>)';
	}
	html+='</span>';
	//p unitario
	var preciohtml=(precio==1)?' style="right:146px;" ':' style="right:58px;" ';
	
	if(controles==0){
		html+='<span class="cantidad" '+preciohtml+'>'+json[i].c+'</span>';		
	} else {
		html+='<span class="cantidad" '+preciohtml+'><input id="nueva_cantidad_'+i+'" maxlength="2" type="text" value="'+json[i].c+'" /></span>';		
	}
	
	if(controles==1){	
	html+="<a class=\"actualizar\" onclick=\"javascript:carrito({accion:'agregar',id:'"+json[i].i+"',c:$('nueva_cantidad_"+i+"').value},"+main+","+precio+"); return false;\">actualizar</a>";		
	}
	
	}
	
	if(precio==1){
	//p subtotal	
	html+='<span class="precio_subtotal">'+ (currency(subt)) +'</span>';
	}
	//link quitar	
	if(controles==1){	
	html+="<a title=\"eliminar\" class=\"quitar\" onclick=\"javascript:carrito({accion:'agregar',id:'"+json[i].i+"',c:'0'},"+main+","+precio+"); return false;\">x</a>";
	}
	html+='</div>';
	
	}
	
	if(gastos){
		html+='<div class="linea" style="border-bottom:0;">&nbsp;';

		html+='<span class="precio_subtotal"><span style="font-weight:normal;color:red;">'+gastos.i+'</span> &nbsp;&nbsp;&nbsp; '+ (currency(gastos.m)) +'</span>';
		
		html+='</div>';
		
		tot = tot + parseFloat(gastos.m) ;
	}
		
	html+=''+
	'<div class="linea_total"';
		if(controles==0){
			html+=' style="padding-right:8px;" ';
		}
		html+='>'+
		'&nbsp;';
	if(precio==1){			
	html+='<span class="total">TOTAL</span>'+
		'<span class="monto_total">'+currency(tot)+'</span>';
	}
	if(controles==1){		
	html+="<a title=\"vaciar\" class=\"quitar\" href=\"#\" onclick=\"javascript:carrito({accion:'vaciar',id:''},"+main+","+precio+"); return false;\">vaciar</a>";
	}
	html+='</div>';
	if(controles==1){	
	html+='<div class="linea_links">';
	if(main==0){ 
	html +="<a id=\"ver_carrito\" href=\""+CARRITO_PAGINA+"\">Ver Carrito</a>"; 
	}
	if(enviar!=0){
	html+="<a id=\"enviar_pedido\" href=\""+CARRITO_ENVIAR+"\">Enviar</a>";
	}
	html+='</div>';
	}
	
	html+='</div></div>';
	
	//html+='</div>';
	
	
//	if($('banners')){ $0('banners'); }
	
	var carrito_open=true;
	} else {
	html='<div id="actualizar_carrito" style="display:none;" >actualizando carrito</div>';	
	var carrito_close=true;	
	}
	$('div_carrito').innerHTML=html;
	
	if(carrito_open){$1('div_carrito');}else{$0('div_carrito');}
	
	
}

function show_submenu(letra){
	if(letra=='todos'){		
		$$('.letras').setStyles({'display':'inline'});		
	}else{		
		$$('.letras').setStyles({'display':'none'});
		$$('.'+letra).setStyles({'display':'inline'});			
	}
}
function show_submenu_over(letra){
	if(letra=='todos'){
	$$('.letras').setStyles({'text-decoration':'none'});
	}else{
	$$('.letras').setStyles({'text-decoration':'none'});
	$$('.'+letra).setStyles({'text-decoration':'underline'});	
	}
}
function show_submenu_out(){
	$$('.letras').setStyles({'text-decoration':'none'});
}

function check_unique(id,obj){
	
			
	if($(id).value!=''){
		
		new Request({url:"ajax.php", method:'get', data:{'mode':'get','get':'contar','t':obj.t,'w':obj.w,'v':$(id).value}, onSuccess:function(ee) {
		
			var json=JSON.decode(ee,true);
			if(json.n>0){
				$(id.id+'_men').innerHTML=obj.f;
				$1(id.id+'_men');
			} else {
				$(id.id+'_men').innerHTML='';
				$0(id.id+'_men');		
			}
	
		}}).send();
	
	}

	//get_distritos(idnom.replace('provincia','distrito'),'');
	
}



