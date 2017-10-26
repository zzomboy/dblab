<?php 
	$file 	= "data.txt";  
    $fp 	= fopen($file, "r");  
    while (!feof($fp))
	{  
         	$tmp_char = fgets($fp);  
	   		echo $tmp_char."<br>";  
    }
    fclose($fp);  
?>