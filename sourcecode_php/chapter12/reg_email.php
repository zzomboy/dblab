<?php
	function checkpattern($data)
	{
		$pattern= "^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$";
		if(ereg($pattern,$data))
		{
			echo "<u>$data</u> match in pattern";
		}else
		{
			echo "<u>$data</u> not match in pattern";
		}
	}
	
	checkpattern("x_not22@hotmail.com");
	echo "<br>";
	checkpattern("nott@netdesign.ac.th");
	echo "<br>";
	checkpattern("x_not22@hotmail");
?>