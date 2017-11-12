<?php
	session_start();
	require_once('connect.php');
	$umes = $_POST['umes'];
	$con_id = $_POST['con_id'];
	$uid = $_POST['uid'];
	$uname = $_POST['uname'];
	$uemail = $_POST['uemail'];
	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d H:i:s");

	if($_POST['con_id'] == 0){
		$sql = "insert into contact values('','$uname','$uemail','$uid')";
		$mysqli->query($sql) or die("error=$sql");
		$sql = "SELECT * FROM contact WHERE user_id = $uid";
		$result = $mysqli->query($sql) or die("error=$sql");
		$row=$result->fetch_array();
		$uid = $row['user_id'];
		$con_id = $row['con_id'];
	}

	$sql = "insert into message values('','$con_id','$uid','$umes','".$timestamp."',0)";
	$mysqli->query($sql) or die("error=$sql");
	header("location: my_message.php");
	exit();
?>