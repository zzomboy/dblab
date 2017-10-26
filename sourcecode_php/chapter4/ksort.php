<?php
$array=array('b'=>'red','d'=>'green','c'=>'blue','a'=>'white');
ksort($array);
print_r($array);

echo "<br>";

krsort($array);
print_r($array);
?>