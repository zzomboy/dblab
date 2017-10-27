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
		$layout_header = new Template("layout_login_header.tpl");
		$layout_footer = new Template("layout_login_footer.tpl");
	}
	$layout_header->set('title','My account : IT Online Shopping website');
	echo $layout_header->output();
?>
<!--Content-->
		<table class="user_contact">
		<?php
			$username = $_SESSION['username'];
			$q	= "select * from user where user_email = '$username'";
			$result	= $mysqli->query($q);
			if(!$result){
				echo "Error on : $q";
			}
			else{
				$row=$result->fetch_array();
			}
		?>
			<tr>
				<th>Contact</th>
				<th></th>
			</tr>
			 <tr>
				<td>
					E-mail : 
				</td>
				<td>
				<?php echo $row['user_email']; ?>
				</td>
			</tr>
			<tr>
				<td>
					Name : 
				</td>
				<td>
				<?php echo $row['user_name']; ?>
				</td>
			</tr>
			<tr>
				<td>
					Mobile Phone : 
				</td>
				<td>
				<?php echo $row['user_tel']; ?>
				</td>
			</tr>
			<tr>
				<td>
					Birthday : 
				</td>
				<td>
				<?php echo $row['user_birth'];?>
				</td>
			</tr>
		</table>
		<table class="user_contact">
			<tr>
				<th>Address</th>
				<th></th>
			</tr>
			<tr>
				<td>
					Recipient`s name : 
				</td>
				<td>
					<?php echo $row['user_name'];?>
				</td>
			</tr>
			<tr>
				<td>
					Mobile Phone : 
				</td>
				<td>
					<?php echo $row['user_tel'];?>
				</td>
			</tr>
			<tr>
				<td>
					Address : 
				</td>
				<td>
					<?php echo $row['user_addr'];?>
				</td>
			</tr>
		</table>
<?php
	echo $layout_footer->output();
?>