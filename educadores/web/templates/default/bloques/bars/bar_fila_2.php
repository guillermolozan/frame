<?php //á
?>
		
    
    <div id="bloque_recomendar" class="div_columna cuadro margen_der <?php 
		/* CSS del Cuadro */ echo "bloque_cuadro_5"; ?>" >
        <?php web_render_esquinas(0,0);?>
        <div class="barra_arriba"><?php echo $lang['recomendar'];?></div>
        <div class="div_borde" >

			<?php include("formularios/recomendar.php"); ?>
        	
    	</div>
    </div>

	
    <div id="bloque_videos" class="div_columna cuadro margen_der <?php 
		/* CSS del Cuadro */  echo "bloque_cuadro_5"; ?> <?php
        /* CSS del listado */ echo "listado_1"; ?>" >
        <?php web_render_esquinas(0,0);?>
        <div class="barra_arriba"><?php echo $lang['videos_y_curiosidades'];?></div>
        <div class="div_borde">

			<?php include("bloques/bloque_videos.php"); ?>
        	
    	</div>
    </div>
    
    
    <div id="bloque_ofertas" class="div_columna cuadro <?php 
		/* CSS del Cuadro */  echo "bloque_cuadro_5"; ?> <?php
        /* CSS del listado */ echo "listado_2"; ?>" >
        <?php web_render_esquinas(0,0);?>
        <div class="barra_arriba"><?php echo $lang['novedades'];?></div>
        <div class="div_borde">

			<?php include("bloques/bloque_novedades.php"); ?>
        	
    	</div>
    </div>    
    