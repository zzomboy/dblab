<link href="style.css" rel="stylesheet" type="text/css" />
<form action="addsave.php" method="post" enctype="multipart/form-data" 
id="form1" name="form1">
  <table width="450" align="center" class="square">
    <tr>
      <th colspan="2" scope="row">AddProduct</th>
    </tr>
    <tr>
      <th width="114" height="27" scope="row">name</th>
      <td width="323"><input type="text" name="p_name" id="p_name" /></td>
    </tr>
    <tr>
      <th scope="row">detail</th>
      <td>
    <textarea name="p_detail" cols="35" rows="5" id="p_detail"></textarea>
      </td>
    </tr>
    <tr>
      <th scope="row">price</th>
      <td><input type="text" name="p_price" id="p_price" /></td>
    </tr>
    <tr>
      <th scope="row">category</th>
      <td>
	  <select name="c_id">
	  <?PHP
	  include("connect.php");
	  $sql 		= "select * from category";
	  $query	= mysql_query($sql) or die("error=$sql");
	  $num 		= mysql_num_rows($query);
	  for($i=1;$i<=$num;$i++)
	  {
	  	$row = mysql_fetch_array($query);
	  ?>
	    <option value="<?PHP echo $row['c_id']?>">
		<?PHP echo $row['c_name']?></option>
      <?PHP
	  }
	  ?>
	  </select>	  </td>
    </tr>
    <tr>
      <th scope="row">image</th>
      <td><input name="image" type="file" id="image" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row">
      <input type="submit" name="button" id="button" value="Submit" />
      </th>
    </tr>
  </table>
</form>

