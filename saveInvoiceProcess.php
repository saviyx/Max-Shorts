<?php

session_start();
include "connection.php";

if(isset($_SESSION["u"])){

    $order_id = $_POST["o"];
    $pid = $_POST["i"];
    $mail = $_POST["m"];
    $amount = $_POST["a"];
    $qty = $_POST["q"];

    $product_rs = Database::search("SELECT * FROM `stock` WHERE `stock_id`='".$pid."'");
    $product_data = $product_rs->fetch_assoc();

    $current_qty = $product_data["qty"];
    $new_qty = $current_qty - $qty;

    Database::iud("UPDATE `stock` SET `qty`='".$new_qty."' WHERE `stock_id`='".$pid."'");

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`total`,`qty`,`stock_stock_id`,`user_email`) 
    VALUES ('".$order_id."','".$date."','".$amount."','".$qty."','".$pid."','".$mail."')");

    echo ("success");

}

?>