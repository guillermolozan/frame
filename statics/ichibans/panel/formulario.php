<?php

include("objeto.php");


		
?><ul class="formulario"><?php

    ?><div class="sv"  id="load" style="display:none;top:-30px;left:0px;" >cargando...</div><?php
            
    if(strpos($_SERVER['SCRIPT_NAME'], "login.php")===false){
    ?><h1 style=" display:none;" class="titulo_formulario" id="titulo_editar" ><?php            
    ?><a class="boton_right" onclick="javascript:ax('editar_completo_cancelar','');return false;" >Cancelar Editar</a><?php
    
    ?><a class="boton_right" onclick="javascript:ax('guardar_completo',$v('id_guardar'));return false;" >Guardar <?php echo ucfirst($datos_tabla['nombre_singular']);?></a><?php            
    
    ?>Editar <?php echo ucfirst($datos_tabla['nombre_singular']);
    
    ?></h1><?php
    
    ?><h1 class="titulo_formulario" id="titulo_crear"><?php            
    
    ?><a rel="nofollow" class="boton_right" onclick="javascript:ax('insertar',$v('id_guardar'));return false;" >Crear <?php echo ucfirst($datos_tabla['nombre_singular']);?></a><?php   
    
    ?>Crear <?php echo ucfirst($datos_tabla['nombre_singular']);        
     
    ?></h1><?php
    }
      
    include("formulario_campos.php");
    
    ?><div id='area_hijos'><?php

    if($datos_tabla['creacion_hijo']){ 
    $Hijos=explode(",",$datos_tabla['creacion_hijo']);
    foreach($Hijos as $HijoD){ 

    list($Hijo,$TipoHijo)=explode("|",$HijoD);
    
    foreach($objeto_tabla as $obbb){
        if($obbb['archivo']==$Hijo){
            $Pplural=$obbb['nombre_plural'];
            foreach($obbb['campos'] as $canp){
                if($canp['foreig']=='1'){
                    $HijoCampo=$canp['campo'];
                }
            }
        }
    }
    
    $HijoValor=999999000 + rand(1,999);
    $HHijos[]=$HijoD;

    ?><input type="hidden" id="tempar_<?php echo $Hijo;?>_pre" value="<?php echo $Hijo;?>|<?php echo $HijoCampo;?>" /><?php
    ?><input type="hidden" id="tempar_<?php echo $Hijo;?>" /><?php
    ?><li class="linea_form linea_hijo <?php echo $TipoHijo;?>"><?php
        ?><label><?php echo $Pplural;?>&nbsp;</label><?php
        ?><div id="tempar_<?php echo $Hijo;?>_iframe" ></div><?php
    ?></li><?php
    } } 
    ?></div><?php


    
    ?><li class="linea_form linea_form_mensaje" style="color:#FF0000; <?php if($_GET['block']=='form'){ echo "display:none;"; } ?>" ><?php
        ?><label>&nbsp;</label><?php
        ?><span id="error_creacion" style=" visibility:; float:left; padding:5px 0; font-size:12px;"><?php
        ?><span style="color:#222222;">los campos con * son obligatorios</span><?php
        ?></span><?php
    ?></li><?php
                
    ?><li class="linea_form" id="linea_crear"><?php
            if($_GET['block']!='form'){
            ?><label>&nbsp;</label><?php
            }
            ?><input type="hidden" id="mode" value="insert" /><?php
            if($Proceso=='login'){
            ?><input type="button" id="in_submit" class="form_boton_1" value="Entrar" style="float:left;" onclick="ax('login','');"  /><?php                    
            } else { 
            ?><input type="button" id="in_submit" class="form_boton_1" value="Crear <?php echo $datos_tabla['nombre_singular']?>" style="float:left;" onclick="ax('insertar','');"  /><?php
            } 					
            if($Open and ($datos_tabla['crear_pruebas']!='0') ){					
            ?><input type="button" id="in_submit_prueba" class="form_boton_1 desarrollo" value="Crear <?php echo $datos_tabla['nombre_singular']?> de prueba"  onclick="ax('insertar_prueba','');"   /><?php 
            } 
            
    ?></li><?php
            
    ?><li class="linea_form" id="linea_grabar" style="display:none;"><?php
    
            ?><label>&nbsp;</label><?php
            ?><input type="hidden" id="id_guardar" /><?php
            ?><input type="button" id="ed_save" class="form_boton_1" value="Guardar <?php echo $datos_tabla['nombre_singular']?>" style="float:left;" <?php
            ?>onclick="ax('guardar_completo',$v('id_guardar'))"/><?php
            ?><input type="button" id="ed_cancelar" class="form_boton_1" value="Cancelar" <?php
            ?> onclick="ax('editar_completo_cancelar','')" /><?php
            
    ?></li><?php
              
?></ul><style>.bloque_content_crear{display:block;}</style><?php
if($_GET['ran']!=''){
	include("lib/compresionFinal.php");	/*para Content-Encoding*/ 
}
?>