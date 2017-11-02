<?php
	session_start();
	require_once('connect.php');
	$pid 	 =$_POST['pid'];
	$pname	 =$_POST['pname'];
	$pprice	 =$_POST['pprice'];
	$pwarr	 =$_POST['pwarr'];
	$pcat	 =$_POST['pcat'];
	$nline_detail =$_POST['nline_detail'];
	$nline_desc =$_POST['nline_desc'];

	if (isset($_POST['ppdis'])) {
		$ppdis = floatval ($_POST['ppdis']);
		$psale = $pprice - (($pprice*$ppdis)/100);
	}else{
		$ppdis = 0;
		$psale = $pprice;
	}

	$c=1;
	$pdetail = "";
	while ($c <= $nline_detail) {
		if (trim($_POST['topic_detail_'.$c]) != "" && trim($_POST['text_detail_'.$c]) != "") {
			$pdetail = $pdetail.trim($_POST['topic_detail_'.$c])."?".trim($_POST['text_detail_'.$c])."!";
		}	
		$c++;
	}

	$c=1;
	$pdesc = "";
	while ($c <= $nline_desc) {
		if (trim($_POST['text_desc_'.$c]) != "") {
			$pdesc = $pdesc.trim($_POST['text_desc_'.$c])."!";
		}
		$c++;
	}

	if(isset($_POST['pavai'])){
		$pavai=1;
	}
	else{
		$pavai=0;
	}

	if (isset($_POST['pimg'])) {
		$target_dir = "img/product/";
		$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
		    echo "<script>alert('".$imageFileType."Image file can be only .gif or .jpg or .png!!!');history.back();</script>";
		    exit();
		}if (file_exists($target_file)) {
			$pimg = $_POST['pimg'];
		} 
		else{
			$pimg = $_POST['pimg'];
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
		}
		$sql= "UPDATE product SET pro_name='$pname' , pro_pic='$pimg' , pro_desc='$pdesc' , pro_price='$pprice' , pro_pdis='$ppdis' , pro_psale='$psale' , pro_warr='$pwarr' , pro_detail='$pdetail' , pro_avai='1' , pro_avai='$pavai' WHERE pro_id='$pid'";
	}else{
		$sql= "UPDATE product SET pro_name='$pname' , pro_desc='$pdesc' , pro_price='$pprice' , pro_pdis='$ppdis' , pro_psale='$psale' , pro_warr='$pwarr' , pro_detail='$pdetail' , pro_avai='1' , pro_avai='$pavai' , cat_id='$pcat' WHERE pro_id='$pid'";
	}
	

	$mysqli->query($sql) or die("error=$sql");
	header("location: admin.php");
	exit();
?>