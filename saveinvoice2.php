<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $o_id = $_POST["o"];
    // $p_id = $_POST["i"];
    $email = $_POST["m"];
    // $amount = $_POST["a"];
    // $qty = $_POST["q"];


    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
    $cart_num = $cart_rs->num_rows;

    for ($x = 0; $x < $cart_num; $x++) {
        $cart_data = $cart_rs->fetch_assoc();

        $p_id = $cart_data["stock_stock_id"];
        $qty = $cart_data["qty"];

        $product_rs = Database::search("SELECT * FROM `stock` WHERE `stock_id`='" . $p_id . "'");
        $product_data = $product_rs->fetch_assoc();

        $curr_qty = $product_data["qty"];
        $new_qty = $curr_qty - $qty;

        $amount = $qty * $product_data["price"];

        Database::iud("UPDATE `stock` SET `qty` = '" . $new_qty . "' WHERE `stock_id`='" . $p_id . "'");

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`total`,`qty`,`stock_stock_id`,`user_email`) 
        VALUES ('" . $o_id . "','" . $date . "','" . $amount . "','" . $qty . "','" . $p_id . "','" . $email . "')");

        Database::iud("DELETE  FROM `cart` WHERE `user_email`='" . $email . "' AND `stock_stock_id`='" . $p_id . "'");


    }
    echo ("success");
}
?>