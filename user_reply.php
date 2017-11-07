<?php
	session_start();
	require_once('connect.php');
	$uid = $_POST['uid'];
	$usubject = $_POST['usubject'];
	$uname = $_POST['uname'];
	$uemail = $_POST['uemail'];
	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d H:i:s");

	$sql = "insert into message values('','$uname','$uemail','$usubject','".$timestamp."',$uid,1,1)";
	$mysqli->query($sql) or die("error=$sql");
	header("location: my_message.php");
	exit();
?>