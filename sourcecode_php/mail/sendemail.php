<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<? $to = "sam@localhost";  // �к�������ͧ����Ѻ
   $header ="from: sam@netdesign.ac.th";  // �к� Header �������������ҡ��
   $subject = "���ͺ�����������";  // �к� Subject �ͧ������
   $msg = "���ͺ��������Ẻ�����Ҥ�Ѻ��";  // �к������Ңͧ������
   
   if(mail($to,$subject,$msg,$header)) {  // ����ҷӡ�������������������
	   echo "�����������º��������";
   } else {
	   echo "�������ö����������";
   } ?>