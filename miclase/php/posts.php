<?php
$dataJson=file("data.json",true);
$data=json_decode($dataJson);
echo '<pre>';
print_r($data[0]);
echo '</pre>';
exit();
?>
<!DOCTYPE html>
<html lang="es">
    <?php include("head.php"); ?>
    <body class="p-posts p-grid p-1">
        <main class="container row">
            <div class="wide">
                <div class="post">
                    <div class="col m12">
                        <article class="card-panel">
                            <div class="card-title">
                                <h1><span>Tecnología</span></h1>
                            </div>
                            <div class="productos_item row">
                                <ul class="col s12">
                                    <?php 
                                        foreach($data as $i=>$item){
                                            include("post_item.php"); 
                                        } 
                                    ?>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>