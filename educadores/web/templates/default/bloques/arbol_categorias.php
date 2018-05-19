<?php //á

$THIS=$PARAMS['this'];

$ITEMS=$LISTADO[$PARAMS['this']];

//prin($ITEMS['menu']);
?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques,arboles");
        ?>" >
        <?php web_render_esquinas(1,4);?>        
    
       <div class="barra_arriba">
       <?php //web_render_item_borde('bors-b',1,2);?>        
       <h2>
       <?php if($ITEMS['catalogo']['link']!=''){ ?><a href="<?php echo $ITEMS['catalogo']['link'];?>" title="<?php echo $ITEMS['catalogo']['label'];?>"><?php } ?>
	   <?php echo $ITEMS['catalogo']['label'];?>
       <?php if($ITEMS['catalogo']['link']!=''){ ?></a><?php } ?>
       </h2>
       </div>
             
        <div class="div_borde div_inner">
        
		<?php web_render_tree($ITEMS['menu'],'h3'); ?>

        </div>
        
	</div>
    
</div>    	     
