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
	$layout_header->set('menu_product','class="active"');
	$layout_header->set('title','Promotion : IT Online Shopping website');
	echo $layout_header->output();
/*****************sort by*********************/	
	if (!isset($_GET['sortby'])) {
		$sortby = "pro_id desc";
	}
	else{
		$sortby = $_GET['sortby'];
	}
?>
<!--Content-->
<!--category & picture-->
	    <div class="category_picture">			
			<div class="categories">
				<ul>
					<h3>Categories</h3>
					<li><a href="product_cpu.php">CPU</a></li>
				    <li><a href="product_mb.php">Mainboard</a></li>
				    <li><a href="product_gc.php">Graphic card</a></li>
				    <li><a href="product_mon.php">Monitor</a></li>
				    <li><a href="product_hddssd.php">Harddisk & Solid state drive</a></li>
				    <li><a href="product_ram.php">RAM for PC</a></li>
				    <li><a href="product_psu.php">Case & Power supply</a></li>
				    <li><a href="product_odd.php">Optical disk drive</a></li>
				</ul>
			</div>					
	    	
			<div class="index_right_content">
				<div class="admin_tool_box">
					<div class="admin_search_box">
						<form method="get" action="pro_search.php">
			     			<input type="text" placeholder="Search product" name="searchword">
			     			<input type="submit" value="">
			     		</form>
					</div>
					<select class="sortby_tool" onchange="location = this.value;">
						<option disabled selected value> Sort By </option>
						<option value="?sortby=pro_name">Name A - Z</option>
						<option value="?sortby=pro_name desc">Name Z - A</option>
						<option value="?sortby=pro_psale">Price lowest - highest</option>
						<option value="?sortby=pro_psale desc">Price highest - lowest</option>	
					</select>
		     	</div>
				<div class="clear"></div>
				<div class="promo_overview">
					<div class="promotion_bar">
						<div class="heading">
    						<h3>Graphic card</h3>
    					</div>
    					<div class="clear"></div>
					</div>
<!--product table-->
					<div class="tb_promo">
					<?php
							$q = "select pro_id,pro_name,pro_pic,pro_price,pro_psale,cat_id from product where cat_id = 3 order by  $sortby";
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
								/*echo "<div style='text-align:center;'>
										<a href='cart.php?pid=".$row['pro_id']."&act=add' target='_parent'><button class='addtocart'>Add to cart</button></a>
									</div>";*/
							if($user_login){
					?>			<div style='text-align:center;'>
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