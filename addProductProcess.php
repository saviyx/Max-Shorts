<?php

session_start();
include "connection.php";


$category = $_POST["cat"];
$colour = $_POST["co"];
$type = $_POST["ty"];
$size = $_POST["s"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$dillevery = $_POST["de"];

if ($category == 0) {
    echo ("Please Select Category");
} else if($colour == 0){
    echo ("Please Select Colour");
}else if($type == 0){
    echo ("Please Select Type");
}else if($size == 0){
    echo ("Please Select Size");
}else if($qty <= 0){
    echo ("Invalid Quantity");
}else if($price <= 0){
    echo ("Invalid Price");
}else if($dillevery <= 0){
    echo ("Invalid dillevery fee ");
}else{
    if (sizeof($_FILES) == 1) {

        $image = $_FILES["i"];
        $image_extension = $image["type"];

        $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

        if (in_array($image_extension, $allowed_image_extensions)) {
            $new_img_extension;

            if ($image_extension == "image/jpeg") {
                $new_img_extension = ".jpeg";
            } else if ($image_extension == "image/png") {
                $new_img_extension = ".png";
            } else if ($image_extension == "image/svg+xml") {
                $new_img_extension = ".svg";
            }

            $file_name = "images//pImages//" . $category . "_" . uniqid() . $new_img_extension;
            move_uploaded_file($image["tmp_name"], $file_name);

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `stock`(`category_id`,`colour_id`,`type_id`,`size_id`,`qty`,`status_status_id`,`img_path`,`price`,`delivery_fee`,`datetime_added`) 
            VALUES ('" . $category . "','" . $colour . "','" . $type . "','" . $size . "','" . $qty . "','1','" . $file_name . "',
            '" . $price . "','" . $dillevery . "','" . $date . "')");


            echo ("Saved");


        }


    } else if (sizeof($_FILES) == 0) {

        echo ("You have not selected any image.");

    } else {
        echo ("You must select only 01 product image.");
    }
}



?>