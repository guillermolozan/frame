<?php //á

$THIS=$PARAMS['this'];

$ITEMS=$LISTADO[$PARAMS['this']]['items'];

//prin($ITEMS['menu']);
foreach($ITEMS as $ITEM){
?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques,arboles");
        ?>" >
        <?php web_render_esquinas(1,4);?>        
    
		<?php
        if($ITEM['header']){ 
        echo '<div class="barra_arriba">'; web_render_item($ITEM['header']); echo '</div>';
        }
        ?>
             
        <div class="div_borde div_inner">
		<?php web_render_tree($ITEM['menu'],'h3'); ?>
        </div>
        
        <?php
        echo '<div class="barra_abajo"></div>';
        ?>
		
	</div>
    
</div>    	     
<?php } ?>