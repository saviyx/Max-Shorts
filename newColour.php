<?php

include "connection.php";

$colour = $_GET["colour"];


if (empty($colour)) {
    echo ("Please enter your new colour");
} else {
    $rs = Database::search("SELECT * FROM `colour` WHERE `colour`='" . $colour . "'");
    $n = $rs->num_rows;
    if ($n == 1) {
        echo ("This colour already exist");
    } else {

        Database::iud("INSERT INTO `colour`(`colour`) VALUES ('" . $colour . "')");

        echo ("Saved");

    }

}

?>