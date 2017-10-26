<?php
	function checkpattern($data)
	{
		$pattern= "([0-9]{1,3}\.){3}[0-9]{1,3}";
		if(ereg($pattern,$data))
		{
			echo "<u>$data</u> match in pattern";
		}else
		{
			echo "<u>$data</u> not match in pattern";
		}
	}
	
	checkpattern("202.44.35.95");
	echo "<br>";
	checkpattern("127.0.0.1");
	echo "<br>";
	checkpattern("192.168.0");
?>
