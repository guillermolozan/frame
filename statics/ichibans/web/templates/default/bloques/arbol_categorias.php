<?php //á

$THIS=$PARAMS['this'];

$oo=$OBJECT[$PARAMS['this']];

?>
<div class="div_fila">
<?php foreach($oo as $object){ ?>
    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques,arboles");
        ?>" >
        <?php web_render_esquinas(1,4);?>        
		<?php
        if($object['header']){ 
        echo '<div class="barra_arriba">'; web_render_item($object['header']); echo '</div>';
        }
        ?>
        <div class="div_borde div_inner">        
        <?php web_render_tree($object['menu'],'h3'); ?>
        </div>
        <div class="barra_abajo"></div>		
	</div>    
<?php } ?>	
</div>