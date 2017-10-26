<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form1" method="post" action="regissave.php">
  <table width="400" border="0" align="center" cellpadding="0" 
  cellspacing="1" class="square">
    <tr>
      <th colspan="2" scope="row">## Register ##</th>
    </tr>
    <tr>
      <th width="92" scope="row">username</th>
      <td width="349"><input type="text" name="username" id="username"></td>
    </tr>
    <tr>
      <th scope="row">password</th>
      <td><input type="password" name="password" id="password"></td>
    </tr>
    <tr>
      <th scope="row">confirm</th>
      <td><input type="password" name="confirm" id="confirm"></td>
    </tr>
    <tr>
      <th colspan="2" scope="row">::: Profile :::</th>
    </tr>
    <tr>
      <th scope="row">name</th>
      <td><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <th scope="row">lastname</th>
      <td><input type="text" name="lastname" id="lastname"></td>
    </tr>
    <tr>
      <th scope="row">gender</th>
      <td>
<input name="gender" type="radio" id="radio" value="M" checked="checked">male
<input name="gender" type="radio" id="radio" value="F">female</td>
    </tr>
    <tr>
      <th scope="row">birthday</th>
      <td>
      <select name="day" id="day">
      <? for($i=1;$i<=31;$i++){ ?>
      	<option value="<?=$i?>"><?=$i?></option>
      <? } ?>
      </select>
      <select name="month" id="month">
      <? for($i=1;$i<=12;$i++){ ?>
      	<option value="<?=$i?>"><?=$i?></option>
      <? } ?>
      </select>
      <select name="year" id="year">
      <? for($i=date("Y");$i>=date("Y")-80;$i--){ ?>
      	<option value="<?=$i?>"><?=$i?></option>
      <? } ?>
      </select>      
      </td>
    </tr>
    <tr>
    <th scope="row">address</th>
    <td><textarea name="address" cols="30" rows="5" id="address"></textarea></td>
    </tr>
    <tr>
      <th scope="row">email</th>
      <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
      <th colspan="2" scope="row">
      <input type="submit" name="button" id="button" value="Submit"></th>
    </tr>
  </table>
</form>
