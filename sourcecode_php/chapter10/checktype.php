<?php
	$data1 = 100;
	$data2 = 12.34;
	
	if(is_int($data1))
	{
		echo "$data1 is integer";
	}
	echo "<br>";	
	if(is_float($data2))
	{
		echo "$data2 is flost number";
	}
	echo "<br>";	
	if(is_numeric($data1))
	{
		echo "$data1 is real number";
	}
	echo "<br>";	
	if(is_numeric($data2))
	{
		echo "$data2 is real number";
	}
?>