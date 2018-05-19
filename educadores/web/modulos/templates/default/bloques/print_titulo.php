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
        ?>" >   
        <div class="div_borde div_inner" >
               
			<a style="color:#000;text-transform:uppercase;" href="index.php?<?php echo $filtro_param;?>modulo=app&tab=home">
			<img src='web/templates/default/img/particular/bloques/home.png' />
			<?php echo $secc['nombre'];?></a>
			<div class="clean"></div>
            
		</div>
        
    </div>

</div>    