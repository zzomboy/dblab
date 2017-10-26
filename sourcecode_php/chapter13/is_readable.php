<?php
	$file = "data.txt";
	if(is_readable($file))
		echo "Can read file data.txt";
	else
		echo "Can not read file data.txt";
?>