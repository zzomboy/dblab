<?php
	$file = "data.txt";
	if(is_writable($file))
		echo "Can write file data.txt";
	else
		echo "Can not write file data.txt";
?>