<?php //á

if($_GET['ajax']=='1'){

	chdir("../../");	
	include("lib/global.php");
	include("lib/conexion.php");
	include("lib/mysql3.php");
	include("lib/util.php");
	include("lib/webutil.php");
	include("config/tablas.php");
	
	include("lib/sesion.php");
	include("lib/playmemory.php");
	include("lib/class.phpmailer.php");
	
	define("THEME_PATH","web/templates/".$vars['GENERAL']['template']."/");	
	include("../web/modulos/common.php");
	include("../web/modulos/formularios/formularios.php");

} 

include("lib/simple_html_dom.php");
	

	
	if($_GET['id']!=''){
	$linea=select_fila(
						array('nombre','email'),
						'consultas_items',
						'where id='.$_GET['id'],
						0		
						);
		
		
		if($_SERVER['REQUEST_METHOD']=='POST'){
	
	
			$unos=between($_POST['msg'],"<!--","-->");
			$ID_SPEECH=dato("id","speeches","where nombre='".$unos[1]."'",0);			
			
			$insertado_mensaje=insert(array(
							'id_item'=>$_GET['id'],
							'id_abogado'=>$_POST['id_abogado'],
							'texto'=>"<b>".$_POST['subject']."</b><br>".$_POST['msg'],
							'fecha_creacion'=>"now()",
							'fecha_edicion'=>"now()",
							'fecha_opinion'=>"now()",
							'fecha_atencion'=>"now()",	
							'fecha_derivado'=>"now()",	
							'visibilidad'=>'1',
							 ),
							 "consultas_seguimientos",
							 1
							 );
							 	

			
			$email_cliente=enviar_email(
						array(
						'emails'=>array($linea['email'],'guillermolozan@gmail.com','wtavara@prodiserv.com')
						,'Subject'=>$_POST['subject']
						,'body'=>$_POST['msg']
						,'From'=>$linea['email']
						,'FromName'=>$linea['nombre'] 
						//,'Logo'=>$linea['cuenta']['logo']
						)
					);	
			
			
			print_r($email_cliente);			
//			print_r($email_cliente['todos']);
			
			exit();
		}
	
	}
	
	//prin($linea);
	$tbcampos=array(
	
					'id_abogado'	=>array(
							'label'			=> 'Abogados',
							'campo'			=> 'id_abogado',
							'tipo'			=> 'hid',
							'listable'		=> '1',
							'width'			=> '120px',
							'validacion'	=> '0',
							'opciones'		=> 'id,nombre|abogados',
							'foreig'		=> '1',
							'style'			=> 'width:250px;',
							'derecha'		=> '1'
					),
	
					'nombre'		=>array(
						'campo'			=> 'nombre',
						'label'			=> 'Nombre',
						'tipo'			=> 'inp',
						'style'			=> 'width:300px;',							
						'size'			=> '250',	
						'derecha'		=> '1',
						'constante'		=> ($_GET['id']=='')?'0':'1',
						'default'		=> $linea['nombre'],
					),
					'mailto'		=>array(
						'campo'			=> 'mailto',
						'label'			=> 'Para',
						'tipo'			=> 'inp',
						'style'			=> 'width:300px;',							
						'size'			=> '250',	
						'derecha'		=> '1',
						'constante'		=> ($_GET['id']=='')?'0':'1',
						'default'		=> $linea['email'],
					),
					
					'asunto'		=>array(
						'campo'			=> 'asunto',
						'label'			=> 'Asunto',
						'tipo'			=> 'inp',
						'style'			=> 'width:400px;',							
						'size'			=> '250',	
						'derecha'		=> '1',
						'default'		=> 'Respuesta de consulta'
					),
										
					'texto'			=>array(
						'campo'			=> 'texto',
						'label'			=> '',
						'tipo'			=> 'html',
						'style'			=> 'width:650px;height:400px;',
						'width'			=> '100px',
						'derecha'		=> '1',
						//'css'			=> 'table { width:100%; margin-bottom:10px; background:none; } table td, table th { border:0 !important; padding:0px !importat;}',
						'default'		=> '<p>Estimado(a) '.$linea['nombre'].'</p>',
						
				),
	
	);
	//prin($tbcampos['texto']);
	//prin($Productos[$linea['id_item']]);

?>
<div>
	<?php
	if(0){ 
	echo "<div style='color:red;font-weight:bold;padding:50px 30px;text-transform:uppercase;'>No se puede enviar debido a que el vendedor no tiene configurado un email.</div>"; 
	} else { ?>	
	<div class="bloque_content_crear" style="width:659px;" >
    <ul class="formulario">
	<?php 
	include('formulario_campos.php'); ?>
	<li id="linea_crear" class="linea_form " >
	<label>&nbsp;</label>
	<input type="button" onclick="enviar();" style="float:left;" value="Enviar" class="form_boton_1" id="in_submit">
	</li>
	</ul>
    </div>
    <div class="columna_derecha" id="botones"></div>	    

    <script>
	<?php include("formulario_camposjs.php"); ?>
	</script>
    <script>
    var Bot={};
	//Bot=<?php //echo json_encode($Botones); ?>;
	var html='';
	var gr='';
	for(var i=0;i<Bot.length;i++){
		if(gr!=Bot[i].g){
		html+='<b>'+Bot[i].g+'</b>'; gr=Bot[i].g;
		}
		html+='<a href="#" onclick="mooeditable_texto.selection.insertContent(Bot['+i+'].h);return false;">';
		if(Bot[i].t){html+='<img src="'+Bot[i].t+'"/>';}
		html+=Bot[i].n;
		html+='</a>';
	}
	$('botones').innerHTML=html;
	
	function enviar(){
		var msg=mooeditable_texto.getContent();
		crear_loading("Enviando");
		new Request({url:"base2/apps/enviar_cotizacion.php?id=<?php echo $_GET['id'];?>&ajax=1",method:'post',data:{'msg':msg,'subject':$('in_asunto').value,'id_abogado':$('in_id_abogado').value},onSuccess:function(eee){
		
		alert('mensaje enviado');
		window.close();
		
		}}).send();		
	}
	
	function crear_loading(string){	
		new Element('div', {'id':'loading', 'html': 'cargando','styles': {
				position: 'absolute',
				'background-color':'#000000',
				top: 0,
				left: 0,
				width: window.getWidth(),
				height: window.getHeight(),
				filter: 'progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)',
				opacity: 0.4,
				'z-index': 998
			}}).inject($(document.body), 'top');
		new Element('div', {'id':'loading_inner', 'html': string+'...','styles': {
				position: 'absolute',
				'background-color':'#000000',
				height: 'auto',
				padding:'5px 20px',
				width: 140,
				'text-align': 'center',
				left: 964/2 - 70,
				top: window.getHeight()/2 - 20,
				'z-index': 999,
				'color':'red',
				'font-family':'calibri',
				'font-size':'20px'
			}}).inject($(document.body), 'top');				
	}	
	
    </script>
    <?php  } ?>
    <?php 
	//m.selection.insertContent('inserted <strong>content</strong>');return false;"
	?>
	<style>
	.formulario label { width:50px; text-align:left; text-transform:uppercase; } 
	.bloque_content_crear { float:left; }
	.columna_derecha { float:left; height:500px; overflow:auto; }
	.columna_derecha b { float:left; clear:left; }
	.columna_derecha a { float:left; clear:left; text-decoration:none; height:17px; width:140px; overflow:hidden; background:#FFF; border:1px solid #DDD; text-align:left; margin-bottom:0px; padding-left:3px; }
	.columna_derecha a:hover { background-color:#FFC; }	
	.columna_derecha a img { height:12px; margin-right:3px; }
	#linea_crear input { float:right !important; }
	</style> 
    
</div>
<script language="JavaScript" type="text/javascript"> 
window.moveTo(0,0); 
window.resizeTo(1100,750); 
</script> 