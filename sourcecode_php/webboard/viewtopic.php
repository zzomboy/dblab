<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Webboard</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script language="javascript">
	function addEmo(num){  // ฟังก์ชั่นเพิ่มสัญลักษณ์ emo เข้าไปที่ช่อง detail
	    document.frmReply.detail.value = document.frmReply.detail.value + '[' + num + ']';
	}
    function checkNull(){  // ฟังก์ชั่นเช็คช่องว่าง User ต้องทำการกรอกช่อง detail และ name ก่อนถึงจะส่งข้อมูลได้
	   if(document.frmReply.detail.value=="" || document.frmReply.detail.value==null){
	      alert('Please insert detail !');
		  document.frmReply.detail.focus();
		  return false;
	   }
	   if(document.frmReply.name.value=="" || document.frmReply.name.value==null){
	      alert('Please insert name !');
		  document.frmReply.name.focus();
		  return false;
	   }
	   document.frmReply.submit();
	}
</script>
</head>

<body>
    <center><br />
    	<?php
		   include("connect.php");  
		   include("function.php");  
		   
		   $sql = "update webboard_post set view=view+1 where question_id=".$_REQUEST['id'];
		   //  ทำการ update ค่า view : จำนวนผู้เข้าชมกระทู้นี้
           $query = mysql_query($sql) or die(mysql_error());
		   
		   $sql = "select * from webboard_post where question_id=".$_REQUEST['id'];  
           $query = mysql_query($sql) or die(mysql_error());
		   $row = mysql_fetch_array($query); ?>

        <table width="700" class="square" cellpadding="4" cellspacing="1">
        	<tr>
            	<td width="20%" class="square" align="center">Subject</td>
                <td width="80%" class="square" align="left"><?php echo $row['subject']?></td>
            </tr>
            <tr>
            	<td width="20%" class="square" align="center">Detail</td>
              <td width="80%" class="square" align="left">
			  <?php echo showEmo(badword($row['subject_detail']))?>
              </td>
            </tr>
            <? if($row['attach_file']<>""){  // เช็คว่ามี attach file หรือไม่ ถ้ามีให้โชว์ ตารางแถวนี้ ?>
        	<tr>
            	<td width="20%" class="square" align="center">Attach file</td>
                <td width="80%" class="square" align="left">
				<?php echo showAttachfile($row['attach_file']) ?>
                </td>
            </tr>
            <? } ?>
        	<tr>
            	<td width="20%" class="square" align="center">Name</td>
                <td width="80%" class="square" align="left"><?php echo $row['name']?></td>
            </tr>
        	<tr>
                <td width="100%" colspan="2" class="square" align="right">
				Date : <?php echo dateShow($row['datadate'])?> 
                IP : <?php echo showIP($row['ip_address'])?>
                View : <?php echo $row['view']?> 
                Reply : <?php echo $row['reply']?>
                </td>
            </tr>
        </table><br />

		<?php 
			// select ฐานข้อมูลเพื่อเช็คว่ามีข้อมูลอยู่หรือไม่่
		   $sql = "select * from webboard_reply where question_id=".$_REQUEST['id'];  
           $query = mysql_query($sql) or die(mysql_error());
		   $num = mysql_num_rows($query);
		   if($num>0){
		      for($i=0;$i<$num;$i++){  // วน loop เพื่อโชว์ผู้ตอบทั้งหมด
		          $row = mysql_fetch_array($query); ?>
                  
                <table width="700" class="square" cellpadding="4" cellspacing="1">
                    <tr>
                        <td width="20%" class="square" align="center">Detail</td>
                      <td width="80%" class="square" align="left">
					  <?php echo showEmo(badword($row['reply_detail']))?>
                      </td>
                    </tr>
                    <? if($row['attach_file']<>""){ ?>
                    <tr>
                        <td width="20%" class="square" align="center">Attach file</td>
                        <td width="80%" class="square" align="left">
						<?php echo showAttachfile($row['attach_file'])?>
                        </td>
                    </tr>
                    <? } ?>
                    <tr>
                        <td width="20%" class="square" align="center">Name</td>
                        <td width="80%" class="square" align="left"><?php echo $row['name']?></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="2" class="square" align="right">
                        Date : <?php echo dateShow($row['datadate'])?> 
                        IP : <?php echo showIP($row['ip_address'])?>
                        </td>
                    </tr>
                </table><br />

                 <? }
		   } ?>

        <form id="frmReply" name="frmReply" enctype="multipart/form-data" method="post" 
        action="insertReply.php" onsubmit="checkNull();return false;">
        <!-- ในบทนี้เรามีการใช้งาน input type:file อย่าลืมใส่ enctype="multipart/form-data" ด้วย -->
    <table width="700" class="square" cellpadding="4" cellspacing="1">
        <tr>
            <td width="20%" class="square" align="center">Detail</td>
            <td width="80%" class="square" align="left">
     <textarea name="detail" rows="4" class="verdana" id="detail" style="width:500px"></textarea>
          </td>
        </tr>
        <tr>
            <td width="20%" class="square" align="center">Emo</td>
            <td width="80%" class="square" align="left">
            <? for($i=1;$i<=15;$i++){  // ทำการโชว์ emo ด้วยการวนลูป ?>
                   <img src="emo/<?php echo $i?>.gif" onclick="addEmo(<?php echo $i?>)" />
            <? } ?>
            </td>
        </tr>
        <tr>
            <td width="20%" class="square" align="center">Attach file</td>
            <td width="80%" class="square" align="left">
            <input type="file" id="attach" name="attach" class="verdana" />
            </td>
        </tr>
        <tr>
            <td width="20%" class="square" align="center">Name</td>
            <td width="80%" class="square" align="left">
            <input type="text" id="name" name="name" style="width:444px" class="verdana" />
            <input type="hidden" id="id" name="id" value="<?php echo $_REQUEST['id']?>" />
            <input type="submit" value="Post" class="verdana" />
            </td>
        </tr>
    </table>
        </form>

    </center>
</body>
</html>
