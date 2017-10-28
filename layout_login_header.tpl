<!DOCTYPE html>
<html>
	<head>
		<title>[@title]</title>
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
			<div class="header_nav">
				<ul>
					<li><a href="my_account.php">My Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>

<!--menu bar-->
		<div class="menu_bar">
	     	<div class="menu">
	     		<ul>
			    	<li [@menu_home]><a href="index.php">Home</a></li>
			    	<li [@menu_promo]><a href="promotion.php">Promotion</a></li>
			    	<li [@menu_product]><a href="product.php">Product</a></li>
			    	<li [@menu_price]><a href="pricelist.php">Pricelist</a></li>
			    	<li [@menu_about]><a href="about.php">About</a></li>
			    	<li [@menu_contact]><a href="contact.php">Contact</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" placeholder="Search"}">
	     			<input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	    </div>	