<?php //á

$THIS=$PARAMS['this'];
//$ITEMS=$LISTADO[$PARAMS['conector']];
?>
<div class="div_fila">

    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques");
        ?>"  >   
        <div class="div_borde div_inner" >
               
            <a class="link" href="<?php echo "index.php?".$filtro_param."modulo=items&tab=documentos_grupos&acc=list";?>"></a>
			<div class="clean"></div>
            
		</div>
        
    </div>

</div>    