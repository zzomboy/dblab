<?php
	$text = "www.netdesign.ac.th";
	function showTXT1() 
	{  
	   	echo $text;  
    }

	function showTXT2() 
	{  
	 	global 	$text;
	   	echo $text;  
    }
	showTXT1();
	showTXT2();
?>
