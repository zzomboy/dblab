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
<!--register form-->
		<div class="register_form">
			<h2>Register</h2>
			<form method="post" action="index.php">
  				<table class="form_box">

  					<tr>
  						<td>
  							Name :
    					</td>
    					<td>
    						<input type="text" placeholder="Enter Name" name="uname" required>
    					</td>
    					<td><!--Please enter your e-mail--></td>
    				</tr>

    				<tr>
  						<td>
  							Surname :
    					</td>
    					<td>
    						<input type="text" placeholder="Enter Surname" name="sname" required>
    					</td>
    					<td><!--Please enter your e-mail--></td>
    				</tr>

    				<tr>
  						<td>
  							Mobile phone :
    					</td>
    					<td>
    						<input type="text" placeholder="Enter Mobile phone" name="mobile" required>
    					</td>
    					<td><!--Please enter your e-mail--></td>
    				</tr>

  					<tr>
  						<td>
  							Email :
    					</td>
    					<td>
    						<input type="text" placeholder="Enter Email" name="email" required>
    					</td>
    					<td><!--Please enter your e-mail--></td>
    				</tr>

    				<tr>
  						<td>
    					Password :
    					
    					</td>
    					<td>
    						<input type="password" placeholder="Enter Password" name="psw" required>
    					</td>
    					<td></td>
    				</tr>

    				<tr>
  						<td>
    						Repeat Password :
    					</td>
    					<td>
    						<input type="password" placeholder="Re-enter Password" name="psw-repeat" required>
    					</td>
    					<td></td>
    				</tr>

    				<tr>
  						<td>
  							Gender :
    					</td>
    					<td style="padding: 15px 0;">
    						<input type="radio" name="gender" value="male" required>Male
    						<input type="radio" name="gender" value="female" required>Female
    					</td>
    					<td><!--Please enter your e-mail--></td>
    				</tr>

    				<tr>
  						<td>
  							Birthday :
    					</td>
    					<td>
    						<input class="input_date" type="date" name="birthday" required>
    					</td>
    					<td><!--Please enter your e-mail--></td>
    				</tr>

    				<tr>
    					<td></td>
    					<td colspan="2" style="padding: 15px 0;">
    						<input type="checkbox" required> Accept the Terms of Service of the DLZ Website. <a href="#">Terms & Privacy</a>.
    					</td>
    				</tr>

    				<tr>
    					<td>
    					</td>
    					<td colspan="2">
    						<div class="clearfix">
      							<button type="submit" class="signupbtn">Sign Up</button>
      							<button type="reset"  class="cancelbtn">Cancellation</button>
    						</div>
    					</td>
    				</tr>
    				
  				</table>
			</form>
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