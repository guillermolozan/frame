<?php //á

$THIS=$PARAMS['this'];
//$SLIDE=$SLIDESHOW[$PARAMS['conector']];
//$ITEMS=array($LISTADO[$PARAMS['conector']][sizeof($LISTADO[$PARAMS['conector']])-1]);
$ITEMS=$OBJECT[$PARAMS['this']];
// prin($ITEMS);  
$ITEMS['titulo']=( ($ITEMS['genero']==1)?'Profesor':'Profesora' )." ".$ITEMS['nombre']." ".$ITEMS['apellidos'];
$ITEMS['filas']=$ITEMS['temas'];
// prin($ITEMS['filas']);
?>

<div class="clean"></div>
        
<div id="<?php echo $THIS;?>" style="position:relative;" class="listado_productos cuadro <?php 
	web_selector_control($SELECTED,$THIS,"bloques,listados");
	?>" >
    <?php web_render_esquinas(1,4);?>      
        
	<?php /* ?>
    <div class="div-buscador div_absoluto" style="z-index:1;" >
    <?php web_render_buscador($_GET['buscar']); ?>
    </div>
    <?php */ ?>
    
    
   <?php 
   echo ($ITEMS['url'])?'<a class="barra_arriba" href="'.$ITEMS['url'].'">':'<div class="barra_arriba">';
   //web_render_item_borde('bors-b',1,2);?
   echo $ITEMS['titulo'];
   echo ($ITEMS['url'])?'</a>':'</div>';
   ?>
   
      

    <div class="clean"></div>

    <div class="cuadro" >     
        <div class="div_borde div_inner" >

      <ul id="profile">
        <?php if($ITEMS['foto']!=''){ ?><li><img <?php echo $ITEMS['get_atributos']; ?> ></li><?php } ?>
        <li><label>Nombre</label><span><?php echo $ITEMS['nombre']." ".$ITEMS['apellidos']; ?></span></li>
        <li><label>Institución Educativa</label><span><?php echo $ITEMS['colegio']; ?></span></li>
        <li><label>Cod. CPPE</label><span><?php echo $ITEMS['codigo']; ?></span></li>
        <li><label>Area</label><span><?php echo $ITEMS['area']; ?></span></li>
      </ul>

      <div class="num"><?php echo sizeof($ITEMS['filas'])." temas" ?></div>


		<?php  
        if(sizeof($ITEMS['filas'])==0){ ?><p class="vacio"><?php echo $ITEMS['vacio']; ?></p><?php } else {
            ?>
            <ul  class="listado_items">   
            <?php foreach($ITEMS['filas'] as $item){  ?>                                             
                    <li class="listado_item">
                       <div class="capa" >
                         <div class="inner" >
                            <div class="area"><?php echo $item['area']['nombre']; ?></div>
                         	  <?php web_render_item($item,$item['esquema']); ?>								
                            <div class="clear"></div>
                         </div>                                     
                       </div>                    
                    </li>							   
            <?php } ?>
            </ul> 
            <?php 
        }
        ?>
        </div>
	</div>
    
    <div class="barra_abajo">
    	<div class="listado_paginacion">
    	<?php echo $ITEMS['anterior']." ".$ITEMS['tren']." ".$ITEMS['siguiente']; ?>
        <!--<a class="ver_todos">Ver todos los productos de esta categoría</a>-->
        </div>
   </div>  

</div> 
       

	<?php /*
	<script>
	window.addEvent('domready', function() {
	 
		ReMooz.assign('.listado_items .listado_item a.foto', {
			'origin': 'img',
			'shadow': 'onOpenEnd', // fx is faster because shadow appears after resize animation ( alue can be true, onOpenEnd )
			'resizeFactor': 0.8, // resize to maximum 80% of screen size
			'cutOut': false, // don't hide the original
			'opacityResize': 0.4, // opaque resize
			'dragging': true, // disable dragging
			'centered': true // resize to center of the screen, not relative to the source element
		});
	 
	});
	</script>
    */ ?>
    