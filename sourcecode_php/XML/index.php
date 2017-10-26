<? ob_start();

	 include_once("config.php"); // ดึงไฟล์ config.php
	 $file = $GLOBALS['file'];
	 
	 // เช็คว่ามีไฟล์ XML หรือยัง กรณีที่ยัง ให้ Redirect ไปยังไฟล์ writer.php เพื่อทำการสร้างไฟล์ XML ก่อน
     if(!file_exists($file)){ 
		header("Location:writer.php");
		exit();
	 } ?>
	 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงข้อมูล</title>
<link rel="stylesheet" type="text/css" href="main.css"/>
<script language="javascript">
	function confirmDelete(name){ // ฟังก์ชั่นยืนยันก่อนทำการลบ
		 if(confirm('คุณต้องการลบ '+name+' ?')){ // ฟังก์ชั่น Popup มาที่หน้าจอโดยจะมีปุ่ม OK และ Cancel
			return true; // กรณีที่ผู้ใช้กด OK จะ return ture เพื่อทำงานต่อไป
		 } else {
			return false; // กรณีที่ผู้ใช้กด Cancel จะ return false เพื่อ break การทำงาน
		 }
	}
</script>
</head>

<body>
        <center><br /><br />
        <!-- ลิงค์ไปยังไฟล์ create_form.php เพื่อทำการเพิ่มข้อมูล -->
        <a href="create_form.php">เพิ่มข้อมูลใหม่</a><br /><br />
        <table width="600px" cellpadding="4" cellspacing="1" border="0" class="square">
        
        
       <? $xml = new XMLReader();  // เรียกใช้ Class XMLReader
            $xml->open($file); // เปิดไฟล์ XML
    
            // วนลูปเช็คหา Element employee กรณีที่พบแสดงว่ามีข้อมูล แล้วจึงทำการอ่าน XML ไฟล์
			while($xml->name != "employee"){ 
                 $canRead = $xml->read(); // อ่าน XML ไฟล์
                 if(!$canRead){
                    break;
                 }
            } ?>

        <tr>
            <td align="center" class="square_header" width="16%">No.</td>
            <td align="center" class="square_header" width="34%">Name</td>
            <td align="center" class="square_header" width="34%">Surname</td>
            <td align="center" class="square_header" width="8%">Edit</td>
            <td align="center" class="square_header" width="8%">Delete</td>
        </tr>

        <?	if($xml->name == "employee"){  // กรณีที่มีข้อมูล จึงทำการวนลูปเพื่ออ่านข้อมูลจาก XML ไฟล์
                do{
                    // ทำการดึง Attribute และ Element มาเก็บไว้ในตัวแปรต่างๆ
					$no = $xml->getAttribute('no');
                    $dom = $xml->expand(); // สั่งประมวลผล
                    $name = $dom->getElementsByTagName("name")->item(0)->nodeValue; // ดึงลิสต์ของโหนดต่างๆ
                    $sname = $dom->getElementsByTagName("surname")->item(0)->nodeValue; // ดึงลิสต์ของโหนดต่างๆ ?>
                    
                    <tr> <!-- โชว์ข้อมูลที่ได้จาก XML ไฟล์ -->
                        <td align="center" class="square"><?=$no?></td>
                        <td align="center" class="square"><?=$name?></td>
                        <td align="center" class="square"><?=$sname?></td>
                        <td align="center" class="square">
                        <a href="edit_form.php?id=<?=$no?>"> <!-- ส่งค่า no เพื่อไปทำการแก้ไขที่หน้า edit_form.php --> 
                        <img src="images/edit.gif" border="0" />
                        </a>
                        </td>
                        <td align="center" class="square">
                        <!-- ส่งค่า mode=delete และ no ไปทำการลบที่ไฟล์ action.php
                               ก่อนทำการลบจะมีการเรียนใช้ฟังก์ชั่น confirmDelete เพื่อยืนยันการลบ -->
                        <a href="action.php?op=delete&id=<?=$no?>" onclick="return confirmDelete('<?=$name." ".$sname?>');">
                        <img src="images/delete.gif" border="0" />
                        </a>
                        </td>
                    </tr>

           <? }while($xml->next('employee'));  // อ่านข้อมูลจนกว่าข้อมูลหมด
            }else{ ?>
                <tr>
                    <td colspan="5" align="center" class="square">ไม่พบข้อมูลที่ต้องการ</td>
                </tr>                
        <?	} ?>

        </table>
        </center>
</body>
</html>
<? ob_end_flush(); ?>