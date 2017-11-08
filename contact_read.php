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
	$layout_header->set('title','View contact : IT Online Shopping website');
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
				<td>
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
					<a href="admin_check_order.php">User Orders</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_user.php">User management</a>
				</td>
			</tr>
			<tr>
				<td class="active">
					<a href="contact_read.php">View Messages</a>
				</td>
			</tr>
		</table>
	</div>

	<div class="ucart_right" >
		<div class="ucart_box" >
			<h3>Messages</h3>
			<table class="admin_con_tb" style="width: 100%;table-layout: fixed;">
			<tr>
				<th></th>
				<th>Name</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Reply</th>
			</tr>
	<?PHP
		$q	= "SELECT * FROM `message` WHERE mes_to = 1 GROUP by mes_email ORDER BY `mes_check`, `mes_date` DESC";
		$result	= $mysqli->query($q);
		if(!$result){
			echo "Error on : $q";
		}
		else{
			while($row=$result->fetch_array()){
	?>
				<tr>
					<td></td>
					<td><?php echo  $row['mes_name']; ?></td>
					<td><?php echo  $row['mes_email']; ?></td>
					<td><?php echo  $row['mes_subject']; ?></td> 
					<td>
						<a href="admin_reply.php?mes_to=<?php echo $row['mes_from']; ?>"><img src='img/pro_edit.png' width='24' height='24'></a>
					</td>
				</tr>
	<?PHP
			}	
		}
	?>
			</table>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php
	echo $layout_footer->output();
?>
