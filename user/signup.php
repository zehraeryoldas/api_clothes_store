<?php
include '../connection.php';

//POST=send/save data to mysql db
//GET=retrieve/read data from mysql db

$userName = $_POST['user_name'];
$userEmail = $_POST['user_email'];
//md5 güvenlik içindir şifreleri binary formatına dönüştürür.
$userPassword = md5($_POST['user_password']);

//sorgumuzu yapalım artık

$sqlQuery = "INSERT INTO users_table SET user_name='$userName',user_email='$userEmail',user_password='$userPassword'";

$resultOfQuery = $connectNow->query($sqlQuery);
//sorgu başarılı mi diye kontrol yapacağız
if ($resultOfQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}