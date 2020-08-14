<?php
    
    $navs=[
        [
            'name'=>'Home',
            'url'=>'index.php',
        ],
        [
            'name'=>'Postventa',
            'url'=>'postventa.php',
        ],  
        [
            'name'=>'Concesionarios',
            'url'=>'concesionarios.php',
        ],
        [
            'name'=>'Promociones',
            'url'=>'promociones.php',
        ],
        [
            'name'=>'Financiamiento',
            'url'=>'financiamiento.php',
        ], 
        [
            'name'=>'Contáctenos',
            'url'=>'contactenos.php',
        ],                              
    ];
    
?>
<div class="container">
    <nav class="navbar">
    <ul class="nav nav-tabs justify-content-center">
        <?php
            foreach($navs as $item){

                echo '<li class="nav-item">';
                echo '<a class="nav-link " href="'.$item['url'].'">'.$item['name'].'</a>';
                echo '</li>';

            }
        ?>                                   
    </ul>
</nav>
</div>