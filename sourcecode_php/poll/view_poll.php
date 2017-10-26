<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
  <?php include("connect.php");   // include file สำหรับทำการเชื่อมต่อฐานข้อมูล
     $sql = "select question_id,question from question order by question_id desc";
	 // ดึงคำถามจากฐานข้อมูล
	 $query = mysql_query($sql) or die ("select question error command : $sql");
	 $row = mysql_fetch_array($query);
	 $question_id = $row['question_id']; ?>
  <table width="378" border="0" cellpadding="2" cellspacing="4" class="square">
    <tr>
      <td colspan="3"><div align="center"><?php echo $row['question']?></div></td>
    </tr>
   <?php
   	   $sql  = "select sum(score) as total_score from answer";
       $sql .= " where question_id=$question_id";
	   // หาค่าผลรวมของคะแนนเพื่อนำไปหาค่าเปอร์เซ็น
       $query = mysql_query($sql) or die ("select question error command : $sql");
       $row = mysql_fetch_array($query);
	   $total_score = $row['total_score'];
         
       function percentage($score,$total_score){ // function สำหรับหาค่าเปอร์เซ็น
	       $output = ($score*100)/$total_score;
		   return $output;
       }
	   $sql  = "select answer_id,score,answer from answer";
	   $sql .= " where question_id=$question_id"; // ดึงคำตอบจากฐานข้อมูล
	   $query = mysql_query($sql) or die ("select answer error command : $sql");
	   $num = mysql_num_rows($query);
	   for($i=0;$i<$num;$i++) {  // วนลูปเืพื่อโชว์คำตอบทั้งหมดของคำถามนั้นๆ
	       $row = mysql_fetch_array($query); ?>
            <tr>
              <td width="98"><div align="right"><?php echo $row['answer']?></div></td>
              <td width="134">
                  <table width="<?php echo percentage($row['score'],$total_score)?>">
                  <tr><td height="11" bgcolor="#FF0000"></td></tr>
                  </table>
              </td>
              <td width="116"><div align="left">
			  <?php echo $row['score']?> 
              (<?php echo number_format(percentage($row['score'],$total_score),2)?> %)
      <!-- ส่งค่า score ไปหาค่าเปอร์เซ็น และ ใช้ function number_format ให้ได้ทศนิยม 2 ตำแหน่ง -->
              </div></td>
            </tr>	       
	<? } ?>
  </table>
