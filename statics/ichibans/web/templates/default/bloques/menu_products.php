<?php //á

// prin($PARAMS);

$THIS=$PARAMS['this'];


$ITEMS=$OBJECT[$PARAMS['this']];

//prin($ITEMS['menu']);
?>
<div class="div_fila">
    <div class="cuadro id_menu_products <?php 
        web_selector_control($SELECTED,$PARAMS['classStyle'],"bloques,listados,menus");
        ?>" >
        <?php web_render_esquinas(1,4);?>        
        <div class="barra_arriba">
			<?php //web_render_item_borde('bors-b',1,2);?>        
	   		<?php web_render_item($ITEMS['header']); ?>                
       	</div>
       	<div class="div_borde div_inner">
	   		<?php web_render_tree($ITEMS['items']); ?>
        </div>
        <div class="barra_abajo">
			<?php //web_render_item_borde('bors-b',1,2);?> 
	   		<?php //web_render_item($ITEMS['footer']); ?>             
       	</div>
        
	</div>
</div>


 <!-- id_arbol_categorias arbol_categorias-bloques bloque_cuadro_18 arbol_categorias-arboles arbol_01  -->


 <!-- id_menu_products menu_products-bloques  menu_products-arboles  menu_products-listados  menu_products-menus   -->