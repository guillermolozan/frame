<?php //á

$THIS=$PARAMS['this'];

$ITEMS=$LISTADO[$PARAMS['conector']];

?>
<div id="listado_<?php echo $THIS;?>" class="<?php 
        web_selector_control($SELECTED,$THIS,"bloques,arboles");
        ?>">
<?php foreach($ITEMS as $ITEM){ ?>

    <div class="cuadro" >
        <?php //web_render_esquinas(1,4);?>        
    
       <div class="barra_arriba">
       <?php web_render_item_borde('bors-b',1,2);?>        
       <?php echo $ITEM['titulo'];?>
       </div>
             
             
        <div class="div_borde div_inner">
        
		<?php web_render_tree($ITEM['menu'],'h3'); ?>

        </div>     
        
    </div>
<?php } ?>
</div>

