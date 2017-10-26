<?php
	session_start();
	
	$_SESSION['a'] = "This is >>a<<";
	$_SESSION['b'] = "This is >>b<<";
	echo $_SESSION['a']."<br>";
	echo $_SESSION['b']."<br>";
	
	unset($_SESSION['b']);
?>
<br>
<a href="session_unset2.php">page 2</a>