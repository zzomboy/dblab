<?php ob_start();

	header("Content-Type:text/html; charset=UTF-8");  // กำหนด Charset ของไฟล์

	 include_once("config.php"); // ดึงไฟล์ config.php
	 $file = $GLOBALS['file'];
	
	$writer = new XMLWriter();  // เรียกใช้ Class XMLWriter
	$writer->openMemory();

	// กำหนดค่า Start Document เช่น Version, Encoding
	// ผลลัพธ์ : < ? xml version="1.0" encoding="UTF-8" ? >
	$writer->startDocument('1.0', 'UTF-8');
	$writer->setIndent(true); // กำหนดให้ XML ไฟล์ที่เขียนแท็บ แต่ละ Element สวยงามอ่านง่าย
	$writer->setIndentString(" "); // กรณีที่แท็บในคำสั่ง setIndent() ต้องการให้ทำการใส่สัญลักษณ์อะไร

	// #1 ทำการกำหนด Start Element และ Attribute
	// ผลลัพธ์ : <employees>
	// ผลลัพธ์ : <employee no="1">
	$writer->startElement('employees');
	$writer->startElement("employee");
	$writer->writeAttribute('no', '1');
	
	// #2 กำหนด Element เริ่มต้น กรณีที่ไม่ต้องการ ไม่ต้องทำการใส่ Code ส่วนของ #1 #2 และ #3
	// ผลลัพธ์ : <name>เจริญศักดิ์</name>
	// ผลลัพธ์ : <surname>รัตนวราห</surname>
	$writer->writeElement('name', 'เจริญศักดิ์');
	$writer->writeElement('surname', 'รัตนวราห');
	
	// #3 ทำการปิด Element จะต้องทำการปิดให้ครบ
	// ผลลัพธ์ : </employee>
	// ผลลัพธ์ : </employees>
	$writer->endElement();
	$writer->endElement();

	// ทำการปิด Document
	$writer->endDocument();
	$xml = $writer->outputMemory(true);

	file_put_contents($file, $xml);  // ทำการเขียนไฟล์ XML

	ob_end_flush();?> 

<script language="javascript">window.location='index.php';</script> <!-- Redirect กลับไปยังหน้า index.php เพื่อแสดงผล -->