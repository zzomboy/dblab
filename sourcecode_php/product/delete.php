<?PHP
	$p_id	= $_GET['p_id'];  
	
	include("connect.php");
	$sql = "delete from product where p_id	= '$p_id'";
	mysql_query($sql) or die("error=$sql");

	mysql_close();
	
	@unlink("../img/$p_id.jpg");
	
	echo "<script>window.location='index.php';</script>";
?>
