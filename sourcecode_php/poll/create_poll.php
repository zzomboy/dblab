<?php
   include("connect.php");  // include file สำหรับทำการเชื่อมต่อฐานข้อมูล
   $answer = $_REQUEST['answer'];  // รับค่าคำตอบจากหน้าฟอร์ม

   $sql  = "insert into question (question,datadate)";
   $sql .= "values ('".$_REQUEST['question']."','".date("Y-m-d G:i:s")."')";
   // ดึงค่าวันที่และเวลาปัจจุบันโดยใช้ function date()
   mysql_query($sql) or die ("insert question error command : $sql");
   
   $question_id = mysql_insert_id();
   // ดึงค่า question id โดยใช้ function mysql_insert_id() จะทำการดึงค่า id ล่าสุดที่เพื่มออกมาให้
   
   for ($i=0;$i<5;$i++) // วนลูปเพื่อทำการเช็คคำตอบว่าเป็นค่าว่างหรือไม่
   {  
        if ($answer[$i]<>"") // ถ้าไม่เป็นค่าว่างให้ทำการเพิ่มในฐานข้อมูล
		{  
		    $sql  = "insert into answer (question_id,answer,score)";
		    $sql .= "values ($question_id,'$answer[$i]',0)";
		    mysql_query($sql) or die ("insert answer error command : $sql");
		}
   }

   mysql_close($conn);
   echo "<script>";
   echo "alert('ทำการเพิ่มโพลล์ใหม่เรียบร้อยแล้วครับ');";  // alert ว่าทำการเพิ่มโพลล์เรียบร้อยแล้ว
   echo "window.location='frm_create_poll.php'"; // ทำ redirect ไปที่หน้าหลัก
   echo "</script>";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
