<?php
	session_start();
	require_once('connect.php');
	$uemail	= $_POST['uemail'];
	$q 	= "select * from user where user_email='".$uemail."'";
	$result	= $mysqli->query($q);
	if(!$result){
		echo "Error on : $q";
	}

	$numR = $result->num_rows;
	if($numR==0)
	{
		echo "<script>alert('!! Incorrect Email !!');history.back();</script>";
		exit();
	}
	else
	{
		$row = $result->fetch_array();
		$upass = base64_decode($row['user_pw']);
		$msg = "Your password is ".$upass;
		mail($row['user_email'],"Forgot password : DLZ IT Online Shopping website",$msg);
		header("location: login.php");
		exit();
	}
?>