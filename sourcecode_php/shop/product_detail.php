<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>
</head>

<body>
<?PHP
    include("connect.php");
	$p_id 	= @$_GET['p_id'];
	$sql	= "select * from product where p_id=$p_id";
	$query	= mysql_query($sql) or die("error=$sql");
	$row	= mysql_fetch_array($query);
?>
<table width="600" border="0" align="center" class="square">
  <tr>
    <td colspan="3" bgcolor="#CCCCCC"><strong>Product</strong></td>
  </tr>
  <tr>
    <td width="85" valign="top"><strong>Title</strong></td>
    <td width="279"><?PHP echo $row['p_name']?></td>
    <td width="70" rowspan="4">
	<?PHP 
	if(file_exists("img/{$row['p_id']}.jpg"))
	{
	?>
	<img src="img/<?PHP echo $row['p_id']?>.jpg" width="100" border="0">	
	<?PHP
	}
	?>
	 </td>
  </tr>
  <tr>
    <td valign="top"><strong>Detail</strong></td>
    <td><?PHP echo $row['p_detail']?></td>
  </tr>
  <tr>
    <td valign="top"><strong>Price</strong></td>
    <td><?PHP echo $row['p_price']?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="style1">
    <a href="cart.php?p_id=<?PHP echo $row['p_id']?>&act=add">Add to cart</a></span></td>
  </tr>
</table>
</body>
</html>
