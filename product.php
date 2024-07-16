<?php
include "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT * FROM `stock` INNER JOIN `category` ON 
    `stock`.`category_id`=`category`.`id` INNER JOIN `colour` ON `stock`.`colour_id`=`colour`.`id` 
    INNER JOIN `type` ON `stock`.`type_id`=`type`.`id` INNER JOIN `size` ON `stock`.`size_id`=`size`.`id`
    WHERE `stock`.`stock_id`='" . $pid . "'");

    $product_num = $product_rs->num_rows;
    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();

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
            <title><?php echo $product_data["category"]; ?> | MAX</title>
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



                    <div class="col-8 userBody mt-5 mb-4">

                        <div class="row ">



                            <div class=" mt-2 col-12 col-lg-2">

                                <div class="row ">
                                    <div class="col-12">
                                        <img src="<?php echo $product_data["img_path"]; ?> " alt="" class="border-end">
                                    </div>

                                </div>
                            </div>



                            <div class="col-5 offset-4 mt-5">
                                <div class="row">
                                    <div class="col-12 mt-5">



                                        <div class="row ">
                                            <div class="col-12 my-2">
                                                <span
                                                    class="fs-1 fw-bold text-success"><?php echo $product_data["category"]; ?></span>
                                                <hr class="fs-3 fw-bold">
                                            </div>
                                        </div>

                                        <?php

                                        $price = $product_data["price"];
                                        $adding_price = ($price / 100) * 10;
                                        $new_price = $price + $adding_price;
                                        $difference = $new_price - $price;

                                        ?>
                                        <div class="row border-bottom border-dark mt-3">
                                            <div class="col-12 my-2">
                                                <span class="fs-4 text-dark fw-bold">Rs.<?php echo ($price) ?>.00</span>
                                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                                <span class="fs-4 text-bg-danger fw-bold text-decoration-line-through">
                                                    Rs.<?php echo ($new_price) ?>.00
                                                </span>
                                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                                <span class="fs-4 fw-bold text-black-50">Save Rs.<?php echo ($difference) ?>.00
                                                    (10%)</span>
                                            </div>
                                            <div class="col-12 my-2">
                                            <span class="fs-5 text-black"><b>Dilivery fee :
                                            <?php echo $product_data["delivery_fee"]; ?></b></span><br />
                                            </div>
                                        </div>

                                        <div class="row border-bottom border-dark">
                                            <div class="col-12 my-2">
                                            
                                                <span class="fs-5 text-primary"><b>Colour :
                                                        <?php echo $product_data["colour"]; ?></b></span><br />
                                                <span class="fs-5 text-primary"><b>Type :
                                                        <?php echo $product_data["type"]; ?>
                                                    </b></span><br />
                                                <span class="fs-5 text-primary"><b>Size :
                                                        <?php echo $product_data["size"]; ?></b></span><br />
                                                <span class="fs-5 text-primary"><b>Available Quantity :
                                                        <?php echo $product_data["qty"]; ?></b></span>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-12 mx-3">
                                                <div class="row">
                                                    <div class="col-12 my-2">
                                                        <div class="row g-2">
                                                            <div class="col-12 mt-5">
                                                                <span>Quantity : </span>
                                                                <input
                                                                    onkeyup='check_value(<?php echo $product_data["qty"]; ?>);'
                                                                    type="number" min="1"
                                                                    max="<?php echo $product_data["qty"]; ?>"
                                                                    class="border-0 fs-5 text-black fw-bold text-center"
                                                                    style="outline: none;" pattern="[0-9]" value="1"
                                                                    id="qty_num" />
                                                            </div>
                                                            <div class="row mt-5">
                                                                <div class="col-12 mt-5">
                                                                    <div class="row">
                                                                        <div class="col-5 d-grid offset-1">
                                                                            <button class="btn btn-success" type="submit"
                                                                                id="payhere-payment"
                                                                                onclick="payNow(<?php echo $pid; ?>);">Buy
                                                                                Now</button>
                                                                        </div>
                                                                        <div class="col-5 d-grid">
                                                                            <button class="btn btn-primary" onclick="addToCart(<?php echo $product_data['stock_id'] ?>)">Add To
                                                                                Cart</button>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    require "footer.php";
                    ?>
                </div>

            </div>


            </div>
            </div>

            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
            


        </body>

        </html>

        <?php

    } else {
        echo ("Sorry for the inconvenience.Please try again later.");
    }
} else {
    echo ("Something Went Wrong.");
}

?>