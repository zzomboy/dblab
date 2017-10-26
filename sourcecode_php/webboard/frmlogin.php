<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin login</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<script language="javascript">
    function checkNull(){  // เช็คค่าว่าง ให้ user กรอกข้อมูลให้ครบก่อนทำการล็อคอิน
	    if(document.frmLogin.username.value=='' || document.frmLogin.username.value==null){
		   alert('Please insert username !');  // alert มาที่หน้าจอแจ้งเตือน ว่า ไม่ได้ใส่ Username
		   document.frmLogin.username.focus();  // ให้ Cursor ไปที่ช่องกรอก Username
		   return false;
		}
	    if(document.frmLogin.password.value=='' || document.frmLogin.password.value==null){
		   alert('Please insert password !');  // alert มาที่หน้าจอแจ้งเตือน ว่า ไม่ได้ใส่ Password
		   document.frmLogin.password.focus();  // ให้ Cursor ไปที่ช่องกรอก Password
		   return false;
		}
		document.frmLogin.submit();  // กรณีที่กรอกข้อมูลครบให้ทำการ submit form
	}
</script>
</head>
<body>
    <center><br />
      <form id="frmLogin" name="frmLogin" method="post" action="login.php" 
      onsubmit="checkNull();return false;">
        <table width="340" class="square" cellpadding="4" cellspacing="1">
        	<tr>
               <td class="square" align="center" width="30%">Username</td>
               <td class="square" align="left" width="70%">
	               <input type="text" id="username" name="username" class="verdana" />
              </td>
        	</tr>
        	<tr>
               <td class="square" align="center" width="30%">Password</td>
               <td class="square" align="left" width="70%">
               <input type="password" id="password" name="password" class="verdana" />
               <input type="submit" value="Login" class="verdana" />
              </td>
        	</tr>
        </table>
        <br />
        <a href="logout.php" class="verdana">Logout</a>
      </form>
    </center>
