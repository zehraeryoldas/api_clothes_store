//aynı ürün aynı kişi tarafından bir daha beğnilmiş mi beğenilmemiş mi?

<?php
include '../connection.php';
$userID=$_POST['user_id'];
$itemID=$_POST['item_id'];

$sqlQuery="SELECT *FROM favorite_table WHERE user_id='$userID' AND item_id='$itemID'";

$resultOfQuery=$connectNow->query($sqlQuery);

if($resultOfQuery->num_rows>0){
    echo json_encode(array("favoriteFound"=>true));
}
else{
    echo json_encode(array("favoriteFound"=>false));
}