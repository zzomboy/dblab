<?php
	include("template.class.php");
	$layout = new Template("layout.tpl");
	$layout->set('menu_home','class="active"');
	$layout->set('title','IT Online Shopping website');
	$layout->set('content','


	');
	echo $layout->output();
?>