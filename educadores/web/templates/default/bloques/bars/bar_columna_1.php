<?php //á
?>

	<?php include("items/bloque_carrito.php"); ?>
    
    
    <div id="bloque_marcas" class="div_fila cuadro margen_arr <?php 
        /* CSS del Cuadro */ echo "bloque_cuadro_4"; ?>" >
        <?php web_render_esquinas(0,0);?>
        <div class="barra_arriba"><?php // echo $lang['nuestras_marcas'];?></div>
        <div class="div_borde" >

            <?php include("bloques/bloque_marcas.php"); ?>
            
        </div>
    </div>

    
    <div id="bloque_marcas2" class="div_fila cuadro <?php 
        /* CSS del Cuadro */ echo "bloque_cuadro_4"; ?>" >
        <?php web_render_esquinas(0,0);?>
        <div class="barra_arriba"><?php // echo $lang['nuestras_marcas'];?></div>
        <div class="div_borde">

            <?php include("bloques/bloque_marcas2.php"); ?>
            
        </div>
    </div>

