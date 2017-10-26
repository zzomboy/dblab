<?
	session_start();
	if(!isset($_SESSION['username']))
	{
		echo "<script>alert('!! Please Login !! ');
				window.location='index.php';</script>";
		exit();
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>Welcome [<b><?=$_SESSION['username']?></b>]</p>
<p>1. <a href="editform.php">EditProfile</a></p>
<p>2. <a href="passform.php">ChangePassword</a></p>
<p>3. <a href="logout.php">Logout</a></p>


