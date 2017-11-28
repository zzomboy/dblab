<?php
	session_start();
	require_once('connect2.php');
	echo "<style>
		.tbs,.tbs td,.tbs th{
			border:1px solid black;
			border-collapse: collapse;
		}

	</style>";

	date_default_timezone_set("Asia/Bangkok");
	$timestamp = date("Y-m-d");
	$q = "select * from orders where OrderDate = '$timestamp'";
	$result = $mysqli -> query($q);
	echo "<h3>สรุปการขายรายวัน</h3>";
	echo "<table class='tbs'>
		<tr>
		<th>Order ID</th>
		<th>Customer Code</th>
		<th>Total</th>
		</tr>";

	while ($row=$result->fetch_array()) {
		echo "<tr><td>";
		echo $row['OrderID'];
		echo "</td><td>";
		echo $row['CustomerCode'];
		echo "</td><td>";
		echo $row['Total'];
		echo "</td></tr>";
	}
	echo "</table>";
?>