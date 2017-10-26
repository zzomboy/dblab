<?php
	$file = "writefile.txt";  
    $fp = fopen($file, "w");  
    fwrite($fp,"www.netdesign.ac.th");  
    fclose($fp); 
?>
