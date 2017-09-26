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
		<div style="width: 90%;margin: auto;margin-top: 20px;">
			<div class="about_text">
				<h3>About Us</h3>
				<p><span>DLZ </span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
		</div>
		<table class="policy_tb" style="width: 80%;margin: 40px auto 40px auto;">
			<tr>
				<td>
					<h4>Achievement Orientation</h4>
					<p>Work for the success of the work as a goal</p>
				</td>
				<td>
					<img class="policy_img" src="img/arrow.png">
				</td>
				<td>
					<h4>Vision</h4>
					<p>Going to the same destination, organizational co-ordination</p>
				</td>
				<td>
					<img class="policy_img" src="img/market.png">
				</td>
				<td>
					<h4>Customer Focus</h4>
					<p>Focus on customer or service recipient</p>
				</td>
				<td>
					<img class="policy_img" src="img/shopping_heart.png">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<img class="dlz_img" src="img/D.png">
				</td>
				<td colspan="2">
					<img class="dlz_img" src="img/L.png">
				</td>
				<td colspan="2">
					<img class="dlz_img" src="img/Z.png">
				</td>
			</tr>
			<tr>
				<td>
					<img class="policy_img" src="img/head.png">
				</td>
				<td>
					<h4>Learning & Development</h4>
					<p>Develop all the time</p>
				</td>
				<td>
					<img class="policy_img" src="img/interface.png">
				</td>
				<td>
					<h4>Integrity</h4>
					<p>Acting with integrity, morality</p>
				</td>
				<td>
					<img class="policy_img" src="img/telemarketer.png">
				</td>
				<td>
					<h4>Entrepreneur</h4>
					<p>Creating a Shared Ownership Environment</p>
				</td>
			</tr>
		</table> 

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