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
?>
<!--Content-->
<!--login form-->
		<div class="register_form login_form">
			<h2>Enter your email</h2>
			<form method="post" action="showpass.php">
				<div class="clearfix">
					<input type="text" placeholder="Enter your Email" name="uemail" required>
					<input type="text" placeholder="Enter your Mobile phone" name="utel" required>
					<br>
					<button type="submit" class="cancelbtn">Submit</button>	
				</div>	
			</form>	
		</div>
<?php
	echo $layout_footer->output();
?>