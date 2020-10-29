<?php 
//á
chdir("../");
include("lib/compresionInicio.php");
//include("lib/includes.php");
include("lib/global.php");	
include("lib/conexion.php");
include("lib/mysql3.php");	
include("lib/util.php");	
include("lib/webutil.php");	
//	include("config/tablas.php");
include("lib/sesion.php");


include("lib/webutils.php");	
include("lib/playmemory.php");

require_once( "lib/ini_manager.php" );

	
chdir("base2");






include("includes.php");

$pedido = select_fila(
        "id,estado,id_usuario,nombre,genero,telefono,celular,email,id_pais,id_lugar,n_adultos,n_ninos,n_infantes,fecha_salida,fecha_retorno,servicio,comentario,anotaciones,via,fecha_creacion,genero,cache"
        ,"ventas_pedidos"
        ,"where id=".$_GET['id']." and  visibilidad='1' order by id asc limit 0,100"
        ,0
        );
		
$paquetes = select(
        "id,nombre,id_proveedor,id_pais,id_lugar,id_grupo,fecha_salida,fecha_retorno,nnoches,comision,incentivo,comision_empresa,variacion_empresa,rangonin,titular,resumen,texto,comentario,fecha_creacion"
        ,"paquetes"
        ,"where id_lugar='".$pedido['id_lugar']."' and  visibilidad='1' order by id asc limit 0,100"
        ,0
        ,array(
        	'sub_select'=>array('sub_select'=>array(
                			    'campos'=>"id,id_paquete,file,foto_descripcion,destacada,fecha_creacion"
                                	    ,'tabla' =>"paquetes_fotos"
                                	    ,'donde' =>"where id_paquete='{id}' and visibilidad='1' order by id asc limit 0,100"
                                       	    ,'debug' =>0
                                            )
                                        )      	    
    
              )
        );
		
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Sistema de Envio</title>
<meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
<meta name="title" content="Administrador de Contenido"/>
<meta name="description" content="Administrador de Contenido 1.1"/>
<meta name="keywords" content="Prodiserv"/>
		
<link rel="stylesheet" type="text/css" href="../css/MooEditable.css">
<link rel="stylesheet" type="text/css" href="../css/MooEditable.Extras.css">  
<link rel="stylesheet" type="text/css" href="../css/MooEditable.SilkTheme.css"> 
<link rel="stylesheet" type="text/css" href="../css/MooEditable.Table.css">

<?php $sn2='../';
?><script type="text/javascript" src="<?php echo $sn2?>js/mootools-core-1.3.2-full-compat.js"></script><?php
?><script type="text/javascript" src="<?php echo $sn2?>js/mootools-more-1.3.2.1.js"></script><?php 
?><script type="text/javascript" src="<?php echo $sn2?>js/js.js"></script><?php 
?><script type="text/javascript" src="<?php echo $sn2?>js/MooEditable.js"></script><?php
?><script type="text/javascript" src="<?php echo $sn2?>js/MooEditable.UI.ButtonOverlay.js"></script><?php
?><script type="text/javascript" src="<?php echo $sn2?>js/MooEditable.UI.MenuList.js"></script><?php
?><script type="text/javascript" src="<?php echo $sn2?>js/MooEditable.Extras.js"></script><?php
?><script type="text/javascript" src="<?php echo $sn2?>js/MooEditable.Table.js"></script><?php
?><script type="text/javascript" src="<?php echo $sn2?>js/MooEditable.CleanPaste.js"></script><?php
?>
<script language="JavaScript" type="text/javascript"> 
window.moveTo(0,0); 
window.resizeTo(1100,750); 
</script> 
<style>
body { background-color:#DCD5C7; width:965px; }
#enviando { float:right; background-color:#FF9; color:#000; padding:1px 26px; font-weight:bold; text-transform:uppercase; }
#enviado  { float:right; background-color:#F00; color:#FFF; padding:1px 26px; font-weight:bold; text-transform:uppercase; }
.content { border-bottom:1px #333 dotted; }
.paquete .link { float:right;margin-left:5px; width:16px;height:16px; }
.paquete .cerrar { display:block; background:url(up.png) no-repeat; }
.paquete .abrir { display:none; background:url(down.png) no-repeat; }
.paquete .delete { background:url(delete.png) no-repeat; }
.paquete .content { display:block; }
.paquete .barra { padding:6px 2px; border:1px solid #EEE; background-color:#DCD5C7; }
.hid .cerrar { display:none;  }
.hid .abrir { display:block; }
.hid .content { display:none; }
.hid .barra { border:1px solid #DDD; background-color:#EEE; }

.ico { width:auto; float:left; height:16px; background-repeat:no-repeat; padding-left:20px; margin:5px 15px 0 0; text-decoration:none; color:#333; clear:left; }
.ico:hover { text-decoration:underline; }
.ico_paquete { background-image:url(paquete.png);}
.ico_hotel { background-image:url(hotel.png);}
.ico_aereo { background-image:url(aereo.png);}
.ico_bus { background-image:url(bus.png);}
.ico_comentario { background-image:url(comentario.png);}
.ico_precio { background-image:url(precio.png);}
.bloque { float:left;width:200px;font-size:11px;font-family:calibri; padding:6px; background-color:#DCD5C7;margin-bottom:1px; clear:left; }
.barra_control { float:left; width:750px; background-color:#DCD5C7; font-size:12px;font-family:calibri; border:1px solid #DCD5C7; margin:0 0 1px 1px; height:auto; 12px;font-family:calibri }
.barra_control a { color:blue; text-decoration:none; float:left; margin-right:30px; }
.barra_control a:hover { color:#000; text-decoration:underline; }
.data { padding:0; margin:0; font-size:11px; }
.data .line { list-style:none;  clear:left; padding-bottom:6px; }
.data .line .var { width:auto;  padding-right:1px; text-transform:uppercase; color:#900; font-weight:bold;  border-bottom: 1px dotted #000000; font-size:9px; }
.data .line .valor { width:auto;  border-bottom: 1px dotted #000000;  }
.data .line .valor input { width:160px; font-size:10px; color:#000; padding:0 2px; margin:0 0 1px; }
.titulo { font-weight:bold; color:#900; font-size:12px; text-transform:uppercase; background-color:#DCD5C7; }
.email { float:left;width:750px; border:1px solid #F5F5F5; margin-left:1px; min-height:500px; margin-bottom:30px; background-color:#FFF; }
.paquete { color:#930; font-weight:bold; font-size:12px; text-transform:uppercase; }
.hotel { padding-left:0px; }
.hotel label { color:#333; font-size:10px; font-family:Geneva, sans-serif; }
.hotel label .estrellas { color:#930;; font-weight:bold;}
.hotel label .n_fotos { color:#000; font-size:10px; font-style:italic; }
.paquete select { font-size:11px; text-transform:none; }
</style>
<?php

	$seleccion_cero=array(
					'pedido'=>array(
						//array('paquete'=>array('blank'=>'1','acomodacion'=>'2'))
						//,array('aereo'=>array('blank'=>'1'))
						//,array('hotel'=>array('blank'=>'1','pax'=>'2'))								
						/*
						array('paquete'=>array(
													'id'=>'6',
													'hoteles'=>array(
																	array('id'=>'1')
																	,array('id'=>'2')
																	 )							
												)
						)		
						,array('paquete'=>array(
													'id'=>'37',
													'aereo'=>'1',
													'hoteles'=>array(
																	array('id'=>'1')
																	,array('id'=>'2')
																	)							
												)
						)
						*/
					)
					,
					'opciones'=>array(
								'prefijo'=>0
								,'introduccion'=>$Textos['introduccion'][0]
								,'firma'=>$Textos['firma'][0]
								,'asunto'=>'Cotización '.select_dato("nombre","lugares"," where id='".$pedido['id_lugar']."'").""
								,'acomodacion'=>2
								,'editable'=>1
								,'from'=>'1'								
								)
			);
			
//	prin(select_fila("nombre","lugares"," where id='".$pedido['id_lugar']."'"));	
		
	$CACHE=unserialize($pedido['cache']);	
	//prin($seleccion_cero);			
	$selec=($selec)?$selec:0;
	
	$html=$opciones[$key][$selec];			

	$CACHE0=$CACHE;
	
	$CACHE=($CACHE!='')?$CACHE:$seleccion_cero;	
	
	if($CACHE0==''){
		update(array('cache'=>serialize($CACHE)),"ventas_pedidos","where id='".$_GET['id']."'",0);		
	}				
	
	$seleccion=$CACHE['pedido'];

	$opciones=$CACHE['opciones'];		
		
?>	
<div>	
    <div style="float:left;width:auto;height:auto;">
		<div class='titulo'>COTIZACIÓN</div>
		<div class='estado'>COTIZACIÓN</div>        
    	<div class='bloque'>	
 		<?php
		if($_GET['id']=='new'){
			
		$opacity="style='opacity:0.2;'";
		
		web_render_data_insert("nombre,telefono,celular,nextel,email","VENTAS_PEDIDOS",2);		
		
		} else {
        
		$campos_pedido="id,estado,nombre,genero,telefono,celular,nextel,email,id_pais,id_lugar,n_adultos,n_ninos,n_infantes,fecha_salida,fecha_retorno,servicio,comentario,anotaciones,via,fecha_creacion";
			
			$pedidodatos= select_fila($campos_pedido
					,"ventas_pedidos"
					,"where id='".$_GET['id']."'"
					,0
					,array(
						'fecha_salida'=>array('fecha_formato'=>array('fecha'=>"{fecha_salida}",'formato'=>'3'))
						,'fecha_retorno'=>array('fecha_formato'=>array('fecha'=>"{fecha_retorno}",'formato'=>'3'))
						,'pais'=>array('sub_select_dato'=>array('campo'=>'nombre','tabla'=>'paises','donde'=>"where id='{id_pais}'",'debug'=>'0'))
						,'destino'=>array('sub_select_dato'=>array('campo'=>'nombre','tabla'=>'lugares','donde'=>"where id='{id_lugar}'",'debug'=>'0'))
						)
					);
					
			$pedidodatos['email']=str_replace(",",", ",$pedidodatos['email']);
			
			web_render_data($pedidodatos,"nombre,email,telefono,celular,nextel,pais,destino,n_adultos,n_ninos,n_infantes,fecha_salida|salida,fecha_retorno|retorno,comentario,anotaciones",2);
			
		}
		?>
        </div>
        <div class='bloque' <?php echo $opacity; ?> >	
            <a href='#' onClick="javascript:item('<?php echo $_GET['id'];?>','paquete','add','blanco','grabar_todo');return false;" class='ico ico_paquete' >Paquete en blanco</a>
            <a href='#' onClick="javascript:item('<?php echo $_GET['id'];?>','aereo','add','blanco','grabar_todo');return false;" class='ico ico_aereo' >Aéreo en blanco</a>
            <a href='#' onClick="javascript:item('<?php echo $_GET['id'];?>','hotel','add','blanco','grabar_todo');return false;" class='ico ico_hotel' >Hotel en blanco</a>
            <a href='#' onClick="javascript:item('<?php echo $_GET['id'];?>','bus','add','blanco','grabar_todo');return false;" class='ico ico_bus' >Bus en blanco</a>
            <a href='#' onClick="javascript:item('<?php echo $_GET['id'];?>','comentario','add','blanco','grabar_todo');return false;" class='ico ico_comentario' >Comentario en blanco</a>
			<!--<a href='#' onClick="javascript:item('<?php echo $_GET['id'];?>','precio','add','blanco');return false;" class='ico ico_precio' >Precio Total</a>-->
        </div>
        <div class='bloque' <?php echo $opacity; ?> >
            <div style='float:left;width:100%;'>
            <?php
			$paquetes_grupos= select(
					array(
					'id'
					,'nombre'
					,"(SELECT COUNT(*) FROM paquetes WHERE visibilidad='1' AND id_grupo=paquetes_grupos.id) as np"
					)
					,"paquetes_grupos"
					,"where 1 and  visibilidad='1' order by id desc limit 0,100"
					,0
					);			
			?>
            <select id="paquetes_grupos_select" onChange="cargar_combo(this.value);" style="width:80%;">
			<option>seleccion grupo</option>
			<?php foreach($paquetes_grupos as $pg){ if($pg['np']>0){ ?><option value="<?php echo $pg['id'];?>"><?php echo $pg['nombre'];?></option><?php } } ?>
            </select>
            
			<select id="paquetes_select" style="width:80%;" onChange="$('id_paq').value=this.value;" ></select>
            </div>
            <div style='float:left;width:100%;'>
                <input type='text' style='width:30px;' id='id_paq' />
                <input type='button' value='Agregar Paquete' onClick="item('<?php echo $_GET['id'];?>','paquete','add',$('id_paq').value,'grabar_todo');" />
            </div>
            
            <div>
            	<?php 
				$num_paquete_blanco=0;				
				foreach($seleccion as $ss=>$sele){
					
					if(key($sele)=='paquete'){
						
					if($sele['paquete']['blank']!='1' and is_numeric($sele['paquete']['id'])){
						
						$hos0=array();
						$hos1=array();
						$paquete_id	=	$sele['paquete']['id'];						
						$paquete=select_dato("nombre","paquetes","where id='".$paquete_id."' ");						
						$visibilidad=select_dato("visibilidad","paquetes","where id='".$paquete_id."' ");
						$hoteles0=select('id_hotel','paquetes_preciohotel',"where id_paquete='".$paquete_id."'");	
											
						foreach($hoteles0 as $ho){	$hos0[]=$ho['id_hotel'];	}
						$hoteles1	=	$sele['paquete']['hoteles'];
						foreach($hoteles1 as $ho){	$hos1[]=$ho['id'];			}					
						echo "<div class='content'>";
						echo "<div class='paquete'>
								$paquete ".(($visibilidad)?'':'<u>(no visible)</u>')."
							  </div>";
							  
						echo "<div class='hoteles'>";
						foreach($hos0 as $ho0){						
									
							$hotel= select_fila(
									"id,nombre,estrellas"
									,"hoteles"
									,"where id='$ho0' and  visibilidad='1' order by id asc limit 0,100"
									,0
									,array(
										'n_fotos'=>array('sub_select_dato'=>array(
															'campo'=>"count(*)"
															,'tabla' =>"hoteles_fotos"
															,'donde' =>"where id_hotel='{id}' and visibilidad='1'"
															,'debug' =>0
																				)
														)      	    
								
										  )
									);										
															
							if($hotel['nombre']!=''){											
							echo "<div class='hotel'>";
							echo "<input 
							type='checkbox' 
							id='h_".$hotel['id']."' 
							". ((in_array($hotel['id'],$hos1))?"checked":"") ." 
							onchange=\"sub_item('".$_GET['id']."','paquete','hoteles',(!this.checked)?'del_sub':'add_sub','".$ss."','".$hotel['id']."');\" 
							>";
							echo "<label for='h_".$hotel['id']."'>".$hotel['nombre']." 
							<span class='estrellas'>".$hotel['estrellas']."*</span>
							<span class='n_fotos'>(".$hotel['n_fotos']." fotos)</span>
							</label>";
							echo "</div>";
							}
												
						}
						
						//echo "<div style='text-align:right;padding-bottom:3px;'><input type='button' onclick=\"actualizar('".$_GET['id']."');\" value='actualizar paquete' /></div>";
						
						echo "</div>";	
						echo "</div>";					
						
					} else {
												
						$num_paquete_blanco++;
                        $paises= select(
                                array(
                                'id'
                                ,'nombre'
                                ,"(SELECT COUNT(*) FROM hoteles WHERE visibilidad='1' AND id_pais=hoteles.id) as np"
                                )
                                ,"paises"
                                ,"where 1 and  visibilidad='1' order by id desc limit 0,100"
                                ,0
                                );												                     												
						
						$hos0=array();
						$hos1=array();
						$paquete_id	=	$sele['paquete']['id'];
						$paquete="Paquete en blanco ".( $ss + 1 );						
						$visibilidad=1;
						$hoteles0=select('id_hotel','hoteles',"where id_lugar='".$destino."'");	
											
						foreach($hoteles0 as $ho){	$hos0[]=$ho['id_hotel'];	}													
						$hoteles1	=	$sele['paquete']['hoteles'];
						foreach($hoteles1 as $ho){	$hos1[]=$ho['id'];			}					
						echo "<div class='content' style='margin-top:13px;clear:left;width:100%;float:left;height:auto;'>";
						echo "<div class='paquete'>
								$paquete ".(($visibilidad)?'':'<u>(no visible)</u>')."
							  </div>";
						echo "<div class='hoteles'>";
						foreach($hos0 as $ho0){					
									
							$hotel= select_fila(
									"id,nombre,estrellas"
									,"hoteles"
									,"where id='$ho0' and  visibilidad='1' order by id asc limit 0,100"
									,0
									,array(
										'n_fotos'=>array('sub_select_dato'=>array(
															'campo'=>"count(*)"
															,'tabla' =>"hoteles_fotos"
															,'donde' =>"where id_hotel='{id}' and visibilidad='1'"
															,'debug' =>0
																				)
														)      	    
								
										  )
									);															
																		
							echo "<div class='hotel'>";
							echo "<input 
							type='checkbox' 
							id='h_".$hotel['id']."' 
							". ((in_array($hotel['id'],$hos1))?"checked":"") ." 
							onchange=\"sub_item('".$_GET['id']."','paquete','hoteles','". ((in_array($hotel['id'],$hos1))?"del_sub":"add_sub") ."','".$ss."','".$hotel['id']."');\" 
							>";
							echo "<label for='h_".$hotel['id']."'>".$hotel['nombre']." 
							<span class='estrellas'>".$hotel['estrellas']."*</span>
							<span class='n_fotos'>(".$hotel['n_fotos']." fotos)</span>
							</label>";
							echo "</div>";
												
						}
                        
						?>
                        <select id="paises_select_<?php echo $ss;?>" onChange="cargar_combo2(this.value,'destinos_select_<?php echo $ss;?>');" style="width:40%;">
                        <option>seleccion país</option>
                        <?php foreach($paises as $pg){ if($pg['np']>0){ ?><option value="<?php echo $pg['id'];?>"><?php echo $pg['nombre'];?></option><?php } } ?>
                        </select>
                        
                        <select id="destinos_select_<?php echo $ss;?>" style="width:40%;" ></select>
            
            			<?php
														
						echo "<div style='text-align:right;padding-bottom:3px;'>
							  	 <input type='button' onclick=\"item('".$_GET['id']."','paquete','lugar='+$('destinos_select_".$ss."').value,'".$ss."');\" value='actualizar hoteles del paquete' />
						</div>";
						
						echo "</div>";

						echo "</div>";						
						
					}
					
					}
										
                } ?>
            </div>
        </div>    
    </div>
    <div class="barra_control" <?php echo $opacity; ?>>    
    <?php 
	$opciones['editable']=(isset($opciones['editable']))?$opciones['editable']:1;
	?>    
    <a href='#' onClick="javascript:if(confirm('La cotización volverá a su estado inicial. Todo el trabajo se perderá.')){ resetear('<?php echo $_GET['id'];?>'); } return false;">Reiniciar</a>
    <?php if($opciones['editable']=='0'){ ?>
    <a href='#' onClick="javascript:opcion('<?php echo $_GET['id'];?>','editable','<?php echo ($opciones['editable']=='0')?'1':'0'; ?>'); return false;">Ir a Modo Edición</a>
    <a href='#' onClick="javascript:if(confirm('¿Estás seguro que la cotización está lista para enviar a <?php echo $pedido['email'];?>?')){ enviar('<?php echo $_GET['id'];?>');}return false;">Enviar</a>        
	<?php } else { ?>
    <a href='#' onClick="javascript:grabar_todo('<?php echo $_GET['id'];?>','opcion(\'<?php echo $_GET['id'];?>\',\'editable\',\'<?php echo ($opciones['editable']=='0')?'1':'0'; ?>\')'); return false;">Ir a Modo Vista Previa</a>
    <a href='#' onClick="javascript:grabar_todo('<?php echo $_GET['id'];?>','location.reload();'); return false;">Guardar Cambios</a>
    <a href='#' onClick="javascript:if(confirm('¿Estás seguro que la cotización está lista para enviar a <?php echo $pedido['email'];?>?')){ grabar_todo('<?php echo $_GET['id'];?>','enviar(\'<?php echo $_GET['id'];?>\'); ');}return false;">Enviar</a>    
    <?php } ?>
    <div id="enviando" style="display:none;">enviando</div>
    <div id="enviado" style="display:none;">enviado</div>
	<?php //prin($opciones); ?>
    </div>
    <div class="barra_control" <?php echo $opacity; ?> >
    Asunto<input type="input" id="asunto" style="width:450px;" value="<?php echo $opciones['asunto'];?>"> 
    
    FROM <select id="from"><?php foreach($VentasCuentas as $vc){ ?><option value="<?php echo $vc['id'];?>" 
	<?php echo ($vc['id']==$opciones['from'])?'selected':''; ?>><?php echo $vc['nombre'];?></option><?php } ?></select>
    </div>
    <div class="email"  <?php echo $opacity; ?> >
    <?php 	
	echo email_content(array('pedido'=>$pedido,'seleccion'=>$seleccion,'opciones'=>$opciones)); 
	?>
    </div>
</div>
<script>
	function crear_loading(){	
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
		new Element('div', {'id':'loading_inner', 'html': 'ACTUALIZANDO...','styles': {
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
	function opcion(id,variable,valor){
		
		crear_loading();		
		var myRequest = new Request({method: 'post',url: 'save_pedido.php',onSuccess:function(e){ location.reload(); }});
		myRequest.send('id='+id+'&accion=opcion&variable='+variable+'&valor='+valor);
		
	}	
	function resetear(id){
		
		var myRequest = new Request({method: 'post',url: 'save_pedido.php',onSuccess:function(e){ location.reload(); }});
		myRequest.send('id='+id+'&accion=reset');
		
	}	
	function item(id,tipo,ope,item,grabar){
		
		if(grabar=='grabar_todo'){	grabar_todo(id); } else { crear_loading(); }
		var myRequest = new Request({method: 'post',url: 'save_pedido.php',onSuccess:function(e){ location.reload(); }});
		myRequest.send('id='+id+'&accion=item&tipo='+tipo+'&ope='+ope+'&item='+item);
		
	}	
	function sub_item(id,tipo,subtipo,ope,item,subitem,grabar){
		
		var myRequest = new Request({method: 'post',url: 'save_pedido.php',onSuccess:function(e){ location.reload(); }});
		myRequest.send('id='+id+'&accion=item&tipo='+tipo+'&subtipo='+subtipo+'&ope='+ope+'&item='+item+'&subitem='+subitem);
		
	}
	function actualizar(id){
		
		grabar_todo(id);
		location.reload();
		
	}
	<?php
	$textos=array();
	//$textos[]=array('html'=>$opciones['introduccion']);
	//$textos[]=array('id'=>'introduccion');
	foreach($seleccion as $num=>$sel){	
		//$textos[]=array('html'=>$sel[key($sel)]['html']);	
		$textos[]=array('id'=>"bloque_".$num);		
	}

	//$textos[]=array('html'=>$opciones['firma']);
	//$textos[]=array('id'=>'firma');
	?>	
	
function $v(a){ return $(a).value; }
function $1(a){ $(a).style.display=''; }
function $0(a){ $(a).style.display='none'; }
	
	function grabar_todo(id,sigue){
		
		crear_loading();
			
		datos={
			<?php
			foreach($textos as $tx){
		//	$bloques[]=$tx['id']."='+".$tx['id'].".getContent()+'";
			echo "'".$tx['id']."':".$tx['id'].".getContent(),";
			}
			?>		
			'id'		:id,
			'accion'	:'grabar',
			'asunto'	:$('asunto').value,
			'from'		:$('from').value,
			'introduccion':introduccion.getContent(),
			'firma'		:firma.getContent()		
			};
			var myRequest = new Request({method: 'post',data:datos,url: 'save_pedido.php',onSuccess:function(e){ eval(sigue); }});
			myRequest.send();
			
	}
	
	
    </script><?php //prin($pedido);?><script>
	
	
	function enviar(id){

		datos={	
			'id'		:id,
			'accion'	:'enviar'	
			};
			$1('enviando');	$0('enviado');
			var myRequest = new Request({method: 'post',data:datos,url: 'save_pedido.php',onSuccess:function(e){ 
			$0('enviando'); $1('enviado');
			alert("Email Enviado Exitosamente\n\nEsta cotización luego de <?php echo intervalo($pedido['fecha_creacion']); ?> de haber sido solcitada\n\nPor favor notificar <?php echo ($pedido['genero']=='2')?"a la Sra.":"al Sr."?> <?php echo $pedido['nombre'];?> al : <?php echo $pedido['telefono'];?>, <?php echo $pedido['celular'];?>, <?php echo $pedido['nextel'];?> que la cotización ha sido enviada al correo <?php echo $pedido['email'];?>.\n\n\nGracias\n\n\n");
			window.close();
			}});
			myRequest.send();
		
	}	
	
	function cargar_combo(value){			
	
		var myRequest = new Request({method: 'post',url: 'save_pedido.php',onSuccess:function(ee){ 
		var json=JSON.decode(ee,true);		
		$('paquetes_select').innerHTML='';
		new Element('option').inject($('paquetes_select'), 'bottom');
		for(var i=0;i<json.length;i++){
		new Element('option', {'value': json[i].id,'html': json[i].nombre}).inject($('paquetes_select'), 'bottom');
		}		
		}});
		myRequest.send('accion=get_paquetes&paquete_grupo='+value);				 
						 
	}	
	
	function cargar_combo2(value,target){
	
		var myRequest = new Request({method: 'post',url: 'save_pedido.php',onSuccess:function(ee){
		var json=JSON.decode(ee,true);
		$(target).innerHTML='';
		new Element('option').inject($(target), 'bottom');
		for(var i=0;i<json.length;i++){
		new Element('option', {'value': json[i].id,'html': json[i].nombre}).inject($(target), 'bottom');
		}
		}});
		myRequest.send('accion=get_destinos&pais='+value);
		
	}
	
</script>
<?php 
//prin($CACHE);
?>
</html>
<?php
chdir("../");	
include("lib/compresionFinal.php");
?>