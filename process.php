<?PHP 
	session_start();
	include("connect.php");
	$urecip = $_POST["urecip"];
	$urtel = $_POST["urtel"];
	$uaddr = $_POST["uaddr"];
	$order_to = $urecip."^".$urtel."^".$uaddr;
	$pros ="";
	$uid = $_SESSION['uid'];
	$total=0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from product where pro_id=$p_id";
  		$result = $mysqli->query($sql) or die("error=$sql");
  		$row  = $result->fetch_array();
  		$sum	= $row['pro_psale']*$qty;
  		$pros = $pros.$row['pro_name']."?".$row['pro_psale']."?".$qty."?".$sum."@";
  		$total += $sum;
	}
	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d H:i:s");
	$sql= "INSERT  INTO `user_order` VALUES ('','$uid','$pros','".$timestamp."','$order_to','$total','1')";
	$mysqli->query($sql) or die("error=$sql");
	$_SESSION['cart']=[];
	echo "<script>alert('Order complete');window.location='my_order.php';</script>";
?>