<?php
include
$userEmail=$_POST['user_email'];
$sqlQuery="SELECT *FROM users_table WHERE user_email='$userEmail'";
$resultOfQuery=$connectNow->query($sqlQuery);
if($resultOfQuery->num_rows>0){//num_row maillerin uniqueliğine bakıyor
    //num rows length==1 ---email already in someone else use--error
    echo json_encode(array("emailFound"=>true));
}
else{
    //num rows length==0 --- email is not already in someone else use
    //a user will allowed to signup succesfully
    echo json_encode(array("emailFound"=>false));
}