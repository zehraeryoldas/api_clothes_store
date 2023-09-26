<?php
include '../connection.php';

$userId = $_POST['user_id'];
$itemId = $_POST['item_id'];
$quantity = $_POST['quantity'];
$color = $_POST['color'];
$size = $_POST['size'];

$sqlQuery = "INSERT INTO cart_table SET user_id='$userId',item_id='$itemId',quantity='$quantity', color='$color',size='$size'";
$resultOfQuery = $connectNow->query($sqlQuery);
if ($resultOfQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}