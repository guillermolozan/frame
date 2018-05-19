<?php //á

$THIS=$PARAMS['this'];

$ITEMS=$OBJECT[$PARAMS['this']];

if($_GET['tab']!='obras_fotos'){
//prin($ITEMS['menu']);
?>
<div class="div_fila">
    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"menus");
        ?>" >
        <div class="div_menu">
		<?php web_render_menu($ITEMS['menu'],array(
                                                    'lados_externos'=>1
                                                    ,'lados_internos'=>1
                                                    ,'lados_flotantes'=>1
                                                    //,'id'=>'menu_main'
                                                    ),'h4'); ?>           
        </div>
        <div class="clear"></div>
    </div>
</div>        
<?php } ?>
<div class="div_fila">
    <div class="cuadro <?php 
        web_selector_control($SELECTED,$THIS,"bloques,arboles,listados,menus");
        ?>" >
        <?php web_render_esquinas(1,4);?>        
        <div class="barra_arriba">
			<?php //web_render_item_borde('bors-b',1,2);?>        
	   		<?php web_render_item($ITEMS['header']); ?>                
       	</div>
       	<div class="div_borde div_inner">
	   		<?php web_render_tree($ITEMS['items']); ?>
        </div>
        <div class="barra_abajo">
			<?php //web_render_item_borde('bors-b',1,2);?> 
	   		<?php web_render_item($ITEMS['footer']); ?>             
       	</div>
        
	</div>
</div>