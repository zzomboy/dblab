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
	$pid = $_GET['pid'];
	$q	= "select * from product where pro_id = '$pid'";
	$result	= $mysqli->query($q);
	if(!$result){
		echo "Error on : $q";
	}
	else{
		$row=$result->fetch_array();
	}
	$layout_header->set('title',$row['pro_name'].' : IT Online Shopping website');
	echo $layout_header->output();
?>
<!--Content-->
		<div class="full_page">
			<div class="preview_box">
				<h3><?php echo $row['pro_name']; ?></h3>
				<div class="pic_desc_box">
					<div class="pic_box">
					<?php
						if (file_exists("img/product/".$row['pro_pic'])) {
								echo "<img src='img/product/".$row['pro_pic']."'>";
							}
							else{
								echo "<img src='img/product/noimgfoundsmall.jpg'>";
							}
						?>
					</div>
					<div class="desc_box">
						<p><?php echo $row['pro_name']; ?></p>
						<ul>
							<?php
								$nline_desc = explode("!",$row['pro_desc']);
								foreach ($nline_desc as $value) {
									if(trim($value)!="")
										echo "<li>".$value."</li>";
								}
							?>
						</ul>
						<span>Warranty <?php echo $row['pro_warr']; ?></span>
						<?php
						if($row['pro_price'] == $row['pro_psale']){
							echo "<h2>Price ".number_format($row['pro_psale'])." THB</h2>";
						}else{
							echo "<h2>Price ".number_format($row['pro_psale'])." THB <span><del>".number_format($row['pro_price']).".-</del></span></h2>";
						}
						if($user_login){
					?>		<div style='text-align:center;'>
								<a href="#" onclick="window.open('cart.php?pid=<?php echo $row['pro_id']; ?>&act=add', 'Cart', 'width=700, height=300'); return false;"><button class='addtocart'>Add to cart</button></a>
							</div>
					<?php
						}
						else{
					?>
							<div style="text-align:center">
								<div class="tooltip">
									<button class="addtocart cantadd">Add to cart</button>
									<span class="tooltiptext">Please login first</span>
								</div>
								
							</div>
					<?php
						}
					?>
					</div>
					<div class="clear"></div>
					<br>
					<br>
				</div>
				<div class="detail_box">
					<h3>Product detail</h3>
					<table class="detail_tb">
					<?php
						$nline_detail = explode("!", $row['pro_detail']);
						foreach ($nline_detail as $value) {
							if(trim($value) != ""){
								list($topic,$detail) = explode("?", $value);
								if(trim($topic) != "" && trim($detail) != ""){
									echo "<tr>
											<td>".trim($topic)."</td>
											<td>".trim($detail)."</td>
										</tr>";
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
