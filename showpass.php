<?php
	session_start();
	require_once('connect.php');
	include("template.class.php");
	if(!isset($_SESSION['username']))
	{
		$user_login = false;
		$layout_header = new Template("layout_header.tpl");
		$layout_footer = new Template("layout_footer.tpl");
	}
	else{
		$user_login = true;
		if($_SESSION['type'] == 'admin'){
			$layout_header = new Template("layout_login_header_admin.tpl");
			$layout_footer = new Template("layout_login_footer_admin.tpl");
		}
		else{
			$layout_header = new Template("layout_login_header.tpl");
			$layout_footer = new Template("layout_login_footer.tpl");
		}
	}
	$layout_header->set('title','Forgot Password : IT Online Shopping website');
	echo $layout_header->output();

	$uemail	= $_POST['uemail'];
	$utel	= $_POST['utel'];
	$q 	= "select * from user where user_email='".$uemail."' and user_tel='".$utel."'";
	$result	= $mysqli->query($q);
	if(!$result){
		echo "Error on : $q";
	}

	$numR = $result->num_rows;
	if($numR==0)
	{
		echo "<script>alert('!! Incorrect Email  or Mobile phone !!');history.back();</script>";
		exit();
	}
	else
	{
		$row = $result->fetch_array();
		$upass = base64_decode($row['user_pw']);
	}
?>
<!--Content-->
<!--login form-->
		<div class="register_form login_form">
			<h2>Your password is</h2>
			<form method="post" action="login.php">
				<div class="clearfix">
					<p style="text-align: center;font-size: 17px;"><?php echo $upass ?></p>
					<br>
					<button type="submit" class="cancelbtn">Go back to login page</button>
				</div>
			</form>	
		</div>
<?php
	echo $layout_footer->output();
?>