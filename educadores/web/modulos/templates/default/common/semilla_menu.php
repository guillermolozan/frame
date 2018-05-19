<?php //á 
$THIS=$PARAMS['this'];
$object=$OBJECT[$THIS];
?>
<div class="div_fila">           

    <div class="div_fila div_menu <?php 
    web_selector_control($SELECTED,$THIS,"menus",1);	
    ?>"><?php
    web_render_menu($object['menu'],array(
                                                'lados_externos'=>0
                                                ,'lados_internos'=>1
                                                ,'lados_flotantes'=>0
                                                ,'menu_borde'=>0
                                                ,'id'=>'menu_main'
                                                ,'rel'=>'son_menu_main'
                                                //,'ul'=>'div'													
                                                ),'h2');
    ?></div>
    
    <?php	
    foreach($object['menu'] as $gm){ 
    ?><div id="son_menu_main_<?php echo $gm['id'];?>" class="div_fila_overflow div_menu <?php 
    web_selector_control($SELECTED,$THIS.'2',"menus",1);
    ?>" ><?php
    web_render_menu($gm['submenu'],array(
                                        'lados_externos'=>0
                                        ,'lados_internos'=>0
                                        ,'lados_flotantes'=>0
                                        ,'id'=>'menu2_main_'.$gm['id']
                                        ,'rel'=>'son_menu2_main_'.$gm['id']
                                        ,'menu_borde'=>0
                                        ),'h3');
                                        ?></div><?php
    }
	
    ?>

    <?php foreach($object['menu_fotos'] as $item){ 
    ?><div id="son_menu2_main_<?php echo $item['id_grupo'];?>_<?php echo $item['id']; ?>" class="div_fila_overflow <?php 
    web_selector_control($SELECTED,$THIS.'3',"listados,bloques",1);
    ?>">
    <div class="div_inner">
        <ul class="listado_items">   
            <li class="listado_item" >
               <div class="capa" >
                 <div class="inner">
                     <?php /*
                     <div class="div_columna" style="width:185px;">
                     <a class="titulo" href="<?php echo $item['url'];?>"><?php echo $item['nombre'];?></a>
                     <a class="subtitulo"  href="<?php echo $item['url'];?>"><?php echo $item['codigo'];?></a>
                     <a class="texto"  href="<?php echo $item['url'];?>"><?php echo $item['precio'];?></a>
                     </div> 
                     */ ?>
                     
                     <div class="div_columna">
                     <a class="foto" href="<?php echo $item['url'];?>"><?php echo "<img ".$item['foto']['atributos']."/>"; ?></a>
                     </div>
                 </div>
               </div>
            </li>
         </ul>   
    <div class="clean"></div>
    </div>
    </div><?php } ?>

</div>
<?php /* ?>
<script>
window.addEvent('domready', function() {
	$$('.id_header_menus li.li').each(function(ee){	over_menu({e:ee,x:'left',y:'bottom',rel:'element'}); });
	$$('.id_header_menus2 li.li').each(function(ee){ over_menu({e:ee,x:'left',y:'bottom',rel:'element'}); });
});
</script>
<?php */ ?>