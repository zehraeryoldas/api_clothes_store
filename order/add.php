<?php
include '../connection.php';

$userID=$_POST["user_id"];
$selectedItems=$_POST["selectedItems"];
$deliverSystem=$_POST["deliverSystem"];
$paymentSystem=$_POST["paymentSystem"];
$note=$_POST["note"];
$totalamount=$_POST["totalamount"];
$image=$_POST["image"];
$status=$_POST["status"];
$dateTime=$_POST["dateTime"];
$shipmentAddress=$_POST["shipmentAddress"];
$phoneNumber=$_POST["phoneNumber"];
$imageFileBase64=$_POST["imageFile"];


$sqlQuery="INSERT INTO orders_table SET user_id='$userID',selectedItems='$selectedItems',deliverSystem='$deliverSystem',paymentSystem='$paymentSystem',note='$note',totalamount='$totalamount',image='$image',status='$status',dateTime='$dateTime',shipmentAddress='$shipmentAddress',phoneNumber='$phoneNumber',imageFile='$imageFileBase64'";
if($resultOfQuery){
  
    echo json_encode(array("success" => true, "itemsFoundData" => $foundItemsRecord));
}else {
    echo json_encode(array("success" => false));
}