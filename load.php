<?php

require "connection.php";

// today history
$rs = Database::search("SELECT * FROM invoice INNER JOIN stock ON invoice.stock_stock_id = stock.stock_id 
INNER JOIN category ON stock.category_id = category.id 
 WHERE DATE(date) = CURDATE() ORDER BY invoice.qty DESC");
$n = $rs->num_rows;

$st = 0;

if ($n >= 1) {
    while ($chart_data = $rs->fetch_assoc()) {
        if ($st != "5") {
            $qty[] = $chart_data["qty"];
            $name[] = $chart_data["category"];
            $st = $st + 1;
        }
    }
} else {
    $qty[] = 0;
    $name[] = "None";
}

// send 
$data = new stdClass();
$data->qty = $qty;
$data->name = $name;

echo json_encode($data);