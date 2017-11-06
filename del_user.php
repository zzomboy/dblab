<?PHP
	session_start();
	require_once('connect.php');
	$delete_id = $_GET['delete_id'];  

	$sql = "delete from user where user_id = '$delete_id'";
	$result	= $mysqli->query($sql);
	if(!$result){
		echo "Error on : $sql";
		exit();
	}
	
	echo "<script>history.back();</script>";
?>
