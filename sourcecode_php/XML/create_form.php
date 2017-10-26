<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลใหม่</title>
<link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
        <center><br /><br />
        <a href="index.php">หน้าหลัก</a><br /><br />
        <!-- Form สำหรับส่งค่าต่างๆ ไปทำการเพิ่มข้อมูลที่ไฟล์ action.php -->
        <form id="frm" action="action.php" method="post">
                <input type="hidden" name="op" id="op" value="create" />
                <table width="600px" cellpadding="4" cellspacing="1" border="0" class="square">
                    <tr>
                        <td width="20%" align="right" class="square_header">Name</td>
                        <td width="60%" class="square"><input type="text" name="tbName" id="tbName" style="width:95%" /></td>
                        <td width="20%" class="square">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%" align="right" class="square_header">Surname</td>
                        <td width="60%" class="square"><input type="text" name="tbSName" id="tbSName" style="width:95%" /></td>
                        <td width="20%" class="square"><input type="submit" value="Create" /></td>
                    </tr>
                </table>
        </form>
        </center>
</body>
</html>