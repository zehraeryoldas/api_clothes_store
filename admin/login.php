<?php
include '../connection.php';

$adminEmail=$_POST['admin_email'];

$adminPassword=md5($_POST['admin_password']);

//sorgu yapacaz

$sqlQuery="SELECT *FROM admin_table WHERE admin_email='$adminEmail' and admin_password='$adminPassword' ";

$resulOfQuery=$connectNow->query($sqlQuery);
if($resulOfQuery->num_rows>0) //allow admin to login
{
    $adminRecord=array();
    while($rowFound=$resulOfQuery->fetch_assoc()){
        $adminRecord[]=$rowFound;
    }
    echo json_encode(
        array(
            "success"=>true,
            "adminData"=>$adminRecord[0],
        )
        );

}
else{
    echo json_encode(
        array(
            "success"=>false,
        )
        );
}