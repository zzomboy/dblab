<?php
	$file = "data.txt";
	if(is_file($file))
		echo "This is file";
	else
		echo "This is Folder";
?>