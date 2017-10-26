<?php
$array = array(0 => 100, "color" => "red");
print_r(array_keys($array));
echo "<br>";
$array = array("blue", "red", "green", "blue", "blue");
print_r(array_keys($array, "blue"));
?>