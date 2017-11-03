<?PHP
	session_start();
    require_once("connect.php");
	$_SESSION['cart']="";  

	if($_REQUEST['act']=='add' && !empty($_REQUEST['pid']))
	{
		if(isset($_SESSION['cart'][$_REQUEST['pid']]))
		{
			$_SESSION['cart'][$_REQUEST['pid']]++;
		}
		else
		{
			$_SESSION['cart'][$_REQUEST['pid']]=1;
		}
	}

	if($_REQUEST['act']=='remove' && !empty($_REQUEST['pid']))
	{
		unset($_SESSION['cart'][$_REQUEST['pid']]);
	}

	if($_REQUEST['act']=='update')
	{
		foreach($_POST['qty'] as $p_id=>$qty)
		{
			$_SESSION['cart'][$p_id]=$qty;
		}
	}
?>
<style type="text/css">
<!--
.style1 {
	color: #003399;
	font-weight: bold;
}
-->
</style>
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <span class="style1">Cart</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">Product</td>
      <td align="center" bgcolor="#EAEAEA">Price</td>
      <td align="center" bgcolor="#EAEAEA">Qty</td>
      <td align="center" bgcolor="#EAEAEA">total/product</td>
      <td align="center" bgcolor="#EAEAEA">remove</td>
    </tr>
<?PHP
	$total=0;
  	if(!empty($_SESSION['cart']))
  	{
		foreach($_SESSION['cart'] as $pid => $qty )
		{
			$sql	= "select * from product where pro_id=$pid";
			$result = $mysqli->query($sql) or die("error=$sql");
			$row	= $result->fetch_array();
			$sum	= $row['pro_price']*$qty;
			$total	+= $sum;
?>
    <tr>
      <td width="334"><?php echo $row['pro_name'] ?>&nbsp;</td>
      <td width="46" align="right"><?php echo $row['pro_price'] ?></td>
      <td width="57" align="right">
      <input type="text" name="qty[<?php echo $pid ?>]"
      value="<?php echo $qty ?>" size="2" /></td>
      <td width="93" align="right"><?php echo $sum ?>&nbsp;</td>
      <td width="46" align="center">
      <a href="cart.php?pid=<?PHP echo $p_id?>&act=remove">remove</a>
      </td>
    </tr>
<?PHP    }   ?>
    <tr>
      <td colspan="3" bgcolor="#CEE7FF">Total</td>
      <td align="right" bgcolor="#CEE7FF"><?php echo $total ?>&nbsp;</td>
      <td align="left" bgcolor="#CEE7FF">&nbsp;</td>
    </tr>
    <tr>
      <td><a href="product.php">Back to product</a> </td>
      <td colspan="4" align="right">
      <input type="submit" name="button" id="button" value="update" />
      <input type="button" name="Submit2" value="checkout" 
      onclick="window.location='confirm.php';" /></td>
    </tr>
<?PHP
	}else
	{
		echo "<tr><td colspan='5' align='center'>
			Cart is empty  >>> <a href='product.php'>view product</a><<<
			</td></tr>";	
	}
?>
  </table>
</form>
