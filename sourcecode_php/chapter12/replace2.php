<?php
	$car = array('honda','toyota','ford','benz','mazda');
	
	foreach($car as $data)
	{
		echo ereg_replace("(.*)a",strtoupper($data),$data)."<br>";
	}
?>