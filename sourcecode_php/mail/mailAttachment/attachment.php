<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<? function mailAtt_file($to , $from, $subject, $attachment, $message){
		$file_attach = $attachment;                  
		$file_attach_type = "application/octet-stream";
		$start=	strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
		$file_attach_name = substr($attachment, $start, strlen($attachment));
		
		$headers = "From: ".$from;
		
		$file = fopen($file_attach,'rb'); 
		$data = fread($file,filesize($file_attach)); 
		fclose($file); 
		
		$semi_rand = md5(time()); 
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
		
		$headers .= "\nMIME-Version: 1.0\n" . 
				    "Content-Type: multipart/mixed;\n" . 
				    " boundary=\"{$mime_boundary}\""; 
		
		$data = chunk_split(base64_encode($data)); 
		$email_message = "This is a multi-part message in MIME format.\n\n" . 
					      "--{$mime_boundary}\n" . 
					      "Content-Type:text/html; charset=\"windows-874\"\n" . 
				          "Content-Transfer-Encoding: 7bit\n\n".$message."\n\n" .		
		                  "--{$mime_boundary}\n" . 
					      "Content-Type: {$file_attach_type};\n" . 
					      " name=\"{$file_attach_name}\"\n" . 
					      "Content-Transfer-Encoding: base64\n\n" .$data. "\n\n" . 
					      "--{$mime_boundary}--\n"; 
		
		if(mail($to, $subject, $email_message, $headers)) { 
	       echo "ส่งอีเมล์เรียบร้อยแล้ว";
		} else { 
	       echo "ไม่สามารถส่งอีเมล์ได้";
		} 
   } ?>
