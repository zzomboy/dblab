<?php
	$car = array('honda','toyota','ford','benz','mazda');
	
	foreach($car as $data)
	{
		echo ereg_replace("[o]",'O',$data)."<br>";
	}
?>