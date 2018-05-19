<?php //á

$THIS=$PARAMS['this'];

$ITEMS=$OBJECT[$PARAMS['this']];

//prin($ITEMS['menu']);
?>
<div class="div_fila">
    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques,arboles,listados");
        ?>" >
        <?php web_render_esquinas(1,4);?>
        <div class="barra_arriba">
			<?php //web_render_item_borde('bors-b',1,2);?>        
	   		<?php web_render_item($ITEMS['header']); ?>
       	</div>
       	<div class="div_borde div_inner">
	   		<?php web_render_tree($ITEMS['items'],'h3'); ?>
        </div>
        <div class="barra_abajo">
			<?php //web_render_item_borde('bors-b',1,2);?>
	   		<?php web_render_item($ITEMS['footer']); ?>
       	</div>        
	</div>
</div>