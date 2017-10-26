<?php
  if(isset($_REQUEST['id'])){  // เช็คว่ามีการ checkbox มาหรือไม่
      $id = $_REQUEST['id'];   
      $num = count($id);  // ทำการนับตัวแปร array ด้วยฟังก์ชั่น count()
   } else {
      $num = 0;
   }
   include("connect.php");
   for($i=0;$i<$num;$i++) // วนลูปเพื่อทำการ delete หัวข้อที่กำหนดมา
   { 
	   $sql = "select attach_file from webboard_post where question_id=".$id[$i];
	   // select เพื่อหาชื่อของไฟล์ที่ User attach file มา : นำชื่อไปลบไฟล์
	   $query = mysql_query($sql) or die (mysql_error());
	   $row = mysql_fetch_array($query);
	   $filename = $row['attach_file'];
	   
	   if(file_exists("attach/$filename.jpg"))// เช็คว่ามีไฟล์ดังกล่าวหรือไม่ก่อนทำการลบ 
	   {  
	      unlink("attach/$filename.jpg");  // ลบไฟล์ attach ด้วยฟังก์ชั่น unlink()
	   }
	   
	   $sql  = "delete from webboard_post where question_id=".$id[$i];
	   // ลบ record ในตาราง webboard_post
	   mysql_query($sql) or die(mysql_error());	   

	   $sql = "select attach_file from webboard_reply where question_id=".$id[$i];
	   // select เพื่อหาชื่อของไฟล์ที่ User attach file มา : นำชื่อไปลบไฟล์
	   $query = mysql_query($sql) or die (mysql_error());
	   $row = mysql_fetch_array($query);
	   $filename = $row['attach_file'];
	   
	   if(file_exists("attach/$filename.jpg"))
	   {
	      unlink("attach/$filename.jpg");
	   }

	   $sql  = "delete from webboard_reply where question_id=".$id[$i];
	   // ลบ record ในตาราง webboard_reply
	   mysql_query($sql) or die(mysql_error());	   
   }
   mysql_close($conn);
   echo "<script>alert('Delete webboard complete.');window.location='index.php';</script>"; 
?>

