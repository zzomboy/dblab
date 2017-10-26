<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
	include("connect.php");
	$username	 =$_POST['username'];
	$password	 =$_POST['password'];
	$confirm	 =$_POST['confirm'];
	$name		 =$_POST['name'];
	$lastname	 =$_POST['lastname'];
	$gender		 =$_POST['gender'];
	$day		 =$_POST['day'];
	$month		 =$_POST['month'];
	$year		 =$_POST['year'];
	$address	 =$_POST['address'];
	$email		 =$_POST['email'];

	// ตรวจสอบการกรอกข้อมูลที่ไม่ควรให้มีการเว้นว่าง
	if(empty($username)||empty($password)||empty($confirm)||empty($name)||empty($lastname))
	{
		echo "<script>alert('กรอกข้อมูลไม่ครบคร๊าบบ !!!');history.back();</script>";
		exit();
	}
	// ตรวจสอบ Password และ Comfirm Password ต้องกรอกตรงกัน 
	if($password  != $confirm)
	{
		echo "<script>alert('Please check password!!!');history.back();</script>";
		exit();
	}
	// ตรวจสอบวัันเกิดที่กรอกเข้ามานั้น เป็นวันที่ ที่มีอยู่จริงหริอไม่
	if(!checkdate($month,$day,$year))
	{
		echo "<script>alert('Please check Birthday!!!');history.back();</script>";
		exit();
	}
	// select ข้อมูล username ว่าเคยมีการใช้งานไปแล้วหรือไม่
	$sqlC	= "select * from member where username='$username'";
	$queryC	= mysql_query($sqlC) or die("error=$sqlC");
	$numC	= mysql_num_rows($queryC);
	// ถ้า username มีการใช้งา่นไปแล้ว จะให้แจ้งเตือนเพื่อให้เปลี่ยน username ที่ต้องการใช้
	if($numC != 0)
	{
		echo "<script>alert('Please change USERNANE!!!');history.back();</script>";
		exit();
	}else
	{
		// ถ้า username ยังไม่ีการใช้งาน เตรียมนำข้อมูลไปบันทึกลงในตาราง 
		$birthday	= "$year-$month-$day"; // เตรียมข้อมูลจาก list/menu ทั้ง 3 มาจัดเพื่อเตรียมเก็บลงตาราง
		$password	= base64_encode($password); // เข้ารหัสข้อมูล ก่อนจัดเก็บข้อมูลลงตาราง
		$sql= "insert into member values('','$username','$password','$name'
		,'$lastname','$gender','$birthday','$address','$email')";
		mysql_query($sql) or die("error=$sql");
		echo "<script>alert(' ++ Complete ++ ');window.location='index.php';</script>";
	}
?>
