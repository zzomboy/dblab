<?php
	include("template.class.php");
	$layout = new Template("layout.tpl");
	$layout->set('menu_product','class="active"');
	$layout->set('title','Product : IT Online Shopping website');
	$layout->set('content','

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
	');
	echo $layout->output();
?>