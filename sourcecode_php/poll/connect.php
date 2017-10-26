<?PHP
  	// 1.	เชื่อมต่อเซิร์ฟเวอร์ MySQL
	$conn 	= mysql_connect("localhost","root","123")or die(mysql_error());
	// 2.	เลือกฐานข้อมูลที่ต้องการใช้งาน 
	$db		= mysql_select_db("book")or die("cannot select DB");
	mysql_query("SET NAMES UTF8"); 
?>
