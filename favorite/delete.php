<?php
include '../connection.php';
$userID=$_POST['user_id'];
$itemID=$_POST['item_id'];

$sqlQuery="DELETE FROM favorite_table WHERE user_id='$userID' AND item_id='$itemID'";

$resultOfQuery=$connectNow->query($sqlQuery);

if($resultOfQuery){
    echo json_encode(array("success"=>true));
}
else{
    echo json_encode(array("success"=>false));
}