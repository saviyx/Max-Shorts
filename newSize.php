<?php

include "connection.php";

$size = $_GET["size"];


if (empty($size)) {
    echo ("Please enter your new type");
} else {
    $rs = Database::search("SELECT * FROM `size` WHERE `size`='" . $size . "'");
    $n = $rs->num_rows;
    if ($n == 1) {
        echo ("This colour already exist");
    } else {

        Database::iud("INSERT INTO `size`(`size`) VALUES ('" . $size . "')");

        echo ("Saved");

    }

}

?>