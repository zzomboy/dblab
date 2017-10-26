<?php
	$file = "data.txt";
	echo fileatime($file)."<br>";
	echo date("Y-m-d H:i:s",fileatime($file))."<br>";
?>