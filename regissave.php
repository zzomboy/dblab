<?php
	include("connect.php");
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
		echo "<script>alert('Password doesn't match!!!');history.back();</script>";
		exit();
	}
	$sqlC	= "select * from user where uemail = '$uemail'";
	$queryC	= mysql_query($sqlC) or die("error=$sqlC");
	$numC	= mysql_num_rows($queryC);

	if($numC != 0)
	{
		echo "<script>alert('Please change email!!!');history.back();</script>";
		exit();
	}else
	{
		$upw	= base64_encode($upw);
		$sql= "insert into member values('','$uname','$utel','$uemail'
		,'$upw','$gender','$ubirth','$uaddr')";
		mysql_query($sql) or die("error=$sql");
		header("location: user.php");
	}
?>