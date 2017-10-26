<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<? $to = "sam@localhost";  // ระบุอีเมล์ของผู้รับ
   $header ="from: sam@netdesign.ac.th";  // ระบุ Header ว่าส่งอีเมล์นี้จากใคร
   $subject = "ทดสอบการส่งอีเมล์";  // ระบุ Subject ของอีเมล์
   $msg = "ทดสอบส่งอีเมล์แบบธรรมดาครับผม";  // ระบุเนื้อหาของอีเมล์
   
   if(mail($to,$subject,$msg,$header)) {  // เช็คว่าทำการส่งอีเมล์ได้หรือไม่
	   echo "ส่งอีเมล์เรียบร้อยแล้ว";
   } else {
	   echo "ไม่สามารถส่งอีเมล์ได้";
   } ?>