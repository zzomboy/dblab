<?php
	include("template.class.php");
	$layout = new Template("layout.tpl");
	$layout->set('title','Register : IT Online Shopping website');
	$layout->set('content','
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

	');
	echo $layout->output();
?>