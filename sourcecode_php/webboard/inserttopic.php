<?php
   $subject    = $_REQUEST['subject'];  
   $detail 	   = $_REQUEST['detail'];
   $attachfile = $_FILES['attach'];
   $name 	   = $_REQUEST['name'];
   $datadate   = date("Y-m-d H:i:s");  
   $ip_address = $_SERVER['REMOTE_ADDR'];  
   
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
  $sql  = "insert into webboard_post (subject,datadate,subject_detail,attach_file,name,ip_address,view,reply)";
  $sql .= " values ('$subject','$datadate','$detail','$newname','$name','$ip_address',0,0)";
  mysql_query($sql) or die(mysql_error());
  mysql_close($conn);

  echo "<script>alert('Insert your question complete.');window.location='index.php';</script>";
?>