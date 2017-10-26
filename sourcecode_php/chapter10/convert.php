<?php
	$num = 100;
	$bin_num = decbin($num) ;
	echo $bin_num."<br>";
	$dec_num = bindec($bin_num) ;
	echo $dec_num."<hr>";
	$oct_num = decoct($num) ;
	echo $oct_num."<br>";
	$dec_num = octdec($oct_num) ;
	echo $dec_num."<hr>";
	$hex_num = dechex($num) ;
	echo $hex_num."<br>";
	$dec_num = hexdec($hex_num) ;
	echo $dec_num."<hr>";
?>