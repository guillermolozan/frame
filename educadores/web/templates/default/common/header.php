<?php //á
$THIS=$PARAMS['this'];
$object=$OBJECT[$THIS];

?><div class="div_fila cuadro <?php 
web_selector_control($SELECTED,$THIS,"bloques,menus");	
?>">
	<div class="div_borde div_inner">
        <div class="fecha">Educadores Perú, <?php echo str_replace(",","",fecha_formato("now()","2")); ?></div>
		<!--<h1 class="main_title"><?php echo $HEAD['titulo_H1'] ?></h1>--> 

<!--        	<?php if(!empty($COMMON['variables']['url_facebook'])){ ?>
        <div class="div_columna" style="position:absolute; top:10px; right:140px; ">
        <a href="<?php echo $COMMON['variables']['url_facebook']; ?>" target="_blank" ><img src="web/templates/default/img/iconos/facebook.jpg"></a>
        </div>
        <?php } ?> -->

<!--         <?php if(!empty($COMMON['variables']['url_twitter'])){ ?>
       	<div class="div_columna" style="position:absolute; top:10px; right:105px; ">
        <a href="<?php echo $COMMON['variables']['url_twitter']; ?>" target="_blank" ><img src="web/templates/default/img/iconos/twitter.jpg"></a>
        </div>
        <?php } ?>

        <?php if(!empty($COMMON['variables']['url_youtube'])){ ?>
       	<div class="div_columna" style="position:absolute; top:10px; right:67px; ">
        <a href="<?php echo $COMMON['variables']['url_youtube']; ?>" target="_blank" ><img src="web/templates/default/img/iconos/youtube.jpg"></a>
        </div>
        <?php } ?>

        <?php if(!empty($COMMON['variables']['url_radio'])){ ?>
       	<div class="div_columna" style="position:absolute; top:4px; right:11px; ">
        <a href="<?php echo $COMMON['variables']['url_radio']; ?>" target="_blank" ><img src="web/templates/default/img/iconos/radio.jpg"></a>
        </div>
        <?php } ?> -->

		<div class="clean"></div>
        
	</div>
</div>