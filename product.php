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
    						<h3>Products</h3>
    					</div>
    					<div class="clear"></div>
					</div>
<!--product table-->
					<div class="tb_promo">

						<div class="row_promo">			<!--row promotion-->
							<div class="product_box">
								<img align="left" src="img/monitor.png">
								<h2>Monitor</h2>
								<div class="price_details">
									<p>฿ 5999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="product_box">
								<img align="left" src="img/hdd.png">
								<h2>Harddisk</h2>
								<div class="price_details">
									<p>฿ 2999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="product_box">
								<img align="left" src="img/cpu.png">
								<h2>CPU</h2>
								<div class="price_details">
									<p>฿ 9999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="product_box">
								<img align="left" src="img/speaker.jpg">
								<h2>Speaker</h2>
								<div class="price_details">
									<p>฿ 999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="row_promo">			<!--row promotion-->
							<div class="product_box">
								<img align="left" src="img/hdd.png">
								<h2>Harddisk</h2>
								<div class="price_details">
									<p>฿ 2999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="product_box">
								<img align="left" src="img/monitor.png">
								<h2>Monitor</h2>
								<div class="price_details">
									<p>฿ 5999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="product_box">
								<img align="left" src="img/speaker.jpg">
								<h2>Speaker</h2>
								<div class="price_details">
									<p>฿ 999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="product_box">
								<img align="left" src="img/cpu.png">
								<h2>CPU</h2>
								<div class="price_details">
									<p>฿ 9999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="clear"></div>
						</div>

						<div class="row_promo">			<!--row promotion-->
							<div class="product_box">
								<img align="left" src="img/speaker.jpg">
								<h2>Speaker</h2>
								<div class="price_details">
									<p>฿ 999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="product_box">
								<img align="left" src="img/hdd.png">
								<h2>Harddisk</h2>
								<div class="price_details">
									<p>฿ 2999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="product_box">
								<img align="left" src="img/monitor.png">
								<h2>Monitor</h2>
								<div class="price_details">
									<p>฿ 5999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="product_box">
								<img align="left" src="img/cpu.png">
								<h2>CPU</h2>
								<div class="price_details">
									<p>฿ 9999</p>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>

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