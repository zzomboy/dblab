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
	$layout_header->set('title','My account : IT Online Shopping website');
	$layout_header->set('title','IT Online Shopping website');
	echo $layout_header->output();
?>
<!--Content-->
<!--login form-->
		<div class="register_form login_form">
			<h2>Login</h2>
			<form method="post" action="logincheck.php">
				<div class="clearfix">
					<input type="text" placeholder="Email" name="username" required>
					<br>
					<input type="password" placeholder="Password" name="password" required>
					<br>
					<a href="help.php">forgot password?</a>
					<br>
					<button type="submit" class="cancelbtn">Login</button>	
				</div>	
			</form>	
		</div>
<?php
	echo $layout_footer->output();
?>