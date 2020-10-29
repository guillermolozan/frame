<?php 
 $C_SERVER='mysql.capuhost.com'; 
    //base de datos 
    $C_BASE_DATOS='siat200_bdalmacen'; 
    //usuario y contraseña de la base de datos mysql 
    $C_USUARIO='siat200_admin'; 
    $C_CONTRASENA='admin123'; 
    //ruta archivo de salida  
    //(el nombre lo componemos con Y_m_d_H_i_s para que sea diferente en cada backup) 
    $C_RUTA_ARCHIVO = 'backup/backup_'.date("Y_m_d_H_i_s").'.sql'; 
    //si vamos a comprimirlo 
    $C_COMPRIMIR_MYSQL='true'; 
     
     
    //comando 
    $command = "mysqldump --opt -h ".$C_SERVER." ".$C_BASE_DATOS." -u ".$C_USUARIO." -p".$C_CONTRASENA." -r \"".$C_RUTA_ARCHIVO."\" 2>&1"; 
           
    //ejecutamos 
    system($command); 
	
	?>