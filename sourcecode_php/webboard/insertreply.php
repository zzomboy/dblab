<?php
   $id 			= $_REQUEST['id']; 
   $detail 		= $_REQUEST['detail'];
   $attachfile 	= $_FILES['attach'];
   $name 		= $_REQUEST['name'];
   $datadate 	= date("Y-m-d H:i:s"); 
   $ip_address 	= $_SERVER['REMOTE_ADDR']; 
   
   $newname = "";
   if($attachfile['size']>0)
   {
	  if($attachfile['type']=="image/jpeg" 
					 || $attachfile['type']=="image/pjpeg" 
					 		|| $attachfile['type']=="image/gif")
	  {
	     $newname = time();  
		 move_uploaded_file($attachfile['tmp_name'],"attach/$newname.jpg");  
	  } else {	
		 echo "<script>alert('Upload image file type JPG and GIF only !');history.back();</script>";
		 exit();  
	  } 
  }
  include("connect.php");

  $sql  = "insert into webboard_reply (question_id,datadate,reply_detail,attach_file,name,ip_address)";
  $sql .= " values ('$id','$datadate','$detail','$newname','$name','$ip_address')";
  // ทำการเพิ่มคำตอบใหม่ไปที่ตาราง webboard_reply
  mysql_query($sql) or die(mysql_error());

  $sql = "update webboard_post set reply=reply+1 where question_id=".$_REQUEST['id'];  
  $query = mysql_query($sql) or die(mysql_error());

  mysql_close($conn);

  echo "<script>alert('Insert your reply complete.');window.location='viewtopic.php?id=$id';</script>";
?>