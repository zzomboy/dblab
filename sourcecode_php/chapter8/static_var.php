<?php 
	function increase() 
	{  
		static 	$a=1;  
		$b=1;
		echo "a=>".$a."<br>";  
		echo "b=>".$b."<br><hr>";  
		$a++; 
		$b++; 
	}
	increase();  
	increase();  
	increase();  
?>
