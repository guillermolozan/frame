<?php //á
$THIS=$PARAMS['this'];

$PAGINA=$OBJECT[$THIS];

?>
<div class="cuadro <?php 
    web_selector_control($SELECTED,$PARAMS['classStyle'],"bloques");
    ?>" ><?php web_render_esquinas(1,2);?>

   <div class="barra_arriba">
   <?php echo $PAGINA['titulo']; ?>
   </div>
   
    <div class="div_borde div_inner">
    
		<ul class="listado_items">
            <li class="listado_item"><a href="http://www.olvacourier.com/infoweb/guiacalles.php">Guía de Calles</a></li>
            <li class="listado_item"><a href="#">Calculadora</a></li>
            <li class="listado_item"><a href="http://www.olvacourier.com/infoweb/rotulado.php">Rotulado de envíos</a></li>
            <li class="listado_item"><a href="http://www.olvacourier.com/infoweb/centrospoblados.php">Centros Poblados</a></li>
            <li class="listado_item"><a href="http://www.olvacourier.com/infoweb/envios_peligrosos.php">Envíos peligrosos</a></li>                                
            <li class="listado_item"><a href="http://www.facebook.com/pages/Olva-club/139287366095682">Olva Club</a></li>                                        
        </ul>
                 
    </div>
</div>

<style>
.id_pages .listado_items .listado_item {
color: #000000;
font-size: 14px;
margin-bottom: 3px;
padding-left: 23px;
background:url("web/templates/default/img/particular/bloques/arbol_1/menu_nivel_1.png") no-repeat scroll 0 2px transparent;
}
.id_pages .listado_items .listado_item a { color:#000; }

</style>
