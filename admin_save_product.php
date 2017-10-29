<?php
	session_start();
	require_once('connect.php');
	$pname	 =$_POST['pname'];
	$pprice	 =$_POST['pprice'];
	$pwarr	 =$_POST['pwarr'];
	$pcat	 =$_POST['pcat'];
	$hidden_i =$_POST['nline_detail'];
	$hidden_j =$_POST['nline_desc'];
	if (isset($_POST['ppdis'])) {
		$ppdis = floatval ($_POST['ppdis']);
		$psale = $pprice - (($pprice*$ppdis)/100);
	}else{
		$ppdis = 0;
		$psale = $pprice;
	}
	$c=1;
	$pdetail = "";
	while ($c <= $hidden_i) {
		if (trim($_POST['topic_detail_'.$c]) != "" && trim($_POST['text_detail_'.$c]) != "") {
			$pdetail = $pdetail.$_POST['topic_detail_'.$c].":".$_POST['text_detail_'.$c].",";
		}	
		$c++;
	}
	$c=1;
	$pdesc = "";
	while ($c <= $hidden_j) {
		if (trim($_POST['text_desc_'.$c]) != "") {
			$pdesc = $pdesc.$_POST['text_desc_'.$c].",";
		}
		$c++;
	}
	if (isset($_POST['pimg'])) {
		$image = $_FILES['image']['name'];
		$allowed =  array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
		$ext = exif_imagetype($_FILES['image']['tmp_name']);
		echo "<script>console.log(".$ext.");</script>";
		if(!in_array($ext,$allowed)){
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
	header("location: admin.php");
	exit();
?>