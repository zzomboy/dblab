<?php
	$animal = array('Cat','dog','Bird','camel','Fish','bear');
	
	foreach($animal as $data)
	{
		if(ereg("[a]",$data))
		{
			echo "$data มีตัว a เป็นส่วนหนึ่งด้วย <br>";
		}else
		{
			echo "$data ไม่มีตัว a เป็นส่วนหนึ่งด้วย <br>";
		}
	}
?>