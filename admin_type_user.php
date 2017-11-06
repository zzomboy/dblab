<?php
	session_start();
	require_once('connect.php');
	$type = $_GET['type'];
	$uid = $_GET['uid'];
	$sql = "UPDATE  user SET user_type = '$type' WHERE user_id = $uid";
	$result	= $mysqli->query($sql);
	if(!$result){
		echo "Error on : $sql";
		exit();
	}
	header("location: admin_user.php");
	exit();
?>