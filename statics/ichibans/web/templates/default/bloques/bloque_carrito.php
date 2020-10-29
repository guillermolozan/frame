<?php //á
//unset($_SESSION['carrito']);
//prin(json_encode($_SESSION['carrito']));
//prin($_SESSION['carrito']); 

$THIS=$PARAMS['this'];

?>
<div id="div_carrito" class="cuadro <?php 
	web_selector_control($SELECTED,$THIS,"bloques,carritos");
	?>" >
     <div id="actualizar_carrito" style="display:none;">actualizando carrito</div>
</div>
<script type="text/javascript">
//window.addEvent('domready', function() {
render_carrito(<?php echo json_encode($_SESSION['carrito']);?>,{main:'0',precio:'1',enviar:'1'});
//});
</script>