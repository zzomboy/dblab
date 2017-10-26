<?php 
	$file 	= "data.txt";  
    $fp 	= fopen($file, "r");  
	$tmp_char = fread($fp,5);  
	echo $tmp_char."<br>";  
    fclose($fp);  
?>