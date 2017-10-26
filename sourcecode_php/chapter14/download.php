<?php
	header("Content-Type: application/download"); 
    header("Content-Disposition: attachment; filename=\"Display.jpg\"");  
    $f = fopen("attach/Display.jpg", "r");  
    $data = fread($f, filesize("attach/Display.jpg"));
    fclose($f);
    echo $data; 
?>
