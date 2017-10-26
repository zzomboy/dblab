<?php
	include("template.class.php");
	$layout = new Template("layout.tpl");
	$layout->set('menu_contact','class="active"');
	$layout->set('title','Contact : IT Online Shopping website');
	$layout->set('content','
<!--Content-->
		<div class="full_page">
			<div class="contact_box">
				<form action="index.php" method="post">
					<h3>Contact Us</h3>
					<p>Name</p>
					<input type="text" name="uname" required>
					<p>E-mail</p>
					<input type="text" name="uemail" required>
					<p>Subject</p>
					<textarea name="usubject" rows="10" required></textarea>
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
	');
	echo $layout->output();
?>