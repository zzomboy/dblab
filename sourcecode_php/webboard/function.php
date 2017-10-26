<?php
   function showAttachfile($imagename)
   {
      if($imagename<>"")
	  {
		  // หาขนาดของรูปภาพด้วยฟังก์ชั่น getimagesize()
		 $imagesize = getimagesize("attach/$imagename.jpg");  
		 if($imagesize[0]>$imagesize[1])
		 {
		    // เช็คขนาดของความกว้างหรือว่าความยาว ด้านที่ยาวกว่าจะกำหนดให้มีขานด 150 pixel
			if($imagesize[0] > 150) 
			{
			   $w = 150;
			   $h = ($imagesize[1]*150)/$imagesize[0];
			} else 
			{
			   $w = $imagesize[0];
			   $h = $imagesize[1];
			}
		 }else
		 {
			if($imagesize[0] > 150) 
			{
			   $h = 150;
			   $w = ($imagesize[0]*150)/$imagesize[1];
			}else
			{
			   $w = $imagesize[0];
			   $h = $imagesize[1];
			}
		 }
	     $output = "<img src=\"attach/$imagename.jpg\" width=\"$w\" height=\"$h\" />";
	  } else 
	  {
	     $output = "&nbsp;";
	  }
	  return $output;
   }
   
   function showIP($ipaddress)
   {
      if($ipaddress<>"::1")
	  {  // เช็คกรณีที่เป็น window vista 
		 $tmpSplit = split("\.",$ipaddress);
		 $output = $tmpSplit[0].".".$tmpSplit[1].".".$tmpSplit[2].".xxx";
	  } else 
	  {
	     $output = "127.0.0.xxx";
	  }
	  return $output;
   }
   
   function showEmo($detail)
   {  // ฟังก์ชั่นเปลี่ยนสัญลักษณ์ เช่น [1] เป็นรูป emo นั้นๆ
      for($i=1;$i<=15;$i++)
	  {
	      $detail = str_replace("[$i]","<img src=\"emo/$i.gif\" />",$detail);
		  // ใช้ฟังก์ชั่น str_replace เพื่อแทนค่าสัญลักษณ์ เป็น tag image html
	  }
	  return $detail;
   }
   
   function badword($detail) // ฟังก์ชั่นกรองคำหยาบ
   {  	// สามารถเพื่อคำที่ต้องการได้ใน array นี้
		$word	= array("fuck","suck"); 
		// ส่วนที่เป็นคำหยาบจะถูกแทนที่ด้วย *** สีแดง
		$detail = str_replace($word,"<font color=red>***</font>",$detail);  
		return $detail;
   } 
   
   function dateShow($datetime)
   {  
	  // ฟังก์ชั่นสำหรับแปลง วัน เวลา จาก 2009-01-15 10:00:00 เป็น 15 Jan 2009 10:00:00
      $monthname = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	  $monthnum = array("01","02","03","04","05","06","07","08","09","10","11","12");
	  
	  $tmpSplit = split(" ",$datetime);  // ทำการแยกวันและเวลาออกจากกัน
	  $datadate = $tmpSplit[0];
	  $datatime = $tmpSplit[1];
	  
	  $splitDate = split("-",$datadate);  // ทำการแยกวันออกจากกันเพื่อจัดเรียงใหม่
	  $output = $splitDate[2]." ".str_replace($monthnum,$monthname,$splitDate[1])." ".$splitDate[0]." ".$datatime;  
	  return $output;  // คืนค่า
   }  
?>