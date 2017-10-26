<link href="stylesheet.css" rel="stylesheet" type="text/css" />
  <form name="frm_create_poll" method="post" action="create_poll.php">
  <table width="320" border="0" align="center" cellspacing="4" class="square">
    <tr>
      <td width="80"><div align="right">คำถาม : </div></td>
      <td width="240"><div align="left">
      <input name="question" type="text" class="verdana" id="question" />
      </div></td>
    </tr>
    <?php for($i = 1 ; $i <= 5 ; $i++) { // วนลูปโชว์ text field สำหรับเพิ่มคำตอบ    
	?>
    <tr>
      <td><div align="right">คำตอบ <?php echo $i?> : </div></td>
      <td><div align="left">
      <input name="answer[]" type="text" class="verdana" id="answer[]" />
      <!-- ใช้ขื่อของ text field ของ answer เป็น array : answer[] -->
      <?php if ($i==5) {  // ถ้าเป็นบรรทัดสุดท้ายให้เพิ่มปุ่มสำหรับคลิกเพื่ิอเพิ่มโพลล์ใหม่  ?>
     <input name="create" type="submit" class="verdana" value="Create">
      <?php } ?>
      </div></td>
    </tr>
    <?php } ?>
  </table>
  </form>
  
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
