<?PHP
	$password = "This is PHP";
	echo "PASSWORD =>".$password."<br>";
	$encode = base64_encode($password);
	echo "ENCODE =>".$encode."<br>";
	$decode = base64_decode($encode);
	echo "DECODE =>".$decode."<br>";
?>
