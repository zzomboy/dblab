<?php
	$conn = mysql_connect("localhost","root","")or die(mysql_error());
	$db	= mysql_select_db("dblab")or die("cannot select DB");
	mysql_query("SET NAMES UTF8"); 
?>
