<?PHP
	session_start();
    include("connect.php");
	session_register("cart");  

?>
<form id="frmcart" name="frmcart" method="post" action="process.php">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td bgcolor="#F9D5E3">สินค้า</td>
      <td align="center" bgcolor="#F9D5E3">ราคา</td>
      <td align="center" bgcolor="#F9D5E3">จำนวน</td>
      <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
    </tr>
<?PHP
	$total=0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from product where p_id=$p_id";
		$query	= mysql_query($sql) or die("error=$sql");
		$row	= mysql_fetch_array($query);
		$sum	= $row['p_price']*$qty;
		$total	+= $sum;
?>
    <tr>
      <td><?php echo $row['p_name'] ?>&nbsp;</td>
      <td align="right"><?php echo $row['p_price'] ?>&nbsp;</td>
      <td align="right"><?php echo $p_id?></td>
      <td align="right"><?php echo $sum ?>&nbsp;</td>
    </tr>
<?PHP
	}
?>    <tr>
      <td colspan="3" bgcolor="#F9D5E3">Total</td>
      <td align="right" bgcolor="#F9D5E3"><?php echo $total ?>
      </td>
    </tr>
    <tr>
      <td colspan="4"><table width="100%" border="0" cellspacing="0">
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
       <tr>
          <td colspan="2" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
          </tr>
        <tr>
          <td bgcolor="#EEEEEE">ชื่อ</td>
          <td><input name="name" type="text" id="name" /></td>
        </tr>
        <tr>
          <td width="22%" bgcolor="#EEEEEE">ที่อยู่</td>
          <td width="78%">
      <textarea name="address" cols="35" rows="5" id="address"></textarea>
          </td>
        </tr>
        <tr>
          <td bgcolor="#EEEEEE">อีเมล</td>
          <td><input name="email" type="text" id="email" /></td>
        </tr>
        <tr>
          <td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
          <td><input name="phone" type="text" id="phone" /></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#CCCCCC">
        <input type="submit" name="Submit2" value="checkout" /></td>
    </tr>
  </table>
</form>
