<?php //á
//prin($ITEMS['categorias']);

$THIS=$PARAMS['this'];

$PAGINA=$PAGES[$THIS];

?>
<div id="<?php echo $THIS;?>" class="cuadro <?php 
	web_selector_control($SELECTED,$THIS,"bloques,formularios");
	?>" >
        
       <div class="barra_arriba">
       <?php web_render_item_borde('bors-b',1,2);?>        
       <?php echo $PAGINA['titulo']; ?>
       </div>
       
                    
        <div class="div_borde div_inner" >
       
       
        <div style="clear:left;">
        <?php echo $PAGINA['texto']; ?>        
        </div>
        
                
        <form class="formularios">
        
            <div class="camps">
            <label for="emision">Emisión</label>
            <input type="text"  id="emision" style="width:50px;"  />
            
            <label for="remito">Remito</label>	
            <input type="text" 	id="remito" style="width:50px;" />        
            
            <input type="button" value="seguimiento" onclick="render_seguimiento();" />
            </div>
        
        </form>
        
                
        <iframe id="compras" name="compras" style="width:100%;height:500px; border:0px;"></iframe>
                
        
        </div>
        
    </div>
                   
<script>
function render_seguimiento(){
	$('compras').src='http://www.olvacourier.com/detalle_bypass.php?txtEmision='+$('emision').value+'&txtRemito='+$('emision').value+'&txtSalida=1&head=0';
}
</script>
