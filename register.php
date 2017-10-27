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
<!--register form-->
		<div class="register_form">
			<h2>Register</h2>
			<form method="post" action="regissave.php">
  				<table class="form_box">
            <tr>
              <td>
                Title :
              </td>
              <td>
                <input type="text" placeholder="Enter Title" name="utitle" required>
              </td>
              <td></td>
            </tr>

  					<tr>
  						<td>
  							Name :
    					</td>
    					<td>
    						<input type="text" placeholder="Enter Name" name="uname" required>
    					</td>
    					<td></td>
    				</tr>

    				<tr>
  						<td>
  							Mobile phone :
    					</td>
    					<td>
    						<input type="text" placeholder="Enter Mobile phone" name="utel" required>
    					</td>
    					<td></td>
    				</tr>

  					<tr>
  						<td>
  							Email :
    					</td>
    					<td>
    						<input type="text" placeholder="Enter Email" name="uemail" required>
    					</td>
    					<td></td>
    				</tr>

    				<tr>
  						<td>
    					Password :
    					
    					</td>
    					<td>
    						<input type="password" placeholder="Enter Password" name="upw" required>
    					</td>
    					<td></td>
    				</tr>

    				<tr>
  						<td>
    						Repeat Password :
    					</td>
    					<td>
    						<input type="password" placeholder="Re-enter Password" name="upw_repeat" required>
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
    					<td></td>
    				</tr>

    				<tr>
  						<td>
  							Birthday :
    					</td>
    					<td>
    						<input class="input_date" type="date" name="ubirth" required>
    					</td>
    					<td></td>
    				</tr>

            <tr>
              <td style="vertical-align: top;padding-top:18px;">
                Address :
              </td>
              <td colspan="2">
                <textarea name="uaddr" cols="50" rows="5" required></textarea>
              </td>
            </tr>

    				<tr>
    					<td></td>
    					<td colspan="2" style="padding: 15px 0;">
    						<input type="checkbox" required> Accept the Terms of Service of the DLZ Website. <a href="help.php" target="_blank">Terms & Privacy</a>.
    					</td>
    				</tr>

    				<tr>
    					<td>
    					</td>
    					<td colspan="2">
    						<div class="clearfix">
      							<button type="submit" class="signupbtn">Sign Up</button>
      							<button type="reset"  class="cancelbtn">Cancel</button>
    						</div>
    					</td>
    				</tr>
    				
  				</table>
			</form>
		</div>
<?php
  echo $layout_footer->output();
?>