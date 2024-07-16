<?php

include "connection.php";

$type = $_GET["type"];


if (empty($type)) {
    echo ("Please enter your new type");
} else {
    $rs = Database::search("SELECT * FROM `type` WHERE `type`='" . $type . "'");
    $n = $rs->num_rows;
    if ($n == 1) {
        echo ("This colour already exist");
    } else {

        Database::iud("INSERT INTO `type`(`type`) VALUES ('" . $type . "')");

        echo ("Saved");

    }

}

?>