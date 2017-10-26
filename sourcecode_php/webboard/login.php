<?php
   session_start();  

   $username = $_REQUEST['username'];
   $password = $_REQUEST['password'];

   if($username=="admin")
   {
      // ทำหน้า login อย่างง่าย โดยเช็ค username และ password ว่าตรงตามที่เรากำหนดหรือไม่
      if($password=="1234")
	  {
	     $_SESSION['admin'] = true;  // กำหนดตัวแปร session มีเพื่อให้ทราบว่าได้มีการ login เรียบร้อยแล้ว
	     echo "<script>alert('Login complete.');window.location='index.php';</script>";		 
	  } else {
	     echo "<script>alert('Password is invalid !');history.back();</script>";
		 exit();
	  }
   } else 
   {
	     echo "<script>alert('Username is invalid !');history.back();</script>";
		 exit();
   } 
?>
