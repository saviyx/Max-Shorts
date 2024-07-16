<?php

include "connection.php";

$email = $_GET["email"];

    

    $rs = Database::iud("UPDATE user SET status_status_id = '1' WHERE email = '" . $email . "'");

    echo("success");



?>