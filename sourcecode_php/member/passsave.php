<?PHP
	session_start();
	if(!isset($_SESSION['username']))
	{
		echo "<script>alert('!! Please Login !! ');window.location='index.php';</script>";
		exit();
	}
	include("connect.php");
	$username	= $_SESSION['username'];
	$oldpassword	= base64_encode($_POST['oldpassword']);
	$newpassword	= base64_encode($_POST['newpassword']);
	$renewpassword	= base64_encode($_POST['renewpassword']);
	
	// check ข้อมูลที่กรอกเข้ามา ต้องตรบทั้ง 3 ตัว
	if(empty($oldpassword)||empty($newpassword)||empty($renewpassword))
	{
		echo "<script>alert('Please refill form !!!');history.back();</script>";
		exit();
	}

	// select ข้อมูล password เดิม ของ member คนนี้ออกมาจาก database
	$sql 	= "select * from member where username='$username'";
	$query	= mysql_query($sql) or die("error=$sql");
	$row	= mysql_fetch_array($query);
	
	// check password เดิมใน database ว่าตรงกับ password เดิมทีั่กรอกมา($oldpassword)หรือไม่
	if($row['password']!=$oldpassword)
	{
		// ถ้าไม่ตรงกลับไปกรอกใหม่
		echo "<script>alert('Please Check OldPassword !!!');history.back();</script>";
		exit();
	}
	// ถ้า ตรง check $newpassword และ $renewpassword ต้องตรงกัน
	if($newpassword!=$renewpassword)
	{
		echo "<script>alert('Please Check NewPassword !!!');history.back();</script>";
		exit();
	}
	// แก้ไขข้อมูล password ของ  member คนนี้ใน database 
	$sqlU = "update member set password='$newpassword' where username='$username'";
	mysql_query($sqlU) or die("error=$sqlU");
	echo "<script>alert(' ++ Complete ++ ');window.location='main.php';</script>";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
