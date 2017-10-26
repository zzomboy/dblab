<?php
	session_start(); 
    session_destroy(); // ลบตัวแปร session ทั้งหมด ด้วยฟังก์ชั่น session_destroy()
   
   echo "<script>alert('Logout complete.');window.location='index.php';</script>"; 
?>