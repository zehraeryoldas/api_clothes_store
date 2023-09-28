<?php
include '../connection.php';

$currentUserOnlineID=$_POST['currentOnlineUserID'];

$sqlQuery="SELECT *FROM cart_table CROSS JOIN items_table where cart_table.user_id='$currentUserOnlineID' and  cart_table.item_id=items_table.item_id";

$resultOfQuery = $connectNow->query($sqlQuery);

//Bu satır, veritabanı sorgusu sonucunda dönen satır sayısını kontrol eder. 
//Eğer sorgu sonucunda dönen satır sayısı 0'dan büyükse (yani bir kullanıcının eşleştiği kayıt bulunduysa), bu şart sağlanır.
// Bu, kullanıcının giriş yapabileceği anlamına gelir.
if ($resultOfQuery->num_rows > 0) {
    $userRecord = array(); 
    // fetch_assoc() yöntemi kullanılarak sorgu sonucunda dönen veriler satır satır alınır ve bir diziye ($userRecord) atanır. 
    while ($rowFound = $resultOfQuery->fetch_assoc()) {
        $userRecord[] = $rowFound; //satır bulunduğunda kullanıcı kaydına göndeirlecektir
    }
    //success ile birlikte kullanıcın bilgilerini de göndereceğiz çünkü giriş yapılacak
    echo json_encode(array("success" => true, "currentUserCartData" => $userRecord));
} else {
    echo json_encode(array("success" => false));
}