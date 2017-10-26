<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<? $to = $_REQUEST['Email_to'];  // ระบุอีเมล์ของผู้รับ
   $header = $_REQUEST['Email_from'];  // ระบุ Header ว่าส่งอีเมล์นี้จากใคร
   $subject = $_REQUEST['Email_subject'];  // ระบุ Subject ของอีเมล์
   $msg = $_REQUEST['Email_message'];  // ระบุเนื้อหาของอีเมล์
   
   if(mail($to,$subject,$msg,$header)) {  // เช็คว่าทำการส่งอีเมล์ได้หรือไม่
	   echo "ส่งอีเมล์เรียบร้อยแล้ว";
   } else {
	   echo "ไม่สามารถส่งอีเมล์ได้";
   } ?>