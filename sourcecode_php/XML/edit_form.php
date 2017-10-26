<? ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ข้อมูล</title>
<link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
        <center><br /><br />

		<? include_once("config.php"); // ดึงไฟล์ config.php
             
			 // เช็คว่ามีการส่งค่า ID มาหรือไม่ กรณีถ้าไม่มีการส่งค่ามาให้ทำการ Redirect ไปยังหน้า index.php
			 if(! isset($_GET['id']) and trim($_GET['id']) == ""){
                echo "<script>alert('ไม่พบข้อมูลที่ต้องการ !');window.location='index.php';</script>";
                exit();
             }
             $file = $GLOBALS['file'];
             $dom = new DOMDocument();  // เรียกใช้ Class DOMDocument
             $dom->load($file); // โหลดเอกสาร XML เข้าไปยัง  memory
            
             $id = $_GET['id'];
             $xpath = new DOMXPath($dom);  // เรียกใช้ Class DOMXPath
			 // ดึงค่า Element name, surname เฉพาะ no ที่ตรงกับ ID ที่ส่งมา
             $employee = $xpath->query('//employees/employee[@no='.$id.']');  // สั่งประมวลผล
			 // ดึงค่าที่ได้จากการส่ังประมวลผล (query)
             $name = $employee->item(0)->getElementsByTagName('name')->item(0)->nodeValue; // ดึงลิสต์ของโหนดต่างๆ
             $surname = $employee->item(0)->getElementsByTagName('surname')->item(0)->nodeValue; // ดึงลิสต์ของโหนดต่างๆ ?>

        <a href="index.php">หน้าหลัก</a><br /><br />
        <!-- Form สำหรับโชว์ข้อมูลเดิมก่อนทำการแก้ไข -->
        <form id="frm" action="action.php" method="post">
                <!-- Hidden mode และ no ที่ต้องการแก้ไข -->
                <input type="hidden" name="op" id="op" value="update" />
                <input type="hidden" name="no" id="no" value="<?=$id?>" />
                <table width="600px" cellpadding="4" cellspacing="1" border="0" class="square">
                    <tr>
                        <td width="20%" align="right" class="square_header">Name</td>
                        <td width="60%" class="square"><input type="text" name="tbName" id="tbName" style="width:95%" value="<?=$name?>" /></td>
                        <td width="20%" class="square">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%" align="right" class="square_header">Surname</td>
                        <td width="60%" class="square"><input type="text" name="tbSName" id="tbSName" style="width:95%" value="<?=$surname?>" /></td>
                        <td width="20%" class="square"><input type="submit" value="Update" /></td>
                    </tr>
                </table>
        </form>
        </center>
</body>
</html>
<? ob_end_flush(); ?>