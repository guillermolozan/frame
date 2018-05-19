<?php //á

$THIS=$PARAMS['this'];

$object=$OBJECT[$PARAMS['this']];

$ITEMS=$object['items'];

// $PARAMS['classStyle']=$object['classStyle'];
//prin($ITEMS['menu']);
foreach($ITEMS as $ITEM){
?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$PARAMS['classStyle'],"bloques,arboles");
        ?>" >
        <?php web_render_esquinas(1,4);?>        
    
		<?php
        if($ITEM['header']){ 
        echo '<div class="barra_arriba">'; web_render_item($ITEM['header']); echo '</div>';
        }
        ?>
             
        <div class="div_borde div_inner">
        <!-- <textarea name="" id="" cols="30" rows="10">   -->
		<?php web_render_tree_special($ITEM['menu'],'h3'); ?>
        <!-- </textarea>   -->
        </div>
        
        <?php
        echo '<div class="barra_abajo"></div>';
        ?>
		
	</div>
    
</div>    	     
<?php } ?>