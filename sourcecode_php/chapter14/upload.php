<?php
	$attachfile = $_FILES['attach'];
   	
	print_r($attachfile); 
   	echo "<br/><br/>";
   
   if(move_uploaded_file($attachfile['tmp_name'],"attach/".$attachfile['name'])){  
      echo "Upload file complete";
   } else {
      echo "Can't upload this file";
   } 
?>
