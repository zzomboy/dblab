<?PHP
	session_start();
	if(!isset($_SESSION['username']))
	{
		echo "<script>alert('!! Please Login !! ');window.location='index.php';</script>";
		exit();
	}
	include("connect.php");
	$name		 =$_POST['name'];
	$lastname	 =$_POST['lastname'];
	$gender		 =$_POST['gender'];
	$day		 =$_POST['day'];
	$month		 =$_POST['month'];
	$year		 =$_POST['year'];
	$address	 =$_POST['address'];
	$email		 =$_POST['email'];

	if(empty($name)||empty($lastname))
	{
		echo "<script>alert('Please refill form !!!');history.back();</script>";
		exit();
	}
	
	if(!checkdate($month,$day,$year))
	{
		echo "<script>alert('Please check Birthday!!!');history.back();</script>";
		exit();
	}
	
		$birthday	= "$year-$month-$day";
		$sql= "update member set
				name		= '$name',
				lastname	= '$lastname',
				gender		= '$gender',
				birthday	= '$birthday',
				address		= '$address',
				email		= '$email'
				where username	= '{$_SESSION['username']}'";
		mysql_query($sql) or die("error=$sql");
		echo "<script>alert(' ++ Complete ++ ');window.location='main.php';</script>";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
