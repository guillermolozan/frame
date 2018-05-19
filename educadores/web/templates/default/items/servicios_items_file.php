<?php //á

$THIS=$PARAMS['this'];

$ITEM=$OBJECT[$PARAMS['this']];

?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques");
        ?>" >
        <?php web_render_esquinas(1,4);?>
                   
		<?php
        echo '<div class="barra_arriba">';
        //web_render_item_borde('bors-b',1,2);
        echo $ITEM['titulo'];
        echo '</div>';
        ?>     
        <div class="div_borde div_inner">
		
			<?php if($ITEM['foto']!=''){ ?>
            <div style="margin-bottom:10px;float:left;"><img  <?php echo $ITEM['get_atributos']; ?> class="margen_der" /></div>
            <?php } ?>
            
            <?php echo $ITEM['texto']; ?> 
        
            <?php echo ($ITEM['pdf'])?$ITEM['download']:''; ?> 

        </div>
        
    </div>
 
</div> 