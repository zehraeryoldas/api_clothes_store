<?php
include '../connection.php';

//POST = send/save data to mysql db
//GET = retrieve/read data from mysql db


$adminEmail = $_POST['admin_email'];
$adminPassword =$_POST['admin_password'];

//sorgumuzu yazıyoruz
$sqlQuery = "SELECT *FROM admins_table WHERE admin_email='$adminEmail' AND admin_password='$adminPassword'";

$resultOfQuery = $connectNow->query($sqlQuery);

//Bu satır, veritabanı sorgusu sonucunda dönen satır sayısını kontrol eder. 
//Eğer sorgu sonucunda dönen satır sayısı 0'dan büyükse (yani bir kullanıcının eşleştiği kayıt bulunduysa), bu şart sağlanır.
// Bu, kullanıcının giriş yapabileceği anlamına gelir.
if ($resultOfQuery->num_rows > 0) {
    $adminRecord = array(); 
    // fetch_assoc() yöntemi kullanılarak sorgu sonucunda dönen veriler satır satır alınır ve bir diziye ($userRecord) atanır. 
    while ($rowFound = $resultOfQuery->fetch_assoc()) {
        $adminRecord[] = $rowFound; //satır bulunduğunda kullanıcı kaydına göndeirlecektir
    }
    //success ile birlikte kullanıcın bilgilerini de göndereceğiz çünkü giriş yapılacak
    echo json_encode(array("success" => true, "adminData" => $adminRecord[0]));
} else {
    echo json_encode(array("success" => false));
}