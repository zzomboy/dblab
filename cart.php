<?PHP
	session_start();
    require_once("connect.php");
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


	if(isset($_GET['cartfull'])){
		include("template.class.php");
		if(!isset($_SESSION['username']))
		{
			$user_login = false;
			$layout_header = new Template("layout_header.tpl");
			$layout_footer = new Template("layout_footer.tpl");
		}
		else{
			$user_login = true;
			if($_SESSION['type'] == 'admin'){
				$layout_header = new Template("layout_login_header_admin.tpl");
				$layout_footer = new Template("layout_login_footer_admin.tpl");
			}
			else{
				$layout_header = new Template("layout_login_header.tpl");
				$layout_footer = new Template("layout_login_footer.tpl");
			}
			$uid = $_SESSION['uid'];
		}
		$layout_header->set('title',' Cart : IT Online Shopping website');
		echo $layout_header->output();
		echo "<div class='user_full'>
	<div class='user_left'>
		<table class='user_menu'>
			<tr>
				<th>
					My account
				</th>
			</tr>
			<tr>
				<td>
					<a href='my_account.php'>My infomation</a>
				</td>
			</tr>
			<tr>
				<td class='active'>
					<a href='cart.php?cartfull=1'>My cart</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href='my_order.php'>Order list</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href='my_message.php'>My message</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href='logout.php'>Logout</a>
				</td>
			</tr>
		</table>
	</div>
	<div class='ucart_right'>";
	}
?>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<?php 
if(isset($_GET['cartfull'])){
	echo '<form method="post" action="?act=update&cartfull=1">';
}else{
	echo '<form method="post" action="?act=update">';
}
?>
	<div class="ucart_box">
    	<h3>My Cart</h3>
	<?PHP
		$total=0;
	  	if(!empty($_SESSION['cart']))
	  	{	
	  		echo '
	  		<table class="ucart_tb" width="100%">
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
				$sql	= "select * from product where pro_id=$pid";
				$result = $mysqli->query($sql) or die("error=$sql");
				$row	= $result->fetch_array();
				$sum	= $row['pro_psale']*$qty;
				$total	+= $sum;
	?>
		
			<tr>
				<td><?php echo $row['pro_name']; ?></td>
				<td><?php echo number_format($row['pro_psale']); ?></td>
				<td>
					<input type="text" name="qty[<?php echo $pid ?>]" value="<?php echo $qty ?>" size="2" />
				</td>
				<td><?php echo number_format($sum); ?></td>
				<td>
			<?php
				if(!isset($_GET['cartfull'])){
					echo "<a href='cart.php?pid=$pid&act=remove' class='confirmation'><img src='img/pro_delete.png' width='24' height='24'></a>";
				}else{
					echo "<a href='cart.php?pid=$pid&act=remove&cartfull=1' class='confirmation'><img src='img/pro_delete.png' width='24' height='24'></a>";
				}
			?>
				</td>
			</tr>
	<?PHP    }   ?>
			<tr>
				<td colspan="3"  style="padding-right: 10px;text-align: right;">Total</td>
				<td><?php echo number_format($total) ?></td>
				<td><a href='cart.php?clear=1&cartfull=1' class='confirmation'><img src='img/pro_delete.png' width='24' height='24'></a></td>
			</tr>
		</table>
	<?php
		if (isset($_GET['cartfull'])) {
			?>
			<input type="button" class="cartbt" value="checkout" onclick="window.location='confirm.php';">
			<?php
		}else{
	?>
			<script>
				function checkoutbt(){
					window.opener.location = 'confirm.php';
			    	window.close();
				}
			</script>
			<input type="button" class="cartbt" value="checkout" onclick="checkoutbt()">
	<?php 
		}
	?>
		<input type="submit" class="cartbt" value="update" />
	<?PHP
		}else
		{
			echo "<div class='empcart'>Cart is empty.</div>";
		}
	?>
	</div>
</form>
<?php
	if (isset($_GET['cartfull'])) {
		echo "</div>
		<div class='clear'></div>
	</div>";
		echo $layout_footer->output();
	}
	
?>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script> 