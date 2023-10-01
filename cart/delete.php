<?php
include '../connection.php';

$cartID=$_POST['cart_id'];
$sqlQuery="DELETE from cart_table where cart_id='$cartID'";

$resultOfQuery=$connectNow->query($sqlQuery);

if($resultOfQuery){
    echo json_encode(array("success"=>true));
}
else{
    echo json_encode(array("success"=>false));
}