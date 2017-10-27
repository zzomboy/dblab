<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		echo "<script>alert('!! Please Login !! ');</script>";
		$user_login=false;
		echo "x";
	}
	else{
		$user_login=true;
		echo "z";
	}
?>