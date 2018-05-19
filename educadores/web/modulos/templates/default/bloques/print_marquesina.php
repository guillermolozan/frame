<?php //á

$THIS=$PARAMS['this'];
//$ITEMS=$LISTADO[$PARAMS['conector']];

$secc=$SECCIONES[$_GET['sec']];
$filtro_where=$secc['where'];
$filtro_param=$secc['param'];
$filtro_nombre=$secc['nombre'];
$filtro_color=$secc['color'];
?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques");
        ?>" style="background-color:<?php echo $filtro_color; ?>; color:#FFF;"  >   
        <div class="div_borde div_inner" >
               
			<marquee>Ustéd se encuentra en la página principal de <?php echo $secc['nombre'];?></marquee>
			<div class="clean"></div>
            
		</div>
        
    </div>

</div>    