<? $to = "sam@localhost";  // �к�������ͧ����Ѻ

   $header  ="MIME-Version: 1.0\r\n";  // �к� Header ����繡����������Ẻ HTML ��� encode �� windows-874
   $header .="Content-type: text/html; charset=windows-874\r\n";
   
   $header .="from: sam@netdesign.ac.th";  // �к� Header �������������ҡ��
   $subject = "���ͺ�����������";  // �к� Subject �ͧ������
   
   // �к������Ңͧ������ ���� HTML
   $msg  = "<center><span style=\"font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px\">";
   $msg .= "FREE ! NetDesign's BEAR<br/><br/>";
   $msg .= "<img src=\"http://www.netdesign.ac.th/promotion/2008/bear.jpg\" /><br/><br>";
   $msg .= "��Ѥ����¹ ��Ъ��Ф��ͺ�� ��͹�ѹ���¹ 10 �ѹ<br/>";
   $msg .= "�����Ѻ NetDesign BEAR ����˭� ����ѡ<br/>";
   $msg .= "�͡ʹ��� ����ͧ��� \" I Love You \"<br/><br/>";
   $msg .= "( �����Һѵû�ЪҪ� ��� ����稤�����¹���Ѻ����ѹ��������¹ )<br/>";
   $msg .= "��ǹ! ���ࢵ�ѹ��� 30 �Զع�¹ 2551</span></center>";

   if(mail($to,$subject,$msg,$header)) {  // ����ҷӡ�������������������
	   echo "�����������º��������";
   } else {
	   echo "�������ö����������";
   } ?>
   
   
   
   
   
   