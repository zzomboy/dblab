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
	$layout_header->set('menu_home','class="active"');
	$layout_header->set('title','IT Online Shopping website');
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
				<th>Contact<a href="edit_uinfo.php" class="edit_link"><img src="img/edit1.png" width="16px"><span>edit</span></a></th>
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
				<?php echo $row['user_title']." ".$row['user_name']; ?>
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

	<form class="form_input" method="post" action="edit_uaddr_save.php">
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
					<input type="text" name="urecip" value="<?php echo $row['user_recip']; ?>" required>
				</td>
			</tr>
			<tr>
				<td>
					Mobile Phone : 
				</td>
				<td>
					<input type="text" name="urtel" value="<?php echo $row['user_rtel']; ?>" required>
				</td>
			</tr>
			<tr>
				<td>
					Address : 
				</td>
				<td>
					<textarea class="input_addr" rows="5" name="uaddr" required><?php echo $row['user_addr']; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="uid" value="<?php echo $row['user_id']; ?>">
				</td>
				<td>
					<button type="submit" class="signupbtn" name="save_uinfo" value="save">Save</button>
      				<button type="submit" class="cancelbtn" name="save_uinfo" value="cancel">Cancel</button>
				</td>
			</tr>
		</table>
	</form>
<?php
	echo $layout_footer->output();
?>
