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
<div class="user_full">
	<div class="user_left">
		<table class="user_menu">
			<tr>
				<th>
					Admin page
				</th>
			</tr>
			<tr>
				<td class="active">
					<a href="admin.php">Product management</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_add_product.php">Add Product</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_user.php">User management</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="contact_read.php">View Contacts</a>
				</td>
			</tr>
		</table>
	</div>

	<div class="admin_right">
		<div class="admin_search_box">
     		<form>
     			<input type="text" placeholder="Search"}">
     			<input type="submit" value="">
     		</form>
     	</div>
		<div class="clear"></div>

		<h2>CPU</h2>
		<table class="product_tb">
			<tr>
				<td>
					asd
				</td>
			</tr>
		</table>

	</div>
	<div class="clear"></div>
</div>
<?php
	echo $layout_footer->output();
?>
