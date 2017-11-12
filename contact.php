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
		$uid = $_SESSION['uid'];
	}
	$layout_header->set('title','My account : IT Online Shopping website');
	$layout_header->set('menu_contact','class="active"');
	$layout_header->set('title','Contact us : IT Online Shopping website');
	echo $layout_header->output();

	if(!isset($_SESSION['username']))
	{
		$uname = "";
		$uemail = "";
		$uid=0;
	}else{
		$sql ="SELECT * FROM user WHERE user_id = $uid";
		$result = $mysqli->query($sql) or die("error=$sql");
		$row=$result->fetch_array();
		$uname = $row['user_name'];
		$uemail = $row['user_email'];
	}
?>
<!--Content-->
		<div class="full_page">
			<div class="contact_box">
				<form action="send_message.php" method="post">
					<h3>Contact Us</h3>
					<p>Name</p>
					<input type="text" name="uname" value="<?php echo $uname; ?>" required>
					<p>E-mail</p>
					<input type="text" name="uemail" value="<?php echo $uemail; ?>" required>
					<p>Message</p>
					<textarea name="umes" rows="10" required></textarea>

					<input type="hidden" name="uid" value="<?php echo $uid; ?>">
					
					<button class="submit_bt" type="submit">Submit</button>
				</form>
			</div>
			<div class="contact_text_box">
				<h3>Company Information :</h3>
				<p>99 Lorem Ipsum Dolor Sit,</p>
				<p style="padding: 0 0 0 0;">22-56-2-9 Sit Amet, Lorem,</p>
				<p>Thailand</p>
				<p>Tel. 0-9999-99999</p>
				<p style="padding: 0 0 6px 27px;">0-8888-88888</p>
				<p>Fax. 02-999-9999</p>
				<p>Email: info@dlz.com</p>
				<p>Monday - Saturday </p>
				<p style="padding-top: 0px;">08.30 - 18.10 hrs.</p>

			</div>
			<div class="clear"></div>
		</div>
<?php
	echo $layout_footer->output();
?>
