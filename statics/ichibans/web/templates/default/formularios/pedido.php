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
            
               <div  id="envgen_localizacion" style="float:left;"><?php web_render_control_localizacion($FORM,$GEO,array('envgen_departamento','envgen_provincia','envgen_distrito')); ?></div>
                
                <?php web_render_form($FORM); ?>        
                 
            </div>                   
            
            <?php web_render_form_javascript($FORM); ?>        
        
            <?php 
            $THIS="carrito";
            ?>
            <div style="float:left;width:100%;" class="cuadro <?php 
                web_selector_control($SELECTED,$THIS,"carritos");
                ?>" >
                <?php //web_render_esquinas(1,4);?>
                <div id="actualizar_carrito" style="display:none;">actualizando carrito</div>
            
               <div class="barra_arriba">
               <?php web_render_item_borde('bors-b',1,2);?>        
                Carrito de compras
               </div>
                     
                <div class="div_borde div_inner" id="div_carrito">
                </div>
                
            </div>
            
            </form>
            <!--FORM FIN--> 
        
            <div class="clean"></div>    

        </div>
            
    </div>
</div>
                   
<script type="text/javascript">
//window.addEvent('domready', function() {
render_carrito(<?php echo json_encode($_SESSION['carrito']);?>,{main:'1',controles:'1',precio:'1',enviar:'0'},0,0);
//});
</script>

