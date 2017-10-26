<?php
	$file = "data.txt";
	echo filectime($file)."<br>";
	echo date("Y-m-d H:i:s",filectime($file))."<br>";
?>