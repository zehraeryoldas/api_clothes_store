<?php
include '../connection.php';

//POST = send/save data to mysql db
//GET = retrieve/read data from mysql db


$userEmail = $_POST['user_email'];
$userPassword = md5($_POST['user_password']);

//sorgumuzu yazıyoruz
$sqlQuery = "SELECT *FROM users_table WHERE user_email='$userEmail' AND user_password='$userPassword'";

$resultOfQuery = $connectNow->query($sqlQuery);

//Bu satır, veritabanı sorgusu sonucunda dönen satır sayısını kontrol eder. 
//Eğer sorgu sonucunda dönen satır sayısı 0'dan büyükse (yani bir kullanıcının eşleştiği kayıt bulunduysa), bu şart sağlanır.
// Bu, kullanıcının giriş yapabileceği anlamına gelir.
if ($resultOfQuery->num_rows > 0) {
    $userRecord[] = array(); //satır bulunduğunda kullanıcı kaydına göndeirlecektir
    // fetch_assoc() yöntemi kullanılarak sorgu sonucunda dönen veriler satır satır alınır ve bir diziye ($userRecord) atanır. 
    while ($rowFound = $resultOfQuery->fetch_assoc()) {
        $userRecord = $rowFound;
    }
    //success ile birlikte kullanıcın bilgilerini de göndereceğiz çünkü giriş yapılacak
    echo json_encode(array("success" => true, "userData" => $userRecord[0]));
} else {
    echo json_encode(array("success" => false));
}