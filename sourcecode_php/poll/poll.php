<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<?php
 include("connect.php");  // include file สำหรับทำการเชื่อมต่อฐานข้อมูล
 $sql = "select question_id,question from question order by question_id desc";
 // ดึงคำถามจากฐานข้อมูล
 $query = mysql_query($sql) or die ("select question error command : $sql");
 $row = mysql_fetch_array($query); 
?>
<form id="frm_poll" name="frm_poll" method="post" action="vote_poll.php">
  <table width="219" border="0" cellpadding="2" cellspacing="4" class="square">
    <tr>
      <td colspan="2" align="center"><?php echo $row['question']?></td>
    </tr>
<?php
   $sql  = "select answer_id,answer from answer";
   $sql .= " where question_id=".$row['question_id']; // ดึงคำตอบจากฐานข้อมูล
   $query = mysql_query($sql) or die ("select answer error command : $sql");
   $num = mysql_num_rows($query);
   for($i=0;$i<$num;$i++) {  // วนลูปเพื่อโชว์คำตอบทั้งหมดของคำถามนั้นๆ
	   $row = mysql_fetch_array($query); 
?>
    <tr>
      <td width="86"><div align="right">
     <input name="answer_id" type="radio" value="<?php echo $row['answer_id']?>">
      </div></td>
      <!-- สร้าง radio เพื่อให้ผู้ใช้เลือกคำตอบ ส่งค่า answer id ไปทำการ update ฐานข้อมูล -->
      <td width="111" align="left"><?php echo $row['answer']?></td>
    </tr>	       
	<?php } ?>
    <tr>
      <td colspan="2"><div align="center">
          <input type="button" value="View">
          <input type="submit" value="Vote">
      </div></td>
    </tr>
  </table>
</form>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
