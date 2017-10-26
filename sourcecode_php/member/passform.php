<?
	session_start();
	if(!isset($_SESSION['username']))
	{
		echo "<script>alert('!! Please Login !! ');window.location='index.php';</script>";
		exit();
	}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form id="form1" name="form1" method="post" action="passsave.php">
  <table width="350" border="0" align="center" cellpadding="0" cellspacing="1" class="square">
    <tr>
      <th colspan="2" scope="row">Change Password</th>
    </tr>
    <tr>
      <th width="130" scope="row"><div align="left">Old-Password</div></th>
      <td width="215"><input type="password" name="oldpassword" id="oldpassword" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">New-Password</div></th>
      <td><input type="password" name="newpassword" id="newpassword" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Renew-Password</div></th>
      <td><input type="password" name="renewpassword" id="renewpassword" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="button" id="button" value="Submit" /></th>
    </tr>
  </table>
</form>
