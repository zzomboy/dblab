<?php
	session_start();
	require_once('connect.php');
	$pname	 =$_POST['pname'];
	$pprice	 =$_POST['pprice'];
	$pwarr	 =$_POST['pwarr'];
	$pcat	 =$_POST['pcat'];
	$hidden_i =$_POST['hidden_i'];
	$hidden_j =$_POST['hidden_j'];
	if (isset($_POST['ppdis'])) {
		$ppdis = $_POST['ppdis'];
		$psale = $pprice - (($pprice*$ppdis)/100);
	}else{
		$ppdis = 0;
		$psale = $pprice;
	}
	$c=1;
	$pdetail = "";
	while ($c =< $hidden_i) {
		if (trim($_POST['topic_detail_'.$c]) != "" && trim($_POST['text_detail_'.$c]) != "") {
			$pdetail = $pdetail.$_POST['topic_detail_'.$c].":".$_POST['text_detail_'.$c].",";
		}	
		$c++;
	}
	$c=1;
	$pdesc = "";
	while ($c =< $hidden_j) {
		if (trim($_POST['text_desc_'.$c]) != "") {
			$pdesc = $pdesc.$_POST['text_desc_'.$c].",";
		}
		$c++;
	}
	if (isset($_FILES['image'];)) {
		$image = $_FILES['image'];
		$imageinfo	= pathinfo($image['name']);
		if($imageinfo['extension']!='jpg' && $imageinfo['extension']!='gif' && $imageinfo['extension']!='png'){
			echo "<script>alert('Image file can be only .gif or .jpg or .png!!!');history.back();</script>";
			exit();
		}else{
			$pimg = $_POST['pimg'];
			move_uploaded_file($image['tmp_name'],"../img/product/$pimg");
		}
	} else {
		$pimg = "xxx";
	}
	
	$sql= "insert into product values('','$pname','$pimg','$pdesc','$pprice','$ppdis','$psale','$pwarr','$pdetail','1','$pcat')";
	$mysqli->query($sql) or die("error=$sql");
	//header("location: admin.php");
?>