<?php
	session_start();
	require_once('connect.php');
	include("template.class.php");
	if(!isset($_SESSION['username']))
	{
		$user_login = false;
		$layout_header = new Template("layout_header.tpl");
		$layout_footer = new Template("layout_footer.tpl");
		echo $layout_header->output();
		echo "<br><p>You don't permission to use this page.</p>";
		echo $layout_footer->output();
		exit();
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
			echo $layout_header->output();
			echo "You don't permission to use this page.";
			echo $layout_footer->output();
			exit();
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
				<th>Message</th>
				<th>Reply</th>
			</tr>
	<?PHP
		$q	= "SELECT a.* , b.* FROM contact as a LEFT JOIN (SELECT c.con_id,d.mes_txt, c.time,c.mes_check FROM (SELECT con_id , MAX(mes_datetime) time,mes_check FROM message WHERE mes_from != 1 GROUP BY con_id) c JOIN message d ON c.con_id = d.con_id AND d.mes_datetime = c.time) b ON a.con_id = b.con_id ORDER by time DESC";
		$result	= $mysqli->query($q);
		if(!$result){
			echo "Error on : $q";
		}
		else{
			while($row=$result->fetch_array()){
				if($row['user_id'] != 0){
	?>
				<tr>
					<td>
				<?php 
					if ($row['mes_check'] == 0) {
						echo "<img src='img/mail_close.png' width='24' height='24'>";
					}else{
						echo "<img src='img/mail_open.png' width='24' height='24'>";
					}
				?>						
					</td>
					<td><?php echo  $row['con_name']; ?></td>
					<td><?php echo  $row['con_email']; ?></td>
					<td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo  $row['mes_txt']; ?></td> 
					<td>
						<a href="admin_reply.php?con_id=<?php echo $row['con_id']; ?>"><img src='img/pro_edit.png' width='24' height='24'></a>
					</td>
				</tr>
	<?PHP
				}else{
	?>
				<tr>
					<td>
				<?php 
					if ($row['mes_check'] == 0) {
						echo "<img src='img/mail_close.png' width='24' height='24'>";
					}else{
						echo "<img src='img/mail_open.png' width='24' height='24'>";
					}
				?>	
					</td>
					<td><?php echo  $row['con_name']; ?></td>
					<td><?php echo  $row['con_email']; ?></td>
					<td style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo  $row['mes_txt']; ?></td> 
					<td>
						<a href="admin_read_con.php?con_id=<?php echo $row['con_id']; ?>"><img src='img/read.png' width='24' height='24'></a>
					</td>
				</tr>
	<?PHP
				}
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
