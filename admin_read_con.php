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
	$con_id = $_GET['con_id'];
	$sql	= "UPDATE message SET mes_check = 1 WHERE con_id = $con_id";
    $result = $mysqli->query($sql) or die("error=$sql");
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

	<div class="user_right" style="width: 70%;max-width: 550px;">
		<div class="user_read_con">
		<?php
			$q	= "select * from contact as c,message as m WHERE c.con_id = m.con_id and c.con_id = $con_id order by m.mes_datetime";
			$result	= $mysqli->query($q);
			if(!$result){
				echo "Error on : $q";
			}
			else{
				$row=$result->fetch_array();
				echo '<table class="user_contact">
						<tr>
							<th>Message</th>
							<th></th>
						</tr>
						<tr>
							<td>
								Name :
							</td>
							<td>
								'.$row['con_name'].'
							</td>
						</tr>
						<tr>
							<td>
								Email : 
							</td>
							<td>
								'.$row['con_name'].'
							</td>
						</tr>
						<tr>
							<td>
								Message : 
							</td>
							<td>
								'.$row['mes_txt'].'
							</td>
						</tr>
					</table>';
			}
		?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php
	echo $layout_footer->output();
?>