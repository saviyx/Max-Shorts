<?php
session_start();
include "connection.php";

if(isset($_SESSION["u"])){

    $id = $_GET["id"];
    $qty = $_GET["qty"];
    $umail = $_SESSION["u"]["email"];

    $array;

    $order_id = uniqid();

    $product_rs = Database::search("SELECT * FROM `stock` INNER JOIN `category` ON `stock`.`category_id`=`category`.`id` 
    WHERE `stock_id`='".$id."'");

    $product_data = $product_rs->fetch_assoc();

    $city_rs = Database::search("SELECT `ad_line1`,`ad_line2` FROM `user` WHERE `email`='".$umail."'");
    $city_num = $city_rs->num_rows;


    if($city_num == 1){

        $ad_data = $city_rs->fetch_assoc();
    
        $delivery = "0";

       
        $delivery = $product_data["delivery_fee"];

        $address = $ad_data["ad_line1"].", ".$ad_data["ad_line2"];
        

        $item = $product_data["category"];
        $amount = ((int)$product_data["price"] * (int)$qty) + (int)$delivery;

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $uaddress = $address;


        $merchant_id = "1227442";
        $merchant_secret = "MjY5MjcwMTAwOTM3MDE0ODc5NTQzOTUzODE1MDA4MjAyNzkxMTQ2Mg==";
        $currency = "LKR";

        $hash = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );

        $array["id"] = $order_id;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile"] = $mobile;
        $array["address"] = $uaddress;
        $array["umail"] = $umail;
        $array["mid"] = $merchant_id;
        $array["msecret"] = $merchant_secret;
        $array["currency"] = $currency;
        $array["hash"] = $hash;

        echo json_encode($array);

    }else{
        echo ("2");
    }

}else{
    echo ("1");
}

?>