<?php //á

$THIS=$PARAMS['this'];

$ITEM=$OBJECT[$PARAMS['this']];
//prin($ITEM);
?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques,fichas");
        ?>" >
        <?php web_render_esquinas(1,4);?>
                   
		<?php
        echo '<div class="barra_arriba">';
        echo $ITEM['nombre'];
        echo '</div>';
        ?>     
        <div class="div_borde div_inner">
		
			<?php web_render_item($ITEM,$ITEM['esquema']); ?>
        
        </div>
        
    </div>
 
</div> 