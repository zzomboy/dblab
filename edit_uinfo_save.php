<?php
	session_start();
	require_once('connect.php');
	$uid = $_POST['uid'];
	$utitle	 = $_POST['utitle'];
	$uname	 = $_POST['uname'];
	$utel	 = $_POST['utel'];
	$uemail	 = $_POST['uemail'];
	$ubirth	 = $_POST['ubirth'];
	$submitbt = $_POST['save_uinfo'];
	
	$q	= "select * from user where user_id = '$uid'";
	$result	= $mysqli->query($q);
	if(!$result){
		echo "Error on : $q";
	}

	if($submitbt != "save"){
		header("location: my_account.php");
		exit();
	}
	else{
		$row=$result->fetch_array();
		if(!empty($_POST['upw']) || !empty($_POST['upw_new']) || !empty($_POST['upw_new_repeat'])){
			if(empty($_POST['upw']) || empty($_POST['upw_new']) || empty($_POST['upw_new_repeat'])){
				echo "<script>alert('Please fill in old password , new password and repeat password to change password!!!');history.back();</script>";
				exit();
			}
			else{
				$upw = $_POST['upw'];
				$upw_new = $_POST['upw_new'];
				$upw_new_repeat = $_POST['upw_new_repeat'];
				if(base64_encode($upw) != $row['user_pw']){
					echo "<script>alert('Incorrect password!!!');history.back();</script>";
					exit();
				}
				else{
					if($upw_new != $upw_new_repeat){
						echo "<script>alert('New password are not match!!!');history.back();</script>";
						exit();
					}
					else{
						$upw	= base64_encode($upw_new);
						$sql = "UPDATE user SET user_title = '$utitle' , user_name = '$uname' , user_tel = '$utel' , user_email = '$uemail' , user_birth = '$ubirth' , user_pw = '$upw' WHERE user_id = '$uid'";
						$mysqli->query($sql) or die("error=$sql");
						$_SESSION['username'] = $uemail;
						header("location: my_account.php");
						exit();
					}
				}
			}
		}
		else{
			$sql = "UPDATE user SET user_title = '$utitle' , user_name = '$uname' , user_tel = '$utel' , user_email = '$uemail' , user_birth = '$ubirth' WHERE user_id = '$uid'";
			$mysqli->query($sql) or die("error=$sql");
			$_SESSION['username'] = $uemail;
			header("location: my_account.php");
			exit();
		}
	}
?>