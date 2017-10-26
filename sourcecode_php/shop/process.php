<?PHP 
	session_start();
	//ข้อมูลลูกค้า
	$name 		= $_POST["name"];
	$address	= $_POST["address"];
	$email 		= $_POST["email"];
	$phone 		= $_POST["phone"];
	
	$webmaster 	= "nott@localhost.com";  
	
	$subject 	= "Order from website";
	$header 	= "MIME-Version: 1.0\n"
			  	. "Content-Type:text/html; charset=utf-8\n";
	$header 	.= "From: $email\n";
		
	$body		=	"ชื่อลูกค้า    :: $name <br>";
	$body		.=	"ที่อยู่	   :: $address <br>";
	$body		.=	"อีเมล      :: $email <br>";
	$body		.=	"เบอร์ติดต่อ  :: $phone <br><br>";
	$body		.=	"<font color=blue><b><u>รายการสินค้าที่สั่งซื้อ</u></b></font><br>";

	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from product where p_id=$p_id";
		$query	= mysql_query($sql) or die("error=$sql");
		$row	= mysql_fetch_array($query);
		$sum	= $row['p_price']*$qty;
		
		$total	+= $sum;
	
		$body	.= "id  $p_id ) ::{$row['p_name']}  จำนวน  {$qty}  ชิ้น<br>";		
	}	
	$body		.=	"<br><b>จำนวนเงินรวมทั้งหมด  $total  บาท</b><br><br>";
	
	
	mail($webmaster, $subject, $body, $header);
	
	session_destroy();
	
	echo "<script>alert('Order complete');window.location='product.php';</script>";

?>