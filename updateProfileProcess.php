<?php

session_start();
include "connection.php";

$email = $_SESSION["u"]["email"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$mobile = $_POST["m"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];
$pcode = $_POST["pc"];

$user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");

if($user_rs->num_rows == 1){

    if(empty($mobile)){
        echo ("Please Enter Your Mobile Number.");
    }else if(strlen($mobile) != 10){
        echo ("Mobile Number Must Contain 10 characters.");
    }else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
        echo ("Invalid Mobile Number.");
    }else{

    Database::iud("UPDATE `user` SET `fname`='".$fname."',`lname`='".$lname."',`mobile`='".$mobile."',`ad_line1`='".$line1."',
     `ad_line2`='".$line2."', `postal_code`='".$pcode."' WHERE `email`='".$email."'");   

     echo ("Updated");
    }
}else{
    echo ("Invalid user.");
}

?>