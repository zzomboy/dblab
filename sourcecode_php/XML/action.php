<? ob_start();

	 header("Content-Type:text/html; charset=UTF-8");  // ��˹� Charset �ͧ���
	 include_once("config.php"); // �֧��� config.php
	 
	 $file = $GLOBALS['file'];
	 $op =$_REQUEST['op']; // ����Ҽ�����ͧ��÷����� ���� ��� ���� ź
	 if($op == "delete"){
		deleteEmployee();
	 }else if($op == "update"){
		updateEmployee();
	 }else if($op == "create"){
		createEmployee();
	 }
	
	 function updateEmployee(){
		  // �Ѻ��ҵ�ҧ� �������㹵����
		  global $file;
		  $form = $_POST;
		  $no = $form['no'];
		  $name = $form['tbName'];
		  $surname = $form['tbSName'];
		
		  $dom = new DOMDocument('1.0', 'UTF-8');  // ���¡�� Class DOMDocument
		  $dom->preserveWhiteSpace = false; // ��������ʹ���ǹ�ͧ ��÷Ѵ���� ��ͧ��ҧ ��� ��
		  $dom->formatOutput = true; // ��˹���� XML ������Ѿഷ���� ���� Element ��§����ҹ����
		  $dom->load($file); // ��Ŵ�͡��� XML �����ѧ  memory
		  $root = $dom->documentElement; // 
		
		  $xpath = new DOMXPath($dom);  // ���¡�� Class DOMXPath
		  $oldData = $xpath->query('//employees/employee[@no='.$no.']');
		  $oldData = $oldData->item(0);  // �֧�������������Ѻ replaceChild()
		
		  // �������������������Ѻ replaceChild()
		  $employee = $dom->createElement('employee'); // �������Դ
		  $employee->setAttribute('no', $no); // �� Attribute
		
		  // ���������������Ѻ Element name
		  $nameE = $dom->createElement('name'); // �������Դ
		  $nameText = $dom->createTextNode("$name"); // ����������
		  $nameE->appendChild($nameText); // �����硻Դ
		  $employee->appendChild($nameE); // �����硻Դ

		  // ���������������Ѻ Element surname
		  $surnameE = $dom->createElement('surname'); // �������Դ
		  $surnameText = $dom->createTextNode("$surname"); // ����������
		  $surnameE->appendChild($surnameText); // �����硻Դ
		  $employee->appendChild($surnameE); // �����硻Դ
		
		  $root->replaceChild($employee, $oldData);  // �ӡ���Ѿഷ������
		  $dom->save($file); // �ѹ�֡������
		
		  header("Location:index.php");
	 }
	
	 function deleteEmployee(){
		  // �Ѻ��ҵ�ҧ� �������㹵����
		  global $file;
		  $id = $_GET['id'];
		
		  $dom = new DOMDocument('1.0', 'UTF-8');  // ���¡�� Class DOMDocument
		  $dom->load($file); // ��Ŵ�͡��� XML �����ѧ  memory
		  $dom->formatOutput = true; // ��˹���� XML ������Ѿഷ���� ���� Element ��§����ҹ����
		
		  $employees = $dom->documentElement;
		  $xpath = new DOMXPath($dom);
		  
		  // ���� Child ����� Attribute ����� no ��ҡѺ no �������
		  $employee = $xpath->query('//employees/employee[@no='.$id.']');
		  if($employee){ // ������� Element �����������͹�������� ����ըзӡ�� Remove Child �ѧ�����
			 $employee = $employee->item(0);
			 $employees->removeChild($employee); // �ӡ�� Remove Child �ѧ�����

			 $dom->save($file); // �ѹ�֡������
		  }
		  header("Location:index.php");
	 }
	
	 function createEmployee(){
		  // �Ѻ��ҵ�ҧ� �������㹵����
		  global $file;
		  $form = $_POST;
		  $name = $form['tbName'];
		  $surname = $form['tbSName'];
		  
		  if(trim($name) != "" and trim($surname) != ""){ // �礡óշ������ա���觤�ҵ������ �����ӡ������������
			  # Dom
			  $dom = new DOMDocument();  // ���¡�� Class DOMDocument
			  $dom->load($file); // ��Ŵ�͡��� XML �����ѧ  memory
			  # XPath
			  $xpath = new DOMXPath($dom);  // ���¡�� Class DOMXPath
			  $last = $xpath->query('//employees/employee[last()]');  // �� no �ش���� ������¹��ͷ���
			  
			  // �óշ���բ��������֧��� no �ش��������ҹ ��óշ������բ����� ����� $no = 0
			  if($last->length > 0){  
				 $no = $last->item(0)->getAttribute('no');
			  }else{
				 $no = 0;
			  }
			  createNew($no+1, $name, $surname);  // ���¡�ѧ���� createNew() ���ͷӡ����������������
			  header("Location:index.php");
		  }else{
			  echo 'All inputs are required !';  // �ó�����բ����������� Error ��������Һ
			  exit();
		  }
	 }
	
	 function createNew($no = 1, $nameValue, $surnameValue){
		  $file = $GLOBALS['file'];
		  $xml = simplexml_load_file($file);  // ��Ŵ����������㹵����

		  $dom = new DOMDocument('1.0', 'UTF-8');  // ���¡�� Class DOMDocument
		  $dom->preserveWhiteSpace = false;  // ��������ʹ���ǹ�ͧ ��÷Ѵ���� ��ͧ��ҧ ��� ��
		  $dom->formatOutput = true; // ��˹���� XML ������Ѿഷ���� ���� Element ��§����ҹ����
		  $dom->loadXML($xml->asXML());

		  $employees = $dom->getElementsByTagName('employees')->item(0); // �֧��ʵ�ͧ�˹���ҧ�

		  $employee = $dom->createElement('employee'); // �������Դ
		  $employee->setAttribute('no', $no); // �� Attribute
		
		  // ���������������Ѻ Element name
		  $name = $dom->createElement('name'); // �������Դ
		  $nameText = $dom->createTextNode("$nameValue"); // ����������
		  $name->appendChild($nameText); // �����硻Դ
		  $employee->appendChild($name); // �����硻Դ

		  // ���������������Ѻ Element surname
		  $surname = $dom->createElement('surname'); // �������Դ
		  $surnameText = $dom->createTextNode("$surnameValue"); // ����������
		  $surname->appendChild($surnameText); // �����硻Դ
		  $employee->appendChild($surname); // �����硻Դ

		  $employees->appendChild($employee); // �����硻Դ

		  $dom->formatOutput = true; // ��˹���� XML ������Ѿഷ���� ���� Element ��§����ҹ����
		  $dom->save($file); // �ѹ�֡������
	 }
	 
    ob_end_flush();?>