<?php //á

$ITEMS=$LISTADO['videos_columna_izquierda'];
//prin($ITEMS);

?>

<div id="bloque_categorias_arbol" class="cuadro <?php 
	web_selector_control($SELECTED,$THIS,"bloques,listados");
    ?>" >
    <?php web_render_esquinas(1,4);?>
    <div class="barra_arriba"><?php echo $ITEMS['titulo'];?></div>
    <div class="div_borde div_inner" >
    
    	<?php if($ITEMS['tren']!=''){ ?>
        <!--PAGINACION DEL LISTADO-->
        <div class="listado_paginacion div_barra"  >     	
            <!--<span class="total"><?php echo $ITEMS['total']." ".$lang['productos'];?></span>-->
            &nbsp;<?php echo $ITEMS['anterior']." ".$ITEMS['tren']." ".$ITEMS['siguiente']; ?>
        </div>
        <?php } ?>
        <!--GRILLA-->
        <ul class="listado_items">
        <?php  
        if(sizeof($ITEMS['filas'])==0){ ?><p class="vacio"><?php echo $ITEMS['vacio']; ?></p><?php } else {
    
            foreach($ITEMS['filas'] as $i=>$item){ 
            ?>
            <li class="listado_item <?php if($item['foto']){ ?>listado_item_con_foto<?php } ?>" >
                <!--fecha-->                                
                <div class="fecha"><?php echo $item['fecha'];?></div>
                <!--titulo-->                                
                <div class="titulo"><a href="<?php echo $item['link'];?>"><?php echo $item['titulo'];?></a></div>
                <!--texto-->                                
                <div class="texto"><a href="<?php echo $item['link'];?>"><?php echo $item['texto'];?></a></div>                
            </li>
            <?php 
            }
        }
        ?>
        </ul>
        <!--PAGINACION DEL LISTADO-->
        <!--
        <?php if($ITEMS['total']>0){ ?>
            <div class="listado_paginacion div_barra">
            &nbsp;<?php echo $ITEMS['anterior']." ".$ITEMS['tren']." ".$ITEMS['siguiente']; ?>
            </div>
        <?php } ?>
        -->
    </div>
    <div class="barra_abajo"></div>

</div>