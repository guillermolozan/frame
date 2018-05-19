<?php //á
//prin($PAGINA);
?>
    <!---->
    
    <div id="listado_productos" class="cuadro <?php 
		$THIS="pages";	
		web_selector_control($SELECTED,$THIS,"bloques");	
        ?>" >
        <?php web_render_esquinas(1,4);?>  
        
            <h1 class="barra_arriba"><?php echo $PAGINA['titulo']; ?></h1>
            
	        <div class="div_borde div_inner">
            
                <?php if($PAGINA['foto']!=''){ ?><img  <?php echo $PAGINA['get_atributos']; ?> align="right" class="margen_izq" /><?php } ?>
                <?php echo $PAGINA['texto']; ?>

			</div>
            <div class="barra_abajo"></div>
            
    </div>

