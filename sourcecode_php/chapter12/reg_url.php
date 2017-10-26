<?php
	function checkpattern($data)
	{
		$pattern= "^([a-zA-Z0-9]([a-zA-Z0-9\-\/\:]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$";
		if(ereg($pattern,$data))
		{
			echo "<u>$data</u> match in pattern";
		}else
		{
			echo "<u>$data</u> not match in pattern";
		}
	}
	
	checkpattern("http://www.netdesign.ac.th");
	echo "<br>";
	checkpattern("www.netdesign.ac.th");
	echo "<br>";
	checkpattern("netdesign.ac.th");
	echo "<br>";
	checkpattern("www.netdesign");
?>
