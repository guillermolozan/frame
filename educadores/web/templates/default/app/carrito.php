<?php //á
//prin($ITEMS['categorias']);

$THIS=$PARAMS['this'];
?>

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques,carritos");
        ?>" >
        <?php web_render_esquinas(1,4);?>
		<div id="actualizar_carrito" style="display:none;">actualizando carrito</div>
    
       <div class="barra_arriba">
       <?php web_render_item_borde('bors-b',1,2);?>        
        Estatus de compra
       </div>
             
        <div class="div_borde div_inner" id="div_carrito">
        </div>
        
    </div>
                   
<script type="text/javascript">
//window.addEvent('domready', function() {
render_carrito(<?php echo json_encode($_SESSION['carrito']);?>,{main:'1',precio:'1',enviar:'1'});
//});
</script>

