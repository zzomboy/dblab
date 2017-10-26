<?php
	$array 	= array('red','green','blue','black','white');
	$find1	= 'blue'; 
	$find2	= 'pink'; 
	if(in_array($find1,$array))
		echo "Have $find1 in set";
	else
		echo "Don't have $find1 in set";
	
	echo "<br>";
		
	if(in_array($find2,$array))
		echo "Have $find2 in set";
	else
		echo "Don't have $find2 in set";
?>