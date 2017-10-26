<link href="style.css" rel="stylesheet" type="text/css" />
<?PHP 
	include("connect.php");
	$p_id	= $_GET['p_id']; 
	$sql	= "select * from product where p_id='$p_id'"; 	
	$query	= mysql_query($sql) or die("error=$sql");  
	$row	= mysql_fetch_array($query);				
?>
<form action="editsave.php" method="post" enctype="multipart/form-data"
 id="form1" p_name="form1">
  <table width="453" align="center" class="square">
    <tr>
      <th colspan="2" scope="row">EditProduct</th>
    </tr>
    <tr>
      <th width="114" scope="row">name</th>
      <!-- VALUE เป็นการกำหนดค่าเริ่มต้นของ textfield-->
      <td width="323">
      <input name="p_name" type="text" value="<?PHP echo $row['p_name']?>" />
      </td>
    </tr>
    <tr>
    <th scope="row">detail</th>
    <td>
    <textarea name="p_detail" cols="35" rows="5"><?PHP echo $row['p_detail']?></textarea>
    </td>
    </tr>
    <tr>
      <th scope="row">price</th>
      <td><input name="p_price" type="text" value="<?PHP echo $row['p_price']?>" />
      </td>
    </tr>
    <tr>
      <th scope="row">category</th>
      <td>
      <select name="c_id">
      <?PHP
	  $sqlc 	= "select * from category";
	  $queryc	= mysql_query($sqlc) or die("error=$sqlc");
	  $numc 	= mysql_num_rows($queryc);
	  for($i=1;$i<=$numc;$i++)
	  {
	  	$rowc = mysql_fetch_array($queryc);
	  ?>
        <option value="<?PHP echo $rowc['c_id']?>" 
		<?PHP if($rowc['c_id']==$row['c_id']){echo 'selected="selected"';} ?>> 
		<?PHP echo $rowc['c_name']?> 
        </option>
          <?PHP
	  }
	  ?>
        </select>
        </td>
    </tr>
    <tr>
      <th scope="row">image</th>
      <td>
	<?PHP 
	if(file_exists("img/{$row['p_id']}.jpg"))
	{
	?>
        <img src="img/<?PHP echo $row['p_id']?>.jpg" width="80" border="0" />
    <?PHP
	}
	?>
	</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><input name="image" type="file" id="image" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row">
     <!-- type="hidden" ส่งขอมูลไปทำงานโดยไม่แสดงข้อมูลนี้ออกทางหน้าเว็บไซด์-->
     <input name="p_id" type="hidden" id="p_id" value="<?PHP echo $p_id?>" />
      <input type="submit" p_name="button2" id="button2" value="Submit" />
      </th>
    </tr>
  </table>
</form>
