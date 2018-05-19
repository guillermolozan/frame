<?php //á

$THIS=$PARAMS['this'];

$ITEM=$OBJECT[$PARAMS['this']];

?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques");
        ?>" >
        <?php web_render_esquinas(1,4);?>        
        
    
       <div class="barra_arriba">
       <?php web_render_item_borde('bors-b',1,2);?>        
       <?php echo $ITEM['titulo']; ?>
       </div>
             
        <div class="div_borde div_inner">
		
			<?php if($ITEM['foto']!=''){ ?>
            <div style="margin-bottom:10px;float:left;"><img  <?php echo $ITEM['get_atributos']; ?> class="margen_der" /></div>
            <?php } ?>
            
            <?php echo $ITEM['texto']; ?>   
        
        </div>
        
    </div>
 
</div> 