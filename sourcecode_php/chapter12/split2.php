<?php
	$string = "AAAAxBBBxCCCXDDDxEEE";
	$chunks = split ("x", $string);
	foreach($chunks as $data)
	{
		echo "$data <br>";
	}
	echo "<hr>";
	$chunks = spliti ("x", $string);
	foreach($chunks as $data)
	{
		echo "$data <br>";
	}
?> 