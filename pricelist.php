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
			    	<li><a href="index.php">Home</a></li>
			    	<li><a href="promotion.php">Promotion</a></li>
			    	<li><a href="product.php">Product</a></li>
			    	<li class="active"><a href="pricelist.php">Pricelist</a></li>
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
		<div class="category_picture">			
			<div class="categories">
				<ul>
					<h3>Categories</h3>
					<li><a href="product.php">Laptop</a></li>
					<li><a href="product.php">CPU</a></li>
				    <li><a href="product.php">Mainboard</a></li>
				    <li><a href="product.php">Graphic card</a></li>
				    <li><a href="product.php">Monitor</a></li>
				    <li><a href="product.php">Harddisk & Solid state drive</a></li>
				    <li><a href="product.php">RAM for PC</a></li>
				    <li><a href="product.php">Case & Power supply</a></li>
				    <li><a href="product.php">Optical disk drive</a></li>
				    <li><a href="product.php">Speaker & Sound card</a></li>
				</ul>
			</div>

<!-- pricelist table -->
			<div class="pricelist_box">
				<h3>CPU</h3>
				<table class="pricelist_tb">
					<tr>
						<th>
							Product name
						</th>
						<th>
							Description
						</th>
						<th>
							Price (THB)
						</th>
						<th>
							Discount (THB)
						</th>
						<th>
							Sale price (THB)
						</th>
						<th>
							Warranty
						</th>
					</tr>

					<tr>
						<td>
							<a href="preview.php" target="_blank">CPU AMD TR4 RYZEN THREDRIPPER 1920X</a>
						</td>
						<td>
							CORES : 12 THREADS : 24
						</td>
						<td>
							31,900
						</td>
						<td>
							-
						</td>
						<td>
							31,900
						</td>
						<td>
							3 y
						</td>
					</tr>

					<tr>
						<td>
							<a href="#">CPU AMD TR4 RYZEN THREADRIPPER 1950X</a>
						</td>
						<td>
							CORES : 16 THREADS : 32
						</td>
						<td>
							38,900
						</td>
						<td>
							-
						</td>
						<td>
							38,900
						</td>
						<td>
							3 y
						</td>
					</tr>

				</table>
				<h3>Mainboard</h3>
				<table class="pricelist_tb">
					<tr>
						<th>
							Product name
						</th>
						<th>
							Description
						</th>
						<th>
							Price (THB)
						</th>
						<th>
							Discount (THB)
						</th>
						<th>
							Sale price (THB)
						</th>
						<th>
							Warranty
						</th>
					</tr>

					<tr>
						<td>
							<a href="#">MAINBOARD 1155 MSI H61M-P31/W8</a>
						</td>
						<td>
							SOCKET : 1155 CHIPSET : INTEL H61 MEMORY : 2 x DDR3 DIMM
						</td>
						<td>
							1,850
						</td>
						<td>
							-
						</td>
						<td>
							1,850
						</td>
						<td>
							3 y
						</td>
					</tr>

					<tr>
						<td>
							<a href="#">MAINBOARD 1155 GIGABYTE H61M-DS2 (REV3)</a>
						</td>
						<td>
							SOCKET : 1155 CHIPSET : INTEL H61 MEMORY : 2 x DDR3 DIMM
						</td>
						<td>
							1,840
						</td>
						<td>
							-
						</td>
						<td>
							1,840
						</td>
						<td>
							3 y
						</td>
					</tr>

					<tr>
						<td>
							<a href="#">MAINBOARD 1155 ASUS H61M-K</a>
						</td>
						<td>
							SOCKET : 1151 CHIPSET : INTEL H61(B3) MEMORY : 2 x DDR3 DIMM
						</td>
						<td>
							1,990
						</td>
						<td>
							-
						</td>
						<td>
							1,990
						</td>
						<td>
							3 y
						</td>
					</tr>

				</table>
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