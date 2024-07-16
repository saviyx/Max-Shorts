<?php

include "connection.php";

session_start();

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"]["email"];


    $selected_rs = Database::search("SELECT * , `invoice`.`qty` AS `invoice_qty`FROM `invoice` INNER JOIN `stock` ON `stock`.`stock_id` = `invoice`.`stock_stock_id` 
    INNER JOIN `category` ON 
    `stock`.`category_id`=`category`.`id` INNER JOIN `colour` ON `stock`.`colour_id`=`colour`.`id` 
    INNER JOIN `type` ON `stock`.`type_id`=`type`.`id` INNER JOIN `size` ON `stock`.`size_id`=`size`.`id`
    WHERE `invoice`.`user_email`='" . $user . "' ORDER BY `date` DESC ");

    $selected_num = $selected_rs->num_rows;

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <title>MAX User</title>
        <link rel="icon" href="images/wh.png">
    </head>

    <body class="body1">
        <?php
        require "video.php";
        ?>
        <div class="container-fluid vh-100">
            <div class="row d-flex justify-content-center ">
                <?php
                require "header.php";
                ?>



                <div class="col-11 userBody mt-5 mb-4 border border-1 border-primary">

                    <div class="row ">

                        <div class="col-12">
                            <div class="row ">

                                <div class="col-12">
                                    <label class="form-label fs-1 fw-bold offset-1">My Orders <i
                                            class=" fs-1 text-info mx-2"><img src="images/package (1).png"
                                                alt=""></i></label>

                                </div>

                                <div class="col-12 col-lg-10 offset-1">
                                    <hr />
                                </div>

                                <?php
                                if ($selected_num == 0) {
                                    ?>
                                    <!-- Empty View -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 emptyCart"></div>
                                            <div class="col-12 text-center mb-2">
                                                <label class="form-label fs-1 fw-bold">
                                                    You have no items Order yet.
                                                </label>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid">
                                                <a href="home.php" class="btn btn-outline-info fs-3 fw-bold">
                                                    Start Shopping
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Empty View -->
                                    <?php
                                } else {
                                    ?>
                                    <div class=" col-12 col-lg-12">
                                        <div class="row">
                                            <?php
                                            for ($x = 0; $x < $selected_num; $x++) {
                                                $selected_data = $selected_rs->fetch_assoc();
                                                ?>
                                                <!-- products -->

                                                <div class="card rounded-5 border-white mx-5 mb-5 col-11 col-lg-2 bg-transparent">
                                                    <div class="row g-0">
                                                        <div class="col-md-12  mt-2 mb-1 offset-1">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <span class="fw-bold text-black-50 fs-4">Seller :</span>&nbsp;
                                                                    <span class="fw-bold text-black fs-5">Max</span>&nbsp;
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr class="col-10 offset-1 ">

                                                        <div class="col-12 mx-3">

                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                                data-bs-trigger="hover focus" data-bs-content="Black"
                                                                title="Product Description">
                                                                <img src="<?php echo $selected_data["img_path"];?>"
                                                                    class="img-fluid rounded-start" style="max-width: 200px;">
                                                            </span>

                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card-body">

                                                                <h4 class="card-title"><?php echo $selected_data["category"];?></h4>

                                                                <span class="fw-bold text-black-50 fs-5">Colour : <?php echo $selected_data["colour"];?></span> 
                                                                        <br>
                                                                 <span class="fw-bold text-black-50 fs-5">Order Number : <?php echo $selected_data["order_id"];?>
                                                                </span>
                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                                <span class="fw-bold text-black fs-5">Rs.<?php echo $selected_data["price"];?>.00</span>
                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-5">Quantity :</span>&nbsp;
                                                                <span class="fw-bold text-black fs-5"><?php echo $selected_data["invoice_qty"];?></span>
                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-5">Delivery Fee :</span>&nbsp;
                                                                <span class="fw-bold text-black fs-5">Rs.<?php echo $selected_data["delivery_fee"];?>.00</span>

                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-6 col-md-6">
                                                                    <span class="fw-bold fs-5 text-black-50">Total<i
                                                                            class="bi bi-info-circle"></i></span>
                                                                </div>
                                                                <div class="col-6 col-md-6 text-end">
                                                                    <span class="fw-bold fs-5 text-black-50">Rs.<?php echo $selected_data["total"];?>.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- products -->

                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>







                            </div>
                        </div>

                    </div>

                </div>
                <?php
                require "footer.php";
                ?>
            </div>
        </div>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

    <?php
} else {
    ?>
    <script>
        window.location = "login.php";
    </script>

    <?php
}
?>