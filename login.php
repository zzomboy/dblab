<?php
	include("template.class.php");
	$layout = new Template("layout.tpl");
	$layout->set('title','Login : IT Online Shopping website');
	$layout->set('content','
<!--Content-->
<!--login form-->
		<div class="register_form login_form">
			<h2>Login</h2>
			<form method="post" action="logincheck.php">
				<div class="clearfix">
					<input type="text" placeholder="Email or User name" name="username" required>
					<br>
					<input type="password" placeholder="Password" name="password" required>
					<br>
					<a href="help.php">forgot password?</a>
					<br>
					<button type="submit" class="cancelbtn">Login</button>	
				</div>	
			</form>	
		</div>
	');
	echo $layout->output();
?>