<?php
include '../connection.php';


$typedKeywords=$_POST['typedKeywords'];

$sqlQuery="SELECT *from items_table where name like '$typedKeywords'";

$resultOfQuery=$connectNow->query($sqlQuery);
if($resultOfQuery->num_rows>0){
    $foundItemsRecord=array();
    while($rowFound=$resultOfQuery->fetch_assoc()){
$foundItemsRecord[]=$rowFound;
    }
    echo json_encode(array("success"=>true,"itemsFoundData"=>$foundItemsRecord));
}
else{
    echo json_encode(array("success"=>false));
}