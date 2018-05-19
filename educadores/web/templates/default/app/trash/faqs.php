<?php //á
//prin($ITEMS['categorias']);
?>
    <!---->
    
    <div id="listado_productos" class="div_fila cuadro margen_arr <?php 
        /* Style del Cuadro */ echo "bloque_cuadro_6"; ?>" >
        <?php web_render_esquinas(0,0);?>  
        
            <div class="barra_arriba">
                <!--esquinas--><?php web_render_esquinas(1,2);?>
                <h1><?php echo $lang['preguntas_frecuentes']; ?></h1>
            </div>      
			<div class="div_barra"></div>              

	        <div class="div_borde div_inner">

				<ul>
				<?php foreach($PREGUNTAS as $PREGUNTA){ ?>
                
                	<li style="padding-top:10px;">
		                <?php if(trim($PREGUNTA['foto'])!=''){ ?><img  <?php echo $PREGUNTA['get_atributos']; ?> align="left" class="margen_der" /><?php } ?>
                    	<b style="font-size:14px; color:#003366;"><?php echo $PREGUNTA['pregunta'];?></b>
                    	<div style="padding:5px 0;"><?php echo $PREGUNTA['respuesta'];?></div>                    
                    </li>
                
                <?php } ?>
				</ul>

            <div class="clean"></div>
            &nbsp;
                            
			</div>
            

            
    </div>

