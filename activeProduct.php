<?php

include "connection.php";

$id = $_GET["id"];

    

    $rs = Database::iud("UPDATE stock SET status_status_id = '1' WHERE stock_id = '" . $id . "'");

    echo("success");



?>