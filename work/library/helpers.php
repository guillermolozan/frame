<?php


// está la aguja en el pajar
function inString($haystack, $needle) 
{ 
    $pos=strpos($haystack, $needle); 
    if ($pos !== false) 
    { 
        return $pos; 
    } 
    else 
    { 
        return -1; 
    } 
} 

require CORE.'/library/mysql.php';
