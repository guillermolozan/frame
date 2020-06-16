<?php

$data = json_decode(file_get_contents("data.json"),true);

?>
<!DOCTYPE html>
<html lang="es">

    <?php include("head.php"); ?>

    <body>

        <main class="container row">

            <h1>Tecnología</h1>

            <ul class="col s12">
                <?php 
                    foreach($data as $i=>$item){

                        include("post_item.php"); 

                    } 
                ?>
            </ul>

        </main>
    </body>
</html>