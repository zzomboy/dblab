<? $to = "sam@localhost";  // ระบุอีเมล์ของผู้รับ

   $header  ="MIME-Version: 1.0\r\n";  // ระบุ Header ว่าเป็นการส่งอีเมล์แบบ HTML และ encode เป็น windows-874
   $header .="Content-type: text/html; charset=windows-874\r\n";
   
   $header .="from: sam@netdesign.ac.th";  // ระบุ Header ว่าส่งอีเมล์นี้จากใคร
   $subject = "ทดสอบการส่งอีเมล์";  // ระบุ Subject ของอีเมล์
   
   // ระบุเนื้อหาของอีเมล์ เป็นโค้ด HTML
   $msg  = "<center><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px\">";
   $msg .= "FREE ! NetDesign's BEAR<br/><br/>";
   $msg .= "<img src=\"http://www.netdesign.ac.th/promotion/2008/bear.jpg\" /><br/><br>";
   $msg .= "สมัครเรียน และชำระค่าอบรม ก่อนวันเรียน 10 วัน<br/>";
   $msg .= "จะได้รับ NetDesign BEAR ตัวใหญ่ น่ารัก<br/>";
   $msg .= "พอกอดปั๊บ จะร้องว่า \" I Love You \"<br/><br/>";
   $msg .= "( นำสำเนาบัตรประชาชน และ ใบเสร็จค่าเรียนมารับได้ในวันเริ่มเรียน )<br/>";
   $msg .= "ด่วน! หมดเขตวันที่ 30 มิถุนายน 2551</span></center>";

   if(mail($to,$subject,$msg,$header)) {  // เช็คว่าทำการส่งอีเมล์ได้หรือไม่
	   echo "ส่งอีเมล์เรียบร้อยแล้ว";
   } else {
	   echo "ไม่สามารถส่งอีเมล์ได้";
   } ?>
   
   
   
   
   
   