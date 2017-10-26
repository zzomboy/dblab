<?php
	function checkpattern($data)
	{
		$pattern= "/\(?\d{3}\)?[-\s.]?\d{3}[-\s.]\d{4}/x";
		if(ereg($pattern,$data))
		{
			echo "<u>$data</u> match in pattern";
		}else
		{
			echo "<u>$data</u> not match in pattern";
		}
	}
	
	checkpattern("(021)423-2323");
	echo "<br>";
	checkpattern("{021}423-2323");
?>
