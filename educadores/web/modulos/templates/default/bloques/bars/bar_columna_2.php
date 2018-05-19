<?php //á
?>
	<?php include("items/bloque_carrito.php"); ?>
    
    <div id="bloque_categorias_arbol" class="div_fila cuadro margen_arr <?php 
		/* CSS del Cuadro */ 		echo "bloque_cuadro_4"; 		?> <?php
		/* CSS del Arbol */ 		echo "bloque_arbol_1"; 			?>" >
        <?php web_render_esquinas(0,0);?>
        <div class="barra_arriba"><?php echo $lang["articulos_publicitarios"];?></div>
        <div class="div_borde" >
        
			<?php include("items/bloque_arbol_categorias.php"); ?>
        	
    	</div>
    </div>

