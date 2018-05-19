<?php //á

$THIS=$PARAMS['this'];
$FORM=$FORMULARIO[$PARAMS['conector']];

?>
<div class="div_fila">
    <div class="cuadro <?php
    web_selector_control($SELECTED,$THIS,"bloques,formularios");
    ?>" ><?php web_render_esquinas(1,4);?>		
    
        <div class="barra_arriba">
        <?php web_render_item_borde('bors-b',1,2);?>                
        <h1><?php echo $FORM['titulo']; ?></h1>
        </div>
    
        <div class="div_borde div_inner" >
        
            <!--FORM INICIO-->
            <form id="formulario_<?php echo $FORM['nombre'];?>" method="post" name="<?php echo $FORM['nombre'];?>" class="formularios" action="<?php echo $FORM['action'];?>" >                          
            <div id="<?php echo $FORM['nombre'];?>_form_body" class="form_body">        
            <?php web_render_form($FORM); ?>                         
            </div>                               
            <?php web_render_form_javascript($FORM); ?>                    
            </form>
            <!--FORM FIN--> 
        
        <div class="clean"></div>                    
        </div>
            
    </div>
</div>    
<script>
	window.addEvent('domready', function(){
		$$('.cotizaciones_tipo_servicio').each(function(el, index){
			$(el).addEvent('click', function(){
				$$('.sub_forms').setStyle('display','none');
				$('sub_form_'+$('cotizaciones_tipo_servicio').value).setStyle('display','block');								
			});			
		});	
	});	
</script>
<style>
#p_cotizaciones_tipo_servicio { margin-bottom:5px; clear:left; margin-top:15px; }
#p_cotizaciones_tipo_servicio label.name { display:block;  width:100%; clear:both; font-weight:bold; text-align:center; float:left; height:40px; }
#p_cotizaciones_tipo_servicio input { display:none;  }
#p_cotizaciones_tipo_servicio label.opcion { padding:5px 15px; text-decoration:underline; cursor:pointer; margin:0 8px; color:#003; background-color:#eee; border-radius:8px 8px 0px 0px; } 
#p_cotizaciones_tipo_servicio label.selected { background-color:#FFB749; }
#p_cotizaciones_submit { margin-top:20px; }
</style>