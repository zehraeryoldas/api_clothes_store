<?php
include '../connection.php';

//POST = send/save data to mysql db
//GET = retrieve/read data from mysql db

$itemName = $_POST['name'];
$itemRating = $_POST['rating'];
$itemTags = $_POST['tags'];
$itemPrice= $_POST['price'];
$itemSizes = $_POST['sizes'];
$itemColors = $_POST['colors'];
$itemDescription = $_POST['description'];
$itemImage = md5($_POST['image']); 


//sorgumuzu yazıyoruz
$sqlQuery = "INSERT INTO items_table SET name = '$itemName', rating = '$userEmail', tags = '$itemTags',price= '$itemPrice,sizes= '$itemSizes,colors= '$itemColors,description= '$itemDescription,image= '$itemImage";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery)
{
    echo json_encode(array("success"=>true));
}
else
{
    echo json_encode(array("success"=>false));
}

