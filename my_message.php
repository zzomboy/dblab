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
		<div class="user_message_scroll" id="message_scroll">
		<?php
			$q	= "select * from contact as c,message as m WHERE c.con_id = m.con_id and c.user_id = $uid order by m.mes_datetime";
			$result	= $mysqli->query($q);
			if(!$result){
				echo "Error on : $q";
			}
			else{

				if(mysqli_num_rows($result) > 0){
					echo "<table width=100% style='table-layout: fixed;'>";
					while($row=$result->fetch_array()){
						if($row['mes_from'] != $uid){
							echo "<tr><td colspan='2' class='admin_mes'>".$row['mes_txt']."</td></tr>";
						}else{
							echo "<tr><td colspan='2' class='user_mes'>".$row['mes_txt']."</td></tr>";
						}
						$con_id = $row['con_id'];
						$con_name = $row['con_name'];
						$con_email = $row['con_email'];
					}
					echo "</table>";
				}
				else{
					$con_id = 0;
					$sql ="SELECT * FROM user WHERE user_id = $uid";
					$result = $mysqli->query($sql) or die("error=$sql");
					$row=$result->fetch_array();
					$con_name = $row['user_name'];
					$con_email = $row['user_email'];
				}
			}
		?>
		</div>
		<form action="user_reply.php" method="post">
			<input class="umessage" type="text" name="umes" rows="10" required>

			<input type="hidden" name="con_id" value="<?php echo $con_id; ?>">
			<input type="hidden" name="uid" value="<?php echo $uid; ?>">
			<input type="hidden" name="uname" value="<?php echo $con_name; ?>">
			<input type="hidden" name="uemail" value="<?php echo $con_email; ?>">

			<button class="sendbt" type="submit">Send</button>
		</form>
	</div>
	<div class="clear"></div>
</div>
<?php
	echo $layout_footer->output();
?>
<script type="text/javascript">
	var message_scroll = document.getElementById("message_scroll");
	message_scroll.scrollTop = message_scroll.scrollHeight;
</script>
