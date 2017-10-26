<?php
	$num = 100;
	$bin_num = base_convert($num,10,2) ;
	echo $bin_num."<br>";
	$oct_num = base_convert($bin_num,2,8); 
	echo $oct_num."<br>";
	$hex_num = base_convert($oct_num,8,16); 
	echo $hex_num."<br>";
	$dec_num = base_convert($hex_num,16,10); 
	echo $dec_num."<br>";
?>