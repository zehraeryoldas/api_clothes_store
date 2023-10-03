<?php
include '../connection.php';

$userID=$_POST['user_id'];
$itemID=$_POST['item_id'];

$sqlQuery="INSERT into favorite_table set user_id='$userID', item_id='$itemID'";

$resultOfQuery=$connectNow->query($sqlQuery);

if($resultOfQuery){
    echo json_encode(array("success"=>true));
}
else{
    echo json_encode(array("success"=>false));
}