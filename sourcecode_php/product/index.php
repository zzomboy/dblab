<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<table width="600" align="center" class="square">
  <tr>
    <td colspan="7" align="center"><a href="addform.php">AddData</a></td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td width="33" align="center"><strong>id</strong></td>
    <td width="121" align="center"><strong>image</strong></td>
    <td width="218" align="center"><strong>title</strong></td>
    <td width="59" align="center"><strong>price</strong></td>
    <td width="58" align="center"><strong>category</strong></td>
    <td width="36" align="center"><strong>edit</strong></td>
    <td width="43" align="center"><strong>delete</strong></td>
  </tr>
  <?PHP
  	// 1.	เชื่อมต่อเซิร์ฟเวอร์ MySQL
	$conn 	= mysql_connect("localhost","root","123")or die(mysql_error());

	$db		= mysql_select_db("book")or die("cannot select DB");


	mysql_query("SET NAMES UTF8"); 
	// 3.	นำคำสั่ง SQL ไปทำการประมวลผลที่ฐานข้อมูล
	$sql	= "select * from product order by p_id desc";
	$query	= mysql_query($sql) or die("error=$sql");
	//4.	นับจำนวนข้อมูลที่เรียกขึ้นมาจากฐานข้อมูล
	$num	= mysql_num_rows($query);
	//5.	นำข้อมูลขึ้นมาแสดงบนหน้าเว็ปเพจ
	for($i=1;$i<=$num;$i++)
	{
		$row	= mysql_fetch_array($query);  //นำข้อมูลออกมาที่ละเรคคอร์ดมาเก็บไว้ใน array
  ?>
  <tr>
    <td><?PHP echo $row['p_id']?></td>
    <td><?PHP 
	if(file_exists("img/{$row['p_id']}.jpg"))
	{
	?>
      <img src="img/<?PHP echo $row['p_id']?>.jpg" width="80" border="0" />
    <?PHP
	}
	?></td>
    <td><?PHP echo $row[1]?></td><!--การระบุ index แบบ Enumerated array-->  
    <td><?PHP echo $row['p_price']?></td><!--การระบุ index แบบ Associative array-->
    <td align="center"><?PHP echo $row['c_id']?></td>
    <td><a href="editform.php?p_id=<?PHP echo $row['p_id']?>">edit</a></td>
    <td><a href="delete.php?p_id=<?PHP echo $row['p_id']?>"
     onclick="return confirm('Are you sure??');">delete</a></td>
  </tr>
  <?PHP
  }
  // 6.	ปิดการเชื่อมต่อ
  mysql_close();
  ?>
</table>
