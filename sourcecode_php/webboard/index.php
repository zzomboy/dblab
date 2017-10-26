<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Webboard</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script language="javascript">
	function addEmo(num){  // ฟังก์ชั่นเพิ่มสัญลักษณ์ emo เข้าไปที่ช่อง detail
	    document.frmTopic.detail.value = document.frmTopic.detail.value + '[' + num + ']';
	}
    function checkNull(){
	   if(document.frmTopic.subject.value=="" || document.frmTopic.subject.value==null){
	      alert('Please insert subject !');
		  document.frmTopic.subject.focus();
		  return false;
	   }
	   if(document.frmTopic.detail.value=="" || document.frmTopic.detail.value==null){
	      alert('Please insert detail !');
		  document.frmTopic.detail.focus();
		  return false;
	   }
	   if(document.frmTopic.name.value=="" || document.frmTopic.name.value==null){
	      alert('Please insert name !');
		  document.frmTopic.name.focus();
		  return false;
	   }
	   document.frmTopic.submit();
	}
</script>
</head>

<body>
    <center><br />
        <form id="frmManage" name="frmManage" method="post" action="managewebboard.php">  
        <table width="700" class="square" cellpadding="4" cellspacing="1">
        	<tr>
            	<td width="5%" class="square" align="center">&nbsp;</td>
            	<td width="50%" class="square" align="center">Subject</td>
            	<td width="25%" class="square" align="center">Date</td>
            	<td width="10%" class="square" align="center">View</td>
            	<td width="10%" class="square" align="center">Reply</td>
            </tr>
	<?php
	 	include("connect.php");  // ทำการ include ไฟล์ connect เพื่อทำการเชื่อมต่อฐานข้อมูล
	   	include("function.php"); 
       $sql = "select * from webboard_post order by question_id desc";  
       $query = mysql_query($sql) or die(mysql_error());
       $num = mysql_num_rows($query);  

       //  โค้ดสำหรับทำการแบ่งหน้า
       // เช็คว่ามีการส่งค่าหน้าที่ต้องการมาหรือไม่ ถ้าไม่มีก็คือให้ตัวแปร page = 1 (หน้า1)
       $page = isset($_GET['page'])?$_GET['page']:1;  
       $perpage	= 10;  					// กำหนดค่าตัวแปรว่าเราจะทำการโชว์หน้าละกี่ record
       $totalpage = ceil($num/$perpage);// หาจำนวนหน้าโดยใช้คำสั่ง ceil คือการหารปัดเศษขึ้น
       $startpoint = ($page-1)*$perpage;// หาตำแหน่งของเริ่มต้นของ record ที่เราต้องการโชว์
       
       $sql .= " limit $startpoint,$perpage";  // กำหนด record ที่เราต้องการโชว์ด้วย  limit
       $query = mysql_query($sql) or die(mysql_error());
       $num = mysql_num_rows($query);									   			   
       
       if($num>0){
          for($i=0;$i<$num;$i++){
              $row = mysql_fetch_array($query); ?>
     <tr>
      <td width="5%" class="square" align="center">
	  <? if(!isset($_SESSION['admin'])){ ?>
        <img src="images/bullet.gif" />
      <? } else { ?>
        <input type="checkbox" id="id[]" name="id[]" value="<?php echo $row['question_id']?>" class="verdana" />
      <? } ?>
      </td>
      <td width="50%" class="square" align="center">
      <a href="viewtopic.php?id=<?php echo $row['question_id']?>" target="_blank"><?php echo $row['subject']?></a></td>
      <td width="25%" class="square" align="center"><?php echo dateShow($row['datadate'])?></td>
      <td width="10%" class="square" align="center"><?php echo $row['view']?></td>
      <td width="10%" class="square" align="center"><?php echo $row['reply']?></td>
     </tr>
       <? }
       } else {  // กรณีไม่มีข้อมูล แจ้งให้ผู้ใช้ทราบว่าไม่มีข้อมูล ?>
          <tr><td colspan="5" class="square" align="center">Database is empty !</td></tr>
    <? } ?>
    <? if($totalpage>0){ ?>
    <tr><td colspan="5" class="square" align="center">
        <? for($i=1;$i<=$totalpage;$i++){
               echo " <a href=\"?page=$i\">$i</a> ";
           } ?>
    </td></tr>
    <? } ?>
<? if(isset($_SESSION['admin'])){ ?>
      <tr><td colspan="5" class="square" align="right">
          Click here for delete Topic : <input type="submit" value="Delete" class="verdana" /> : 
          <a href="logout.php" class="verdana">Logout</a>
      </td></tr>
<? } ?>
</table><br />
</form>
<form id="frmTopic" name="frmTopic" enctype="multipart/form-data" method="post" 
action="inserttopic.php" onsubmit="checkNull();return false;">
<!-- ในบทนี้เรามีการใช้งาน input type:file อย่าลืมใส่ enctype="multipart/form-data" ด้วย -->
    <table width="700" class="square" cellpadding="4" cellspacing="1">
        <tr>
            <td width="20%" class="square" align="center">Subject</td>
            <td width="80%" class="square" align="left">
            <input type="text" id="subject" name="subject" style="width:500px" class="verdana" />
            </td>
        </tr>
        <tr>
            <td width="20%" class="square" align="center">Detail</td>
            <td width="80%" class="square" align="left">
          <textarea name="detail" rows="4" class="verdana" id="detail" style="width:500px"></textarea>
          </td>
        </tr>
        <tr>
            <td width="20%" class="square" align="center">Emo</td>
            <td width="80%" class="square" align="left">
            <?php for($i=1;$i<=15;$i++){  // ทำการโชว์ emo ด้วยการวนลูป ?>
               <img src="emo/<?php echo $i?>.gif" onclick="addEmo(<?php echo $i?>)" />
            <? } ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="square" align="center">Attach file</td>
            <td width="80%" class="square" align="left">
            <input type="file" id="attach" name="attach" class="verdana" />
            </td>
        </tr>
        <tr>
        <td width="20%" class="square" align="center">Name</td>
        <td width="80%" class="square" align="left">
        <input type="text" id="name" name="name" style="width:444px" class="verdana" />
        <input type="submit" value="Post" class="verdana" />
        </td>
        </tr>
    </table>
    </form>
        <? mysql_close($conn);  // อย่าลืมปิดฐานข้อมูลทุกคร้ังเมื่อใช้งานเสร็จ ?>
    </center>
</body>
</html>