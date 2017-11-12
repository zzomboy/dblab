<?php
	session_start();
	require_once('connect.php');
	$umes = $_POST['umes'];
	$uid = $_POST['uid'];
	$uname = $_POST['uname'];
	$uemail = $_POST['uemail'];
	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d H:i:s");

	if($uid == 0){
		$sql = "insert into contact values('','$uname','$uemail','$uid')";
		$mysqli->query($sql) or die("error=$sql");

		$sql = "SELECT * FROM contact WHERE user_id = $uid order by con_id desc";
		$result = $mysqli->query($sql) or die("error=$sql");
		$row = $result->fetch_array();
		$con_id = $row['con_id'];
	}else{
		$sql ="SELECT * FROM contact WHERE user_id = $uid";
		$result = $mysqli->query($sql) or die("error=$sql");

		if(mysqli_num_rows($result) > 0){
			$row = $result->fetch_array();
			$con_id = $row['con_id'];
		}else{
			$sql = "insert into contact values('','$uname','$uemail','$uid')";
			$mysqli->query($sql) or die("error=$sql");

			$sql = "SELECT * FROM contact WHERE user_id = $uid";
			$result = $mysqli->query($sql) or die("error=$sql");
			$row = $result->fetch_array();
			$con_id = $row['con_id'];
		}
	}

	$sql = "insert into message values('','$con_id','$uid','$umes','".$timestamp."',0)";
	$mysqli->query($sql) or die("error=$sql");
	if($uid == 0){
		echo "<script>alert('Send message successfully. And we will reply to your email.');history.back();</script>";
		exit();
	}else{
		header("location: my_message.php");
		exit();
	}
?>