<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<? $to = $_REQUEST['Email_to'];  // �к�������ͧ����Ѻ
   $header = $_REQUEST['Email_from'];  // �к� Header �������������ҡ��
   $subject = $_REQUEST['Email_subject'];  // �к� Subject �ͧ������
   $msg = $_REQUEST['Email_message'];  // �к������Ңͧ������
   
   if(mail($to,$subject,$msg,$header)) {  // ����ҷӡ�������������������
	   echo "�����������º��������";
   } else {
	   echo "�������ö����������";
   } ?>