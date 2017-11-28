<?php
session_start();
require_once('connect2.php');
if(!empty($_GET["term"])){
    $param = $_GET["term"];
    $customer = array();
    $sql = $mysqli -> query ("SELECT * FROM costomer WHERE CostomerName LIKE '%$param%'");
    while ($row=$result->fetch_array()) {
        $customer[] = array('value' => $row['CostomerName'],);          
    }  
    $response = json_encode($customer) ;
    echo $response;
}
?> 