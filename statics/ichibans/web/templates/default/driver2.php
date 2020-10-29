<?php //á
include("common/head.php");
?>
<body>
<?php
include("common/header_out.php");
echo HTML_ALL_INICIO;
echo HTML_MAIN_INICIO;
include("common/header_pre.php");
?>
<div id="contenido_margen">
<?php
include("common/header.php");
include("common/header_after.php");
include("common/menu.php"); 
include("common/status.php"); 
include("common/bar.php"); 
?>  
<div class="div_fila div_canvas">
    <?php
	//prin($Esquema);
    //echo '<div class="div_fila">';
    foreach($Esquema as $Linea){ 
        if(!is_array($Linea)){ 
        //echo '<div class="div_fila">'; 
        include(incluget($Linea)); 
        //echo '</div>'; 
        } else {
            $numCols=sizeof($Linea);
            echo '<div class="div_fila">';
            foreach($Linea as $ii=>$Line){
                echo ($numCols>1)?'<div class="div_columna div_col_'.($ii+1).'d'.$numCols.'">':'';
                    if(!is_array($Line)){ 
                    //echo '<div class="div_fila">'; 
                    include(incluget($Line)); 
                    //echo '</div>'; 
                    } else {
                        foreach($Line as $Lin){ 
                            //echo '<div class="div_fila">'; 
                            include(incluget($Lin)); 
                            //echo '</div>';
                        } 
                    }
                echo ($numCols>1)?'</div>':'';
            }
            echo '</div>';
            }
        }
    //echo '</div>';		
    //echo '<div class="clean"></div>';
    ?>
</div>
<?php	
include("common/footer_pre.php"); 
include("common/footer.php"); 
?>
</div>
<?php
include("common/footer_after.php"); 
echo HTML_MAIN_FIN;	
echo HTML_ALL_FIN;
include("common/footer_out.php"); 
?>
</body>
</html>