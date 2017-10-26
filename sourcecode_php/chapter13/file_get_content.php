<?php
	$data = file_get_contents('file_content.txt');
	echo nl2br($data);
?>