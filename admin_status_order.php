<?php
	session_start();
	require_once('connect.php');
	$ostatus = $_GET['ostatus'];
	$oid = $_GET['oid'];
	$sql= "UPDATE user_order SET status_id = '$ostatus' WHERE order_id = '$oid'";
	$mysqli->query($sql) or die("error=$sql");
	header("location: admin_check_order.php");
	exit();
?>