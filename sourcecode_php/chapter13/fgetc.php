<?php 
	$file 	= "data.txt";  
    $fp 	= fopen($file, "r");  
    while (!feof($fp))
	{  
         	$tmp_char = fgetc($fp);  
	   		echo $tmp_char."&nbsp;";  
    }
    fclose($fp);  
?>