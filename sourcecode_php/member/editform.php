<?
	session_start();
	if(!isset($_SESSION['username']))
	{
		echo "<script>alert('!! Please Login !! ');window.location='index.php';</script>";
		exit();
	}
	include("connect.php");
	$username	= $_SESSION['username'];
	$sql		= "select * from member where username='$username'";
	$query		= mysql_query($sql) or die("error=$sql");
	$row		= mysql_fetch_array($query);
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form1" method="post" action="editsave.php">
  <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" class="square">
    <tr>
      <th colspan="2" scope="row">++ EditProfile ++</th>
    </tr>
    <tr>
      <th colspan="2" scope="row">::: Profile :::</th>
    </tr>
    <tr>
      <th width="92" scope="row">name</th>
      <td width="349"><input type="text" name="name" id="name" value="<?=$row['name']?>"></td>
    </tr>
    <tr>
      <th scope="row">lastname</th>
      <td><input name="lastname" type="text" id="lastname" value="<?=$row['lastname']?>"></td>
    </tr>
    <tr>
      <th scope="row">gender</th>
      <td>
    <input name="gender" type="radio" id="radio" value="M"
    <? if($row['gender']=="M"){echo 'checked="checked"';} ?>>male
    <input name="gender" type="radio" id="radio" value="F"
    <? if($row['gender']=="F"){echo 'checked="checked"';} ?>>female
 </td>
    </tr>
    <tr>
      <th scope="row">birthday</th>
      <td>
      <?
      	list($y,$m,$d) = split("-",$row['birthday']);
	  ?>
      <select name="day" id="day">
      <? for($i=1;$i<=31;$i++){ ?>
      	<option value="<?=$i?>" <? if($i==$d){echo 'selected="selected"';} ?>><?=$i?></option>
      <? } ?>
      </select>
      <select name="month" id="month">
      <? 
$mname = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');	  
	  for($i=1;$i<=12;$i++)
	  { 
	  ?>
      	<option value="<?=$i?>" <? if($i==$m){echo 'selected="selected"';} ?>><?=$mname[$i]?></option>
      <? } ?>
      </select>
      <select name="year" id="year">
      <? for($i=date("Y");$i>=date("Y")-80;$i--){ ?>
      	<option value="<?=$i?>" <? if($i==$y){echo 'selected="selected"';} ?>><?=$i?></option>
      <? } ?>
      </select>      </td>
    </tr>
    <tr>
      <th scope="row">address</th>
      <td>
  <textarea name="address" id="address" cols="30" rows="5"><?=$row['address']?></textarea></td>
    </tr>
    <tr>
      <th scope="row">email</th>
      <td><input name="email" type="text" id="email" value="<?=$row['email']?>"></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="button" id="button" value="Submit"></th>
    </tr>
  </table>
</form>
