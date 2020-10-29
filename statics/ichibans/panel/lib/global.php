<?php //á

header('Content-Type: text/html; charset=utf-8');

$Array_Meses=array(1=>"enero","febrero","marzo","abril","mayo","junio","julio","agosto","setiembre","octubre","noviembre","diciembre");
$Array_Horas=array(0=>"12am","1am","2am","3am","4am","5am","6am","7am","8am","9am","10am","11am","12pm","1pm","2pm","3pm","4pm","5pm","6pm","7pm","8pm","9pm","10pm","11pm");

$FORMSCLASS=array(
	'1'=>'linea_derecha_inicio',
	'2'=>'linea_derecha',
	'3'=>'linea_derecha_espacio',
	'50'=>'linea_derecha_50',
	'100'=>'linea_derecha_100',
	'150'=>'linea_derecha_150',
	'a'=>'linea_derecha_align',
	'a1'=>'linea_derecha_align_inicio',
	'a3'=>'linea_derecha_align_espacio'
);

$COMANDOS_OBJETO=array(
				'inp','short','long'
				,'int','int5'
				,'fot','vid','txt'
				,'bit1','bit'
				,'fechc','fech'						
				,'del'
				,'grupos','sub','items'
				);
				
$COMANDOS_TUTO="
CAMPOS:
inp:		input,w:150					ej: nombre:inp
short:		input,w:50					ej: nombre:short
long:		input,w:300					ej: nombre:long
int:		input,variable:float		ej: numero:int
int5:		input,variable:float,w:5	ej: numero:int5
bit:		com,radio,w:50,default:0	ej: opcion:bit
bit1:		com,radio,w:50,default:1	ej: opcion:bit1
bit:		img,com,radio,w:50			ej: opcion:bit
fech:		fch,w:100					ej: fecha:fech
fechc:		fch,constante,w:100			ej: fecha:fech



";				

$LIBRARIES['web']=array('name'=>"web",'value'=>
'
BODY {bg=#FFF,w=972,font=calibri,s}
DIVBODY {s}
CONTENT {p-i,p-d,shadow,radius,s}
CANVAS {min-h=350,bg=#FFF,inter=5,dbl=178M,tpl,cpl,borde=1,p-b,p-t,p-lados,s}

HEADEROUT {h,s}
HEADERPRE {h,s}
HEADER {h,m-b,bg,s}
BAR {h=auto,m-b,bg,s}
HEADERAFTER {h,bg,s}
FOOTERPRE {h,s}
FOOTERAFTER {h,s}
FOOTEROUT {h,s}
'
); 

$LIBRARIES['menus']=array('name'=>"Menu",'value'=>
'
FILA{s}
ME{ex=jpg,bg,s}
UL-IZQ{ena=0,w=5}
UL-DER{ena=0,w=5}
LI-IZQ{ena=0,w=5}
LI-DER{ena=0,w=5}
LI-BOR{ena=0,w=1,bg,s}
LI{s}
LI-SEL{s}
A{h,m-lados=1,p-lados,p-t,size,color,bg,color-sel,bg-sel,weight,s}
'
); 

$LIBRARIES['arboles']=array('name'=>"Arbol",'value'=>
'
UL{s}
LI{size,h,min-h,color,s}
SEL{color,bg,ima=0,s}
NIVEL1{p,p-l,bg,color,ima=0,s,a-s}
NIVEL2{p,p-l,bg,color,ima=0,s,a-s}
NIVEL3{p,p-l,bg,color,ima=0,s,a-s}
'
); 

$LIBRARIES['bloques']=array('name'=>"Block",'value'=>
'
BLOQUE{m-t,m-b=10}
ARRIBA{ena=1,dis,min-h,size,color,bg,bg-out,p-lados,p-t,p-b,s}
SUBARRIBA{ena=1,dis,min-h,size,color,bg,p-lados,p-t,s}
MARCO{min-h,bg,bg-out,p-t=0,p-izq=0,p-der=0,p-b=0,scroll,h,m,s}
ABAJO{ena=1,dis,min-h,size,color,bg,bg-out,p-lados,p-t,s}
'
);

$LIBRARIES['listados']=array('name'=>"List",'value'=>	
'
FILA{p-lados,w=100%,float=left,s}
ITEM{ena=1,h=auto,min-h,w=100%,bg,bg-sel,bg-out,p-b,p-t,p-l,s}
ITEMOVER{ena=1,s}
FOTO{ena=1,w,h,p=0,bg,borde,bg-sel,borde-w=1,borde-sel,sangria=0,m-b,s}
TITULO{ena=1,color,bg,size,align,text,weight,s}
SUBTITULO{ena=1,color,size,align,text,weight,s}
TEXTO{ena=1,size,color,align,text,weight,s}
FECHA{ena=0,s}
PRECIO{ena=0,w,h,p-a,p-i,p-d,s}
CARRITO{ena=0}
PAGINACION{ena=1,dis,size,bg,color,bg-sel,color-sel,m-izq,p,weight=bold,s}
TREN{color,size,m-der,m-izq,s,s-fila}
'
); 

$LIBRARIES['formularios']=array('name'=>"Form",'value'=>
'
LEGEND{ena=0,color,size,s,bg,p-t,p-b}
BEFORE{ena=0,color,size,s,bg,p-t,p-b}
FILA{w,color,s}
LABEL{color,w,align=right,s}
INPUT{borde=#999999,bg=#F5F7FB,color=#000000,w=250,ta-h,s}
SMALL{color,s}
'
);
$LIBRARIES['footers']=array('name'=>"Foot",'value'=>
'
FILA{h,bg,p-t,p-b,p-lados,size,color,color-sel,s}
BY{size,color,color-sel}
INFO{align,color,color-sel,p-b,s}
MENU{align,color,color-sel,p-b,s}
'
);
$LIBRARIES['fichas']=array('name'=>"File",'value'=>
'
FILA{p-lados,w=100%,float=left,s}
PAGINACION{ena=1,dis}
ITEM{ena=1,h=auto,min-h,w=100%,bg,bg-sel,bg-out,s}
FOTO{ena=1,w,h,p=0,bg,borde,bg-sel,borde-w=1,borde-sel,sangria=0,m-b,s}
TITULO{ena=1,color,bg,size,align,text,weight,s}
SUBTITULO{ena=1,color,size,align,text,weight,s}
TEXTO{ena=1,size,color,align,text,weight,s}
FECHA{ena=0,s}
PRECIO{ena=0,w,h,p-a,p-i,p-d,s}
CARRITO{ena=0}
TREN{color,size,m-der,m-izq,s,s-fila}
'
);

$LIBRARIES['carritos']=array('name'=>"Cart",'value'=>
'
ACTUALIZAR{color,font}
ElIMINAR{color,font}
VACIAR{color,font}
VERCARRITO{color,font}
ENVIAR{color,font}
ITEM{color,font,s}
PRECIOITEM{color,font}
TOTAL{color,font}
PRECIOTOTAL{color,font}
'
);

$LIBRARIES['tablas']=array('name'=>"Tbl",'value'=>
'

'
);



//error_reporting(0);

//date_default_timezone_set('America/New_York');
date_default_timezone_set('America/Lima');

$vars=parse_ini_file("config/config.ini",true);
//echo "<pre>"; print_r($vars); echo "</pre>";
$vars_global=$vars['GENERAL'];

$UPLOAD_FTP=(isset($vars_global['UPLOAD_FTP']))?$vars_global['UPLOAD_FTP']:0;

extract($vars_global);
if ($_SERVER['SERVER_NAME']=="localhost" or $_SERVER['SERVER_NAME']=="127.0.0.1") {

	$vars['LOCAL']['httpfiles']=($vars['GENERAL']['MODO_LOCAL_ARCHIVOS_REMOTOS']==1)?$vars['REMOTE']['httpfiles']:$vars['LOCAL']['httpfiles'];
	$vars_server=$vars['LOCAL'];
	$vars_server_mysql=$vars['LOCAL_MYSQL'];
	$vars_server_ftp=$vars['LOCAL_FTP'];
	$server_place="LOCAL";	
	$Local=1;
	$SERVER['LOCAL']=1;
	$LOCAL=1;
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);
	
} else {
	$vars_server=$vars['REMOTE'];
	$vars_server_mysql=$vars['REMOTE_MYSQL'];
	$vars_server_ftp=$vars['REMOTE_FTP'];
	$server_place="REMOTO";
	$Local=0;
	$SERVER['LOCAL']=0;
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);
	//error_reporting(E_ALL);	
}
//echo "<pre>";print_r($SERVER);echo "</pre>";

$parse=parse_url($_SERVER['HTTP_REFERER']);
$SERVER['from_externo']=($parse['host']!=$_SERVER['SERVER_NAME'] )?1:0;
$SERVER['from_interno']=($SERVER['from_externo'])?0:1;

$SERVER['REDIRECT_QUERY_STRING']=$_SERVER['REDIRECT_QUERY_STRING'];


		 
/*
$vars_server_local=$vars['LOCAL'];
$vars_server_remoto=$vars['REMOTE'];
$vars_server_ftp_local=$vars['LOCAL_FTP'];
$vars_server_ftp_remoto=$vars['REMOTE_FTP'];
*/
$get_num_vars=0;
foreach($vars as $vars2){
foreach($vars2 as $vars3){
$get_num_vars++;
}
}

extract($vars_server);
extract($vars_server_mysql);
extract($vars_server_ftp);

$HTML_ALL_INICIO    = '<div id="div_allcontent" ><div id="div_contenedor" >';		
	
$HTML_MAIN_INICIO   = '<div class="contenido_principal" id="contenido_principal"  >';
		
$HTML_CONTENT_INICIO= '<div class="line_content">';

$HTML_CONTENT_FIN 	= '</div>';		

$HTML_ALL_FIN		= '</div></div>'; 

$HTML_ALL_FIN		= '</div></div>'; 

$HTML_ESQUINAS_ARRIBA    = '';
							
$HTML_ESQUINAS_ABAJO    = '';							

define(HTML_ALL_INICIO,$HTML_ALL_INICIO);
define(HTML_MAIN_INICIO,$HTML_MAIN_INICIO);
define(HTML_MAIN_FIN,$HTML_MAIN_FIN);
define(HTML_ALL_FIN,$HTML_ALL_FIN);

$HTML_ALL_INICIO="<div id='layer'></div>".$HTML_ALL_INICIO;

define(CLAV,"guillermolozan");

$DEPARTAMENTOS_PERU = array(
							"Amazonas",
							"Áncash",
							"Apurímac",
							"Arequipa",
							"Ayacucho",
							"Cajamarca",
							"Callao",
							"Cusco",
							"Huancavelica",
							"Huánuco",
							"Ica",
							"Junín",
							"La Libertad",
							"Lambayeque	",
							"Lima",
							"Loreto",
							"Madre de Dios",
							"Moquegua",
							"Pasco",
							"Piura",
							"Puno",
							"San Martín",
							"Tacna",
							"Tumbes"
							);

$script_B = explode("?",$_SERVER['REQUEST_URI']);
if($script_B[1]){ $SERVER['PARAMS']=$script_B[1]; }

$script_A = explode("/",$_SERVER['REQUEST_URI']);
$url_script=$script_A[sizeof($script_A)-1];

$script_A = explode("/",$_SERVER['SCRIPT_FILENAME']);
$file_script=$script_A[sizeof($script_A)-1];

$script_A = explode("/",$_SERVER['PHP_SELF']);
unset($script_A[sizeof($script_A)-1]);
$dir_script=implode("/",$script_A);

$SERVER['URL']=$url_script;
$SERVER['ARCHIVO']=$file_script;
$SERVER['BASE']="http://".$_SERVER['HTTP_HOST'].$dir_script."/";
$SERVER['RUTA']=$SERVER['BASE'].$SERVER['ARCHIVO'];
$SERVER['ROOT']=$vars['LOCAL']['url_publica'];
$SERVER['PANEL']=$SERVER['ROOT'].'/panel';

$LOGIN=(!(strpos($_SERVER['SCRIPT_NAME'], "login.php")===false))?1:0;

$BGCOLOR_DESARROLLO="#FFEEE0";

$LOREN_IPSUM="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, s";


$LOREN_IPSUM_HTML="<p>$LOREN_IPSUM</p><p>$LOREN_IPSUM</p><p>$LOREN_IPSUM</p>";

$limite_campos_en_lista=5;



$STOPWORDS=array();
$STOPWORDS_=file("stopwords.txt");
foreach($STOPWORDS_ as $stop){
$STOPWORDS[]=trim($stop);
}


function get_browser_()
{
	global $_SERVER;
	$user_agent=$_SERVER['HTTP_USER_AGENT'];
	$browsers = array(
		'Opera' => 'Opera',
		'Chrome' => 'Chrome',		
		'Firefox'=> '(Firebird)|(Firefox)',
		'Galeon' => 'Galeon',
		'Mozilla'=>'Gecko',
		'MyIE'=>'MyIE',
		'Lynx' => 'Lynx',
		'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',
		'Konqueror'=>'Konqueror',
		'SearchBot' => '(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)',
		'IE10' =>'(MSIE 10\.[0-9]+)',
		'IE9' => '(MSIE 9\.[0-9]+)',
		'IE8' => '(MSIE 8\.[0-9]+)',
		'IE7' => '(MSIE 7\.[0-9]+)',
		'IE6' => '(MSIE 6\.[0-9]+)',
		'IE5' => '(MSIE 5\.[0-9]+)',
		'IE4' => '(MSIE 4\.[0-9]+)',
	);
 
	foreach($browsers as $browser=>$pattern)
	{
		if (eregi($pattern, $user_agent))
			return $browser;
	}
	return 'Unknown';
	
}


$SERVER['browser']=get_browser_();

$combos=array(
				'inp'	=>'inp'
				,'int'	=>'int'
				,'txt'	=>'txt'
				,'fot'	=>'fot'
				,'fech'	=>'fech'
				,'bit'	=>'bit'
				,'opc'	=>'opc'
				
				);
				
$EDITOR_TEXTUAL_CAMPOS = "";
$EDITOR_TEXTUAL_CAMPOS.= "<div class='dredre'>";
$EDITOR_TEXTUAL_CAMPOS.= "<div>";
$EDITOR_TEXTUAL_CAMPOS.= "<input type='text' id='nuevo_campo' />";
$EDITOR_TEXTUAL_CAMPOS.= "<select>";
foreach($combos as $com=>$bos){ $EDITOR_TEXTUAL_CAMPOS.= "<option value='$com'>$bos</option>"; }
$EDITOR_TEXTUAL_CAMPOS.= "</select>";
$EDITOR_TEXTUAL_CAMPOS.= "</div>";
$EDITOR_TEXTUAL_CAMPOS.= "<div style='position:relative;'>";
$EDITOR_TEXTUAL_CAMPOS.= "<textarea id='jjjson' class='flext growme' style='border:1px solid #999;' >";
$EDITOR_TEXTUAL_CAMPOS.= "</textarea>";
$EDITOR_TEXTUAL_CAMPOS.= "<a style='position:absolute;right:5px;top:0px;'
 href='#' onclick=\"javascript:procesar_objt(); return false;\" rel='nofollow' >procesar campos</a>";
$EDITOR_TEXTUAL_CAMPOS.= "</div>";
$EDITOR_TEXTUAL_CAMPOS.= "</div>";
$EDITOR_TEXTUAL_CAMPOS.= "<script>";
$EDITOR_TEXTUAL_CAMPOS.= "$('jjjson').addEvent('keydown',function(event){if(event.key=='a'&&event.control){procesar_objt();};});";
$EDITOR_TEXTUAL_CAMPOS.= "</script>";

$EDITOR_TEXTUAL_PROPIEDADES = "";
$EDITOR_TEXTUAL_PROPIEDADES.= "<div class='dredre'>";
$EDITOR_TEXTUAL_PROPIEDADES.= "<div>";
$EDITOR_TEXTUAL_PROPIEDADES.= "<input type='text' id='nueva_propiedad' />";
$EDITOR_TEXTUAL_PROPIEDADES.= "<select>";
foreach($combos as $com=>$bos){ $EDITOR_TEXTUAL_PROPIEDADES.= "<option value='$com'>$bos</option>"; }
$EDITOR_TEXTUAL_PROPIEDADES.= "</select>";
$EDITOR_TEXTUAL_PROPIEDADES.= "</div>";
$EDITOR_TEXTUAL_PROPIEDADES.= "<div style='position:relative;'>";
$EDITOR_TEXTUAL_PROPIEDADES.= "<textarea id='jjjsonprop' class='flext growme' style='border:1px solid #000;' >";
$EDITOR_TEXTUAL_PROPIEDADES.= "</textarea>";
$EDITOR_TEXTUAL_PROPIEDADES.= "<a style='position:absolute;right:5px;top:0px;'
 href='#' onclick=\"javascript:procesar_props(); return false;\" rel='nofollow' >procesar propiedades</a>";
$EDITOR_TEXTUAL_PROPIEDADES.= "</div>";
$EDITOR_TEXTUAL_PROPIEDADES.= "</div>";
$EDITOR_TEXTUAL_PROPIEDADES.= "<script>";
$EDITOR_TEXTUAL_PROPIEDADES.= "$('jjjsonprop').addEvent('keydown',function(event){if(event.key=='a'&&event.control){procesar_props();};});";
$EDITOR_TEXTUAL_PROPIEDADES.= "</script>";

$EDITOR_TEXTUAL_OBJETO = "";
$EDITOR_TEXTUAL_OBJETO.= "<div class='dredre'>";
$EDITOR_TEXTUAL_OBJETO.= "<div>";
$EDITOR_TEXTUAL_OBJETO.= "<input type='text' id='nuevo_objecto' />";
$EDITOR_TEXTUAL_OBJETO.= "<select>";
foreach($combos as $com=>$bos){ $EDITOR_TEXTUAL_OBJETO.= "<option value='$com'>$bos</option>"; }
$EDITOR_TEXTUAL_OBJETO.= "</select>";
$EDITOR_TEXTUAL_OBJETO.= "</div>";
$EDITOR_TEXTUAL_OBJETO.= "<div style='position:relative;'>";
$EDITOR_TEXTUAL_OBJETO.= "<textarea id='jjjsonproy' class='flext growme' style='border:2px solid #666; background-color:#f5f5f5;'>";
$EDITOR_TEXTUAL_OBJETO.= "</textarea>";
$EDITOR_TEXTUAL_OBJETO.= "<a style='position:absolute;right:5px;top:0px;'
 href='#' onclick=\"javascript:procesar_proyecto(); return false;\" rel='nofollow' >procesar proyecto</a>";
$EDITOR_TEXTUAL_OBJETO.= "</div>";
$EDITOR_TEXTUAL_OBJETO.= "</div>";
$EDITOR_TEXTUAL_OBJETO.= "<script>";
$EDITOR_TEXTUAL_OBJETO.= "$('jjjsonproy').addEvent('keydown',function(event){if(event.key=='a'&&event.control){procesar_proyecto();};});";
$EDITOR_TEXTUAL_OBJETO.= "</script>";
	
	
$Replace4Str=array(
					//'edicion_'
					'eliminar'
					,'editar'
					,'crear_pruebas'
					,'crear_quick'
					,'edicion_completa'
					,'edicion_rapida'
					,'visibilidad'
					,'calificacion'
					,'duplicar'
					,'expandir_vertical'
					,'exportar_excel'
					,'importar_csv'
					,'buscar'
					,'crear'
					,'stat'
					,'menu'
					,'disabled'
					,'web'
					,'page'
					,'user'
					);
$Replace4Ico=array(
					//''
					'<img src="img/ico_eliminar.png"/>'
					,'edit'
					,'<img src="img/ico_prueba	.png"/>'
					,'<img src="img/ico_quick.png"/>'
					,'<img src="img/ico_editarcomplete.png"/>'
					,'<img src="img/ico_editar.png"/>'
					,'<img src="img/ico_desactivar.png"/>'
					,'<img src="img/ico_star.png"/>'
					,'<img src="img/ico_duplicar.png"/>'
					,'expan_ver'
					,'<img src="img/ico_xls.png"/>'
					,'<img src="img/ico_csv.png"/>'
					,'<img src="img/search.png"/>'
					,'<img src="img/ico_plus.png"/>'
					,'<img src="img/ico_stat.png"/>'					
					,'M'
					,'<img src="img/ico_disabled.png"/>'
					,'<img src="img/ico_www.png"/>'
					,'<img src="img/ico_page.png"/>'
					,'<img src="img/ico_user.png"/>'
					);


$indicesA=array(
				'M'=>'menu'
				
				,'C'=>'crear'
				,'Stat'=>'stat'
				,'Q'=>'crear_quick'								
				,'Pru'=>'crear_pruebas'					
				
				,'E'=>'editar'
				,'EC'=>'edicion_completa'
				,'ER'=>'edicion_rapida'
				,'Dup'=>'duplicar'
				
				,'X'=>'eliminar'
								
				,'Vis'=>'visibilidad'
				,'Cal'=>'calificacion'
				,'B'=>'buscar'
				,'O'=>'orden'
				//,'EV'=>'expandir_vertical'
				,'exX'=>'exportar_excel'
				,'imX'=>'importar_csv'		
				
				,'D'=>'disabled'						
											
				,'W'=>'web'																
				,'P'=>'page'																				
				,'U'=>'user'																				
				);

$MEactions='forecolor bold italic underline | justifyleft justifyright justifycenter justifyfull | insertunorderedlist insertorderedlist | undo redo removeformat | createlink unlink | indent outdent | tableadd tableedit tablerowadd tablerowedit tablerowdelete tablecoladd tablecoledit tablecoldelete | toggleview';	

$MEbaseCSS='html{ height: 100%; cursor: text; } body{ font-family:calibri; font-size:12px; } h2{font-size:20px;font-weight:bold; color:#222;} h3{font-size:18px;font-weight:bold;color:#111;} h4{font-size:16px;font-weight:bold;color:#000;} h5{font-size:14px;font-weight:bold;color:#000;} h6{font-size:14px;font-weight:bold;color:#222; } table { border-collapse: collapse !important; border:0 !important; padding:0 !important; margin:0 !important; } table td,table th { padding:2px !important; margin:0 !important; }';									

?>