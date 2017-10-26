<?php
	$animal = array('Cat','dog','Bird','camel','Fish','bear');
	
	foreach($animal as $data)
	{
		if(ereg("^c",$data))
		{
			echo "คำว่า $data ขึ้นต้นด้วยตัว c  <br>";
		}
	}
	echo "<hr>";
	foreach($animal as $data)
	{
		if(eregi("^c",$data))
		{
			echo "คำว่า $data ขึ้นต้นด้วยตัว c  <br>";
		}
	}
?>