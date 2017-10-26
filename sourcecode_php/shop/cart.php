<?PHP
	session_start();
    include("connect.php");
	session_register("cart");  

	if($_REQUEST['act']=='add' && !empty($_REQUEST['p_id']))
	{
		if(isset($_SESSION['cart'][$_REQUEST['p_id']]))
		{
			$_SESSION['cart'][$_REQUEST['p_id']]++;
		}
		else
		{
			$_SESSION['cart'][$_REQUEST['p_id']]=1;
		}
	}

	if($_REQUEST['act']=='remove' && !empty($_REQUEST['p_id']))
	{
		unset($_SESSION['cart'][$_REQUEST['p_id']]);
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
      <span class="style1">ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รวม/รายการ</td>
      <td align="center" bgcolor="#EAEAEA">remove</td>
    </tr>
<?PHP
	$total=0;
  	if(!empty($_SESSION['cart']))
  	{
		foreach($_SESSION['cart'] as $p_id=>$qty)
		{
			$sql	= "select * from product where p_id=$p_id";
			$query	= mysql_query($sql) or die("error=$sql");
			$row	= mysql_fetch_array($query);
			$sum	= $row['p_price']*$qty;
			$total	+= $sum;
?>
    <tr>
      <td width="334"><?php echo $row['p_name'] ?>&nbsp;</td>
      <td width="46" align="right"><?php echo $row['p_price'] ?></td>
      <td width="57" align="right">
      <input type="text" name="qty[<?php echo $p_id?>]"
      value="<?php echo $qty?>" size="2" /></td>
      <td width="93" align="right"><?php echo $sum ?>&nbsp;</td>
      <td width="46" align="center">
      <a href="cart.php?p_id=<?PHP echo $p_id?>&act=remove">remove</a>
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
