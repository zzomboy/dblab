<?php
	session_start();
	require_once('connect.php');
	$uid = $_POST['uid'];
	$utitle	 = $_POST['utitle'];
	$uname	 = $_POST['uname'];
	$utel	 = $_POST['utel'];
	$uemail	 = $_POST['uemail'];
	$ubirth	 = $_POST['ubirth'];
	$submitbt = $_POST['save_uinfo'];
	
	$q	= "select * from user where user_uid = '$uid'";
	$result	= $mysqli->query($q);
	if(!$result){
		echo "Error on : $q";
	}
	if($submitbt != "save"){
		header("location: my_account.php");
		exit();
	}
	else{
		$sql = "UPDATE user SET user_title = '$utitle' , user_name = '$uname' , user_tel = '$utel' , user_email = '$uemail' , user_birth = '$ubirth' WHERE user_id = '$uid'";
		$mysqli->query($sql) or die("error=$sql");
		$_SESSION['username'] = $uemail;
		header("location: my_account.php");
		exit();
	}
?>