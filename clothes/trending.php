<?php
include '../connection.php';
$minRating = 4.4;
$limitClothesItem = 5;

$sqlQuery = "Select *FROM items_table WHERE rating>='$minRating' ORDER BY rating DESC LIMIT $limitClothItems";
//newly available top rated clothes item=5
$resultOfQuery = $connectNow->query($sqlQuery);
if ($resultOfQuery->num_rows > 0) {
    $clothItemsRecord = array();
    while ($rowFound = $resultOfQuery->fetch_assoc()) {
        $clothItemsRecord[] = $rowFound;
    }
    echo json_encode(
        array(
            "success" => true,
            "clothesItemsData" => $clothItemsRecord[0],
        )
    );

} else {
    echo json_encode(array("success" => false));
}