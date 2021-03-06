<!DOCTYPE html>
<html>
	<head>
		<title>IT Online Shopping website</title>
		<link href="css/reset.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
<!--header-->
		<div class="header">
<!--Logo-->
			<div class="logo">
				<a href="index.php"><img src="img/DLZ.png" width="200px" height="92px"></a>
			</div>
<!--right nav-->
			<div class="header_nav">
				<ul>
					<li><a href="register.php">Register</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="my_account.php">My Account</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>

<!--menu bar-->
		<div class="menu_bar">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="index.php">Home</a></li>
			    	<li><a href="promotion.php">Promotion</a></li>
			    	<li><a href="product.php">Product</a></li>
			    	<li><a href="pricelist.php">Pricelist</a></li>
			    	<li><a href="about.php">About</a></li>
			    	<li><a href="contact.php">Contact</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	    </div>	 

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
    						<h3>Best sale</h3>
    					</div>
    					<div class="see_all">
    						<p><a href="promotion.php">See all Promotions</a></p>
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

<!--footer-->
		<div class="footer">
			<table class="section">
				<tr>
					<td>
						<h4>DLZ IT Store</h4>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="promotion.php">Promotion</a></li>
							<li><a href="product.php">Product</a></li>
			    			<li><a href="pricelist.php">Pricelist</a></li>
			    			<li><a href="about.php">About</a></li>
			    			<li><a href="contact.php">Contact</a></li>
						</ul>
					</td>
					<td>
						<h4>My account</h4>
						<ul>
							<li><a href="login.php">Login</a></li>
							<li><a href="my_account.php">My Profile</a></li>
							<li><a href="help.php">Help</a></li>
						</ul>
					</td>
					<td>
						<h4>Contact</h4>
						<ul>
							<li><span>+66-9999-99999</span></li>
							<li><span>+66-8888-88888</span></li>
							<br><br>
							<h4>Shipping</h4>
							<a href="http://www.dhl.co.th/th.html" target="_blank">
								<img align="left" src="img/tran-dhl.png">
							</a>
							<a href="https://th.kerryexpress.com/th/track/" target="_blank">
								<img align="left" src="img/tran-kerry.png">
							</a>
							<a href="https://www.tnt.com/express/th_th/site/home.html" target="_blank">
								<img align="left" src="img/tran-tnt.png">
							</a>
						</ul>
					</td>
					<td>
						<h4>payment</h4>	
						<img align="left" src="img/bank-SCB.jpg">
						<img align="left" src="img/bank-SB.jpg">
						<img align="left" src="img/bank-KB.jpg">
						<img align="left" src="img/bank-KTB.jpg">
						<img align="left" src="img/bank-TBB.jpg">
						<img align="left" src="img/bank-crdito.jpg">
					</td>
				</tr>
			</table>		
       		<div class="copy_right">
				<p>DLZ © All rights Reseverd | Design by  <a href="http://www.facebook.com/karanpoj">Karanpoj</a> </p>
			</div>
    	</div>
	</body>
</html>