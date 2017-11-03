<?php
	session_start();
	require_once('connect.php');
	$username	= $_POST['username'];
	$password	= base64_encode($_POST['password']);
	
	$q 	= "select * from user where user_email='".$username."' and user_pw='".$password."'";
	$result	= $mysqli->query($q);
	if(!$result)
		echo "Error on : $q";

	$numR = $result->num_rows;
	if($numR==0)
	{
		echo "<script>alert('!! Login Fail !!');history.back();</script>";
		exit();
	}
	else
	{
		$row=$result->fetch_array();
		$type=$row['user_type'];
		$uid=$row['user_id'];
		$_SESSION['username'] = $username;
		$_SESSION['type'] = $type;
		$_SESSION['uid'] = $uid;
		header("location: index.php");
		exit();
	}
?>



