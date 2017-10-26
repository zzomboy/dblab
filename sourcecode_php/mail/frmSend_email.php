<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style11 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.style12 {font-size: 10px}
-->
</style>
<script language="javascript">
    function check_null(){  // เช็คให้ผู้ใช้ต้องทำการกรอกข้อมูลให้ครบ
		if (frm_sendemail.Email_to.value=="" || frm_sendemail.Email_to.value==null) {
		    alert('กรุณาใส่ E-Mail Address ผู้รับ !');
			frm_sendemail.Email_to.focus();
			return false;
		}
	    if (frm_sendemail.Email_from.value=="" || frm_sendemail.Email_from.value==null) {
		    alert('กรุณาใส่ E-Mail Address ผู้ส่ง !');
			frm_sendemail.Email_from.focus();
			return false;
		}
	    if (frm_sendemail.Email_subject.value=="" || frm_sendemail.Email_subject.value==null) {
		    alert('กรุณาใส่ Subject !');
			frm_sendemail.Email_subject.focus();
			return false;
		}
	    if (frm_sendemail.Email_message.value=="" || frm_sendemail.Email_message.value==null) {
		    alert('กรุณาใส่ Message !');
			frm_sendemail.Email_message.focus();
			return false;
		}

		var email = document.getElementById('Email_to');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(email.value)) {
			alert("E-Mail Address "+email.value+" ของผู้รับไม่ถูกต้อง !");
			email.focus
			return false;
		}
		
		email = document.getElementById('Email_from');
		if (!filter.test(email.value)) {
			alert("E-Mail Address "+email.value+" ของผู้ส่งไม่ถูกต้อง !");
			email.focus
			return false;
		}
		
	    return true;
	}
</script>
</head>

<body>
<div align="center">
  <form id="frm_sendemail" name="frm_sendemail" method="post" action="send_email.php" onsubmit="return check_null();">
    <table width="305" border="0" cellspacing="4" cellpadding="0">
      <tr>
        <td width="112"><div align="right" class="style11">To : </div></td>
        <td width="161"><div align="left" class="style11"><input name="Email_to" type="text" class="style12" id="Email_to" size="30" />
        </div></td>
        <td width="127"></td>
      </tr>
      <tr>
        <td><div align="right" class="style11">From : </div></td>
        <td><div align="left" class="style11"><input name="Email_from" type="text" class="style12" id="Email_from" size="30" />
        </div></td>
        <td></td>
      </tr>
      <tr>
        <td><div align="right" class="style11">Subject : </div></td>
        <td><div align="left" class="style11"><input name="Email_subject" type="text" class="style12" id="Email_subject" size="30" />
        </div></td>
        <td></td>
      </tr>
      <tr>
        <td valign="top"><div align="right" class="style11">Message : </div></td>
        <td><div align="left" class="style11"><textarea name="Email_message" cols="38" rows="4" class="style12" id="Email_message"></textarea>
        </div></td>
        <td valign="bottom"><span class="style11">
          <input name="button" type="submit" class="style12" id="button" value="Submit" />
        </span></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
