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
	$layout_header->set('menu_home','class="active"');
	$layout_header->set('title','IT Online Shopping website');
	echo $layout_header->output();
?>
<script type="text/javascript">
	function addtocartf(pid){
	    var temp = prompt("Qty :", "1");
	    if (qty != "0" && qty != "") {
	        var pid_cart = pid;
	        var qty = parseInt(temp);
	    }
	}
</script>
<!--Content-->
<!--category & picture-->
	    <div class="category_picture">			
			<div class="categories">
				<ul>
					<h3>Categories</h3>
					<li><a href="product.php">CPU</a></li>
				    <li><a href="product.php">Mainboard</a></li>
				    <li><a href="product.php">Graphic card</a></li>
				    <li><a href="product.php">Monitor</a></li>
				    <li><a href="product.php">Harddisk & Solid state drive</a></li>
				    <li><a href="product.php">RAM for PC</a></li>
				    <li><a href="product.php">Case & Power supply</a></li>
				    <li><a href="product.php">Optical disk drive</a></li>
				</ul>
			</div>					
	    	
			<div class="index_right_content">
				<div class="promo_overview">
					<div class="promotion_bar">
						<div class="heading">
    						<h3>new product</h3>
    					</div>
    					<div class="see_all">
    						<p><a href="promotion.php">See all Products</a></p>
    					</div>
    					<div class="clear"></div>
					</div>
<!--product table-->
					<div class="tb_promo">
					<?php
							$q = "select pro_id,pro_name,pro_pic,pro_price,pro_psale from product order by  pro_id desc limit 10";
							$result = $mysqli -> query($q);
							$ncol=0;

							while ($row=$result->fetch_array()) {
								$ncol++;
								if($ncol%4 == 1){
									echo "<div class='row_promo'>";
								}
								echo "<div class='product_box'>";

								if (file_exists("img/product/".$row['pro_pic'])) {
									echo "<a href='preview.php?pid=".$row['pro_id']."' target='_blank'><img align='left' src='img/product/".$row['pro_pic']."'></a>";
								}
								else{
									echo "<a href='preview.php?pid=".$row['pro_id']."' target='_blank'><img align='left' src='img/product/noimgfound.jpg'></a>";
								}
								echo "<a href='preview.php?pid=".$row['pro_id']."' target='_blank'><h2>".$row['pro_name']."</h2></a>";
								if($row['pro_price'] == $row['pro_psale']){
									echo "<div class='price_details'>
									<p>".number_format($row['pro_price']).".-</p>
									<div class='clear'></div>
								</div>";
								}else{
									echo "<div class='price_details'>
									<p><del>".number_format($row['pro_price']).".-</del>".number_format($row['pro_psale']).".-</p>
									<div class='clear'></div>
								</div>";
								
								}
								echo '<div style="text-align:center;">
										<button class="addtocart" onclick="addtocartf('.$row['pro_id'].')">Add to cart</button>
									</div>';
								echo "<div class='clear'></div>
							</div>";
								if($ncol%4 == 0){
									echo "<div class='clear'></div>
						</div>";
								}
							}
							if($ncol%4 != 0){
									echo "<div class='clear'></div>
						</div>";
							}
					?>
					</div>
    				<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

<?php
	echo $layout_footer->output();
?>