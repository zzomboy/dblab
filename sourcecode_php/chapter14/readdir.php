<?php 
	$dir = opendir("./file");  
    while($text = readdir($dir))
	{  
             echo $text."<br/>"; 
    }
    closedir($dir); 
?>
