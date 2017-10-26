<?php
	require_once('connect.php');
	$uname	 =$_POST['uname'];
	$utel	 =$_POST['utel'];
	$uemail	 =$_POST['uemail'];
	$upw	 =$_POST['upw'];
	$upw_repeat =$_POST['upw_repeat'];
	$gender	 =$_POST['gender'];
	$ubirth	 =$_POST['ubirth'];
	$uaddr	 =$_POST['uaddr'];

	if($upw  != $upw_repeat)
	{
		echo "<script>alert('Password doesn`t match!!!');history.back();</script>";
		exit();
	}

	$q	= "select * from user where user_email = '".$uemail."'";
	$result	= $mysqli->query($q);
	if(!$result)
		echo "Error on : $q";

	$numR = $result->num_rows;

	if($numR != 0)
	{
		echo "<script>alert('Please change email!!!');history.back();</script>";
		exit();
	}else
	{
		$upw	= base64_encode($upw);
		$sql= "insert into user values('','$uname','$utel','$uemail'
		,'$upw','$gender','$ubirth','$uaddr','member')";
		$mysqli->query($sql) or die("error=$sql");
		header("location: my_account.php");
	}
?>