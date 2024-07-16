<?php

include "connection.php";

$category = $_GET["category"];


if (empty($category)) {
    echo ("Please enter your new category");
} else {
    $rs = Database::search("SELECT * FROM `category` WHERE `category`='" . $category . "'");
    $n = $rs->num_rows;
    if ($n == 1) {
        echo ("This Category already exist");
    } else {

        Database::iud("INSERT INTO `category`(`category`) VALUES ('" . $category . "')");

        echo ("Saved");

    }

}

?>