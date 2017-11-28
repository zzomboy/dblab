<?PHP
	session_start();
    require_once("connect2.php");

    echo "<style>
		.tbs,.tbs td,.tbs th{
			border:1px solid black;
			border-collapse: collapse;
		}

	</style>";

    if(!isset($_SESSION['cart'])){
    	$_SESSION['cart']=[]; 
    }
    if(isset($_GET['clear'])){
    	$_SESSION['cart']=[];
    }
	 
	if(isset($_GET['act']) && $_GET['act']=='add' && !empty($_GET['pid']))
	{
		if(isset($_SESSION['cart'][$_GET['pid']]))
		{
			$_SESSION['cart'][$_GET['pid']]++;
		}
		else
		{
			$_SESSION['cart'][$_GET['pid']]=1;
		}
	}

	if(isset($_GET['act']) && $_GET['act']=='remove' && !empty($_GET['pid']))
	{
		unset($_SESSION['cart'][$_GET['pid']]);
	}

	if(isset($_GET['act']) && $_GET['act']=='update')
	{
		foreach($_POST['qty'] as $p_id=>$qty)
		{
			$_SESSION['cart'][$p_id]=$qty;
		}
	}


	echo '<form method="post" action="?act=update">';
?>
	<div class="ucart_box">
    	<h3>My Cart</h3>
	<?PHP
		$total=0;
	  	if(!empty($_SESSION['cart']))
	  	{	
	  		echo '
	  		<table class="tbs" width="100%">
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Qty</th>
				<th>Total/Product</th>
				<th>Remove</th>
			</tr>
			';
			foreach($_SESSION['cart'] as $pid => $qty )
			{
				$sql	= "select * from foods where FoodCode=$pid";
				$result = $mysqli->query($sql) or die("error=$sql");
				$row	= $result->fetch_array();
				$sum	= $row['Price']*$qty;
				$total	+= $sum;
	?>
		
			<tr>
				<td><?php echo $row['FoodName']; ?></td>
				<td><?php echo number_format($row['Price']); ?></td>
				<td>
					<input type="text" name="qty[<?php echo $pid ?>]" value="<?php echo $qty ?>" size="2" />
				</td>
				<td><?php echo number_format($sum); ?></td>
				<td>			
					<input type="button" value="delete" onclick="window.location.href='cart2.php?pid=<?php echo $pid; ?>&act=remove'">
				</td>
			</tr>
	<?PHP    }   ?>
			<tr>
				<td colspan="3"  style="padding-right: 10px;text-align: right;">Total</td>
				<td><?php echo number_format($total) ?></td>
				<td><input type="button" value="delete all" onclick="window.location.href='cart2.php?clear=1'"></td>
			</tr>
		</table>
		<script>
			function checkoutbt(){
				window.opener.location = 'orderpage.php';
		    	window.close();
			}
		</script>
		<input type="submit" class="cartbt" value="update" />
		<input type="button" class="cartbt" value="checkout" onclick="checkoutbt()">
	<?PHP
		}else
		{
			echo "<div class='empcart'>Cart is empty.</div>";
		}
	?>
	</div>
</form>