<?php
   include("connect.php");  // include file สำหรับทำการเชื่อมต่อฐานข้อมูล

   if ($_REQUEST['answer_id']<>"") {
	   if (!isset($_COOKIE["check_vote"])) {
           setcookie("check_vote", ture, time()+86400);
		   //  ทำการ set ค่า cookie กรณีผู้ใช้โหวตเป็นครั้งแรกของวันนี้
		   $sql  = "update answer set score=score+1";
		   $sql .= " where answer_id=".$_REQUEST['answer_id'];
		   // เพิ่มค่า score ในฐานข้อมูล
		   mysql_query($sql) or die ("update score error command : $sql");
		   mysql_close($conn);
		
		   echo "<script>";
		   echo "alert('ทำการโหวตโพลล์เรียบร้อยแล้วครับ');";
		   // alert ว่าทำการโหวตโพลล์เรียบร้อยแล้ว
		   echo "window.location='view_poll.php';"; //redirect ไปที่หน้าดูผลโหวต
		   echo "</script>";
	   } else {
		   mysql_close($conn);
		   
		   echo "<script>";
		   echo "alert('วันนี้คุณได้ทำการโหวตไปแล้วครับ');";  // เตือนเมื่อทำการโหวตไปแล้ว
		   echo "window.location='view_poll.php';"; //redirect ไปที่หน้าดูผลโหวต
		   echo "</script>";
	   }
   } else {
       mysql_close($conn);
	   
	   echo "<script>";
	   echo "alert('คุณยังไม่ได้ทำการเลือกคำตอบ');";
	   // alert กรณีที่ผู้ใช้ไม่ได้เลือก radio button (ไม่ได้เลือกคำตอบ)
	   echo "history.back();"; // ย้อนกลับไปที่หน้าก่อนหน้านี้
	   echo "</script>";
   }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
