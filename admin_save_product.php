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
		/*$image = $_FILES['ppic']['name'];		
		echo "<script>console.log('".$ext."');</script>";
		if(!in_array($ext,$allowed)){
			echo "<script>alert('Image file can be only .gif or .jpg or .png!!!');history.back();</script>";
			exit();
		}else{
			$pimg = $_POST['pimg'];
			move_uploaded_file($image['tmp_name'],"../img/product/".$pimg);
		}*/

		$target_dir = "img/product/";
		$target_file = $target_dir . basename($_FILES["ppic"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["ppic"]["tmp_name"]);
		    if($check !== false) {
		        $pimg = $_POST['pimg'];
		    } else {
		        echo "<script>console.log('error');</script>";
		    }
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
		    echo "<script>alert('Image file can be only .gif or .jpg or .png!!!');history.back();</script>";
		}
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	} else {
		$pimg = "xxx";
	}
	
	$sql= "insert into product values('','$pname','$pimg','$pdesc','$pprice','$ppdis','$psale','$pwarr','$pdetail','1','$pcat')";
	$mysqli->query($sql) or die("error=$sql");
	header("location: admin.php");
	exit();
?>