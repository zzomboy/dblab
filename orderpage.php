<?PHP 
	session_start();
	include("connect2.php");
	$total=0;
	$ntotal=0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$ntotal += $qty;
	}
	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d");
	$sql= "INSERT  INTO orders VALUES ('','$timestamp','99999','$ntotal')";
	$mysqli->query($sql) or die("error=$sql");

	$q = "SELECT OrderID FROM orders order by OrderID desc limit 1";
	$result = $mysqli -> query($q);
	$row=$result->fetch_array();
	$orderID = $row['OrderID'];

	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from foods where FoodCode=$p_id";
  		$result = $mysqli->query($sql) or die("error=$sql");
  		$row  = $result->fetch_array();
  		$sum	= $row['Price']*$qty;
  		$total += $sum;
  		$sql = "INSERT  INTO oder_details VALUES ('','$orderID','$p_id','".$row['Price']."','$qty','$sum');";
  		$mysqli->query($sql) or die("error=$sql");
	}
	$_SESSION['cart']=[];
	echo "<script>alert('Order complete');window.location='test.php';</script>";
?>