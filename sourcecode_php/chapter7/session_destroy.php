<?php
	session_start();
	$_SESSION['a'] = "This is >>a<<";
	$_SESSION['b'] = "This is >>b<<";
	echo $_SESSION['a'];
	echo "<br>";
	echo $_SESSION['b'];
	session_destroy();
?>
<br>
<a href="session_destroy2.php">page 2</a>
