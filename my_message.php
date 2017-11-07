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
	echo $layout_header->output();
?>
<!--Content-->
<div class="user_full">
	<div class="user_left">
		<table class="user_menu">
			<tr>
				<th>
					My account
				</th>
			</tr>
			<tr>
				<td>
					<a href="my_account.php">My infomation</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="cart.php?cartfull=1">My cart</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="my_order.php">Order list</a>
				</td>
			</tr>
			<?php if ($_SESSION['type'] != "admin") { ?>
			<tr>
				<td class="active">
					<a href="my_message.php">My message</a>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>
					<a href="logout.php">Logout</a>
				</td>
			</tr>
		</table>
	</div>

	<div class="user_right" style="width: 70%;max-width: 550px;">
		<table class="user_contact user_message">
			<th>Message</th><th></th>
		<?php
			$q	= "select * from message WHERE mes_to = $uid or mes_from = $uid Order by mes_date";
			$result	= $mysqli->query($q);
			if(!$result){
				echo "Error on : $q";
			}
			else{
				while($row=$result->fetch_array()){
					if($row['mes_from'] != $uid){
						echo "<tr>
								<td>
								".$row['mes_subject']."
								</td>
								<td></td>
							</tr>";
					}else{
						echo "<tr>
								<td></td>
								<td style='text-align:right;'>
								".$row['mes_subject']."
								</td>								
							</tr>";
					}
				}
			}

		?>
		</table>
		<form action="user_reply.php" method="post">
			<?php 
				$uq ="SELECT `user_id`,`user_name`,`user_email` FROM `user` WHERE user_id=$uid ";
				$uresult = $mysqli->query($uq);
				$urow=$uresult->fetch_array();
			?>
			<input class="umessage" type="text" name="usubject" rows="10" required>
			<input type="hidden" name="uid" value="<?php echo $urow['user_id']; ?>">
			<input type="hidden" name="uname" value="<?php echo $urow['user_name']; ?>">
			<input type="hidden" name="uemail" value="<?php echo $urow['user_email']; ?>">
			<button class="sendbt" type="submit">Send</button>
		</form>
	</div>
	<div class="clear"></div>
</div>
<?php
	echo $layout_footer->output();
?>
