<?php
	session_start();
	require_once('connect.php');
	$uid = $_POST['uid'];
	$urecip = $_POST['urecip'];
	$urtel = $_POST['urtel'];
	$uaddr = $_POST['uaddr'];
	$submitbt = $_POST['save_uinfo'];
	
	$q	= "select * from user where user_email = '$uid'";
	$result	= $mysqli->query($q);
	if(!$result){
		echo "Error on : $q";
	}
	if($submitbt != "save"){
		header("location: my_account.php");
		exit();
	}
	else{
		$sql = "UPDATE user SET user_recip = '$urecip' , user_rtel = '$urtel' , user_addr = '$uaddr' WHERE user_id = '$uid'";
		$mysqli->query($sql) or die("error=$sql");
		header("location: my_account.php");
		exit();
	}
?>