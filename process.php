<?PHP 
	session_start();
	include("connect.php");
	//ข้อมูลลูกค้า
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

	$_SESSION['cart']=[];
	$sql= "insert into user_order values('','$uid','$pros','".date('Y-m-d')."','$order_to','$total',1)";
	$mysqli->query($sql) or die("error=$sql");
	echo "<script>alert('Order complete');window.location='my_order.php';</script>";
?>