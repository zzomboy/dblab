<? ob_start();

	 header("Content-Type:text/html; charset=UTF-8");  // กำหนด Charset ของไฟล์
	 include_once("config.php"); // ดึงไฟล์ config.php
	 
	 $file = $GLOBALS['file'];
	 $op =$_REQUEST['op']; // เช็คว่าผู้ใช้ต้องการทำอะไร เพิ่ม แก้ไข หรือ ลบ
	 if($op == "delete"){
		deleteEmployee();
	 }else if($op == "update"){
		updateEmployee();
	 }else if($op == "create"){
		createEmployee();
	 }
	
	 function updateEmployee(){
		  // รับค่าต่างๆ มาเก็บไว้ในตัวแปร
		  global $file;
		  $form = $_POST;
		  $no = $form['no'];
		  $name = $form['tbName'];
		  $surname = $form['tbSName'];
		
		  $dom = new DOMDocument('1.0', 'UTF-8');  // เรียกใช้ Class DOMDocument
		  $dom->preserveWhiteSpace = false; // เซ็ทให้ไม่สนใจส่วนของ บรรทัดใหม่ ช่องว่าง และ แท็บ
		  $dom->formatOutput = true; // กำหนดให้ XML ไฟล์ที่อัพเดทมีแท็บ แต่ละ Element สวยงามอ่านง่าย
		  $dom->load($file); // โหลดเอกสาร XML เข้าไปยัง  memory
		  $root = $dom->documentElement; // 
		
		  $xpath = new DOMXPath($dom);  // เรียกใช้ Class DOMXPath
		  $oldData = $xpath->query('//employees/employee[@no='.$no.']');
		  $oldData = $oldData->item(0);  // ดึงข้อมูลเก่าสำหรับ replaceChild()
		
		  // เตรียมข้อมูลใหม่สำหรับ replaceChild()
		  $employee = $dom->createElement('employee'); // เพิ่มแท็กเปิด
		  $employee->setAttribute('no', $no); // เซ็ท Attribute
		
		  // เตรียมข้อมูลสำหรับ Element name
		  $nameE = $dom->createElement('name'); // เพิ่มแท็กเปิด
		  $nameText = $dom->createTextNode("$name"); // เพิ่มข้อมูล
		  $nameE->appendChild($nameText); // เพิ่มแท็กปิด
		  $employee->appendChild($nameE); // เพิ่มแท็กปิด

		  // เตรียมข้อมูลสำหรับ Element surname
		  $surnameE = $dom->createElement('surname'); // เพิ่มแท็กเปิด
		  $surnameText = $dom->createTextNode("$surname"); // เพิ่มข้อมูล
		  $surnameE->appendChild($surnameText); // เพิ่มแท็กปิด
		  $employee->appendChild($surnameE); // เพิ่มแท็กปิด
		
		  $root->replaceChild($employee, $oldData);  // ทำการอัพเดทข้อมูล
		  $dom->save($file); // บันทึกข้อมูล
		
		  header("Location:index.php");
	 }
	
	 function deleteEmployee(){
		  // รับค่าต่างๆ มาเก็บไว้ในตัวแปร
		  global $file;
		  $id = $_GET['id'];
		
		  $dom = new DOMDocument('1.0', 'UTF-8');  // เรียกใช้ Class DOMDocument
		  $dom->load($file); // โหลดเอกสาร XML เข้าไปยัง  memory
		  $dom->formatOutput = true; // กำหนดให้ XML ไฟล์ที่อัพเดทมีแท็บ แต่ละ Element สวยงามอ่านง่าย
		
		  $employees = $dom->documentElement;
		  $xpath = new DOMXPath($dom);
		  
		  // ค้นหา Child ที่มี Attribute ที่มี no เท่ากับ no ที่ส่งมา
		  $employee = $xpath->query('//employees/employee[@no='.$id.']');
		  if($employee){ // เช็คว่ามี Element ที่อยู่ในเงื่อนไขหรือไม่ ถ้ามีจะทำการ Remove Child ดังกล่าว
			 $employee = $employee->item(0);
			 $employees->removeChild($employee); // ทำการ Remove Child ดังกล่าว

			 $dom->save($file); // บันทึกข้อมูล
		  }
		  header("Location:index.php");
	 }
	
	 function createEmployee(){
		  // รับค่าต่างๆ มาเก็บไว้ในตัวแปร
		  global $file;
		  $form = $_POST;
		  $name = $form['tbName'];
		  $surname = $form['tbSName'];
		  
		  if(trim($name) != "" and trim($surname) != ""){ // เช็คกรณีที่ไม่มีการส่งค่าตัวแปรมา จะไม่ทำการเพิ่มข้อมูล
			  # Dom
			  $dom = new DOMDocument();  // เรียกใช้ Class DOMDocument
			  $dom->load($file); // โหลดเอกสาร XML เข้าไปยัง  memory
			  # XPath
			  $xpath = new DOMXPath($dom);  // เรียกใช้ Class DOMXPath
			  $last = $xpath->query('//employees/employee[last()]');  // หา no สุดท้าย เพื่อเขียนต่อท้าย
			  
			  // กรณีที่มีข้อมูลให้ดึงค่า no สุดท้ายมาใช้งาน แต่กรณีที่ไม่มีข้อมูล ให้ค่า $no = 0
			  if($last->length > 0){  
				 $no = $last->item(0)->getAttribute('no');
			  }else{
				 $no = 0;
			  }
			  createNew($no+1, $name, $surname);  // เรียกฟังก์ชั่น createNew() เพื่อทำการเพิ่มข้อมูลใหม่
			  header("Location:index.php");
		  }else{
			  echo 'All inputs are required !';  // กรณีไม่มีข้อมูลส่งมาแจ้ง Error ให้ผู้ใช้ทราบ
			  exit();
		  }
	 }
	
	 function createNew($no = 1, $nameValue, $surnameValue){
		  $file = $GLOBALS['file'];
		  $xml = simplexml_load_file($file);  // โหลดไฟล์มาเก็บไว้ในตัวแปร

		  $dom = new DOMDocument('1.0', 'UTF-8');  // เรียกใช้ Class DOMDocument
		  $dom->preserveWhiteSpace = false;  // เซ็ทให้ไม่สนใจส่วนของ บรรทัดใหม่ ช่องว่าง และ แท็บ
		  $dom->formatOutput = true; // กำหนดให้ XML ไฟล์ที่อัพเดทมีแท็บ แต่ละ Element สวยงามอ่านง่าย
		  $dom->loadXML($xml->asXML());

		  $employees = $dom->getElementsByTagName('employees')->item(0); // ดึงลิสต์ของโหนดต่างๆ

		  $employee = $dom->createElement('employee'); // เพิ่มแท็กเปิด
		  $employee->setAttribute('no', $no); // เซ็ท Attribute
		
		  // เตรียมข้อมูลสำหรับ Element name
		  $name = $dom->createElement('name'); // เพิ่มแท็กเปิด
		  $nameText = $dom->createTextNode("$nameValue"); // เพิ่มข้อมูล
		  $name->appendChild($nameText); // เพิ่มแท็กปิด
		  $employee->appendChild($name); // เพิ่มแท็กปิด

		  // เตรียมข้อมูลสำหรับ Element surname
		  $surname = $dom->createElement('surname'); // เพิ่มแท็กเปิด
		  $surnameText = $dom->createTextNode("$surnameValue"); // เพิ่มข้อมูล
		  $surname->appendChild($surnameText); // เพิ่มแท็กปิด
		  $employee->appendChild($surname); // เพิ่มแท็กปิด

		  $employees->appendChild($employee); // เพิ่มแท็กปิด

		  $dom->formatOutput = true; // กำหนดให้ XML ไฟล์ที่อัพเดทมีแท็บ แต่ละ Element สวยงามอ่านง่าย
		  $dom->save($file); // บันทึกข้อมูล
	 }
	 
    ob_end_flush();?>