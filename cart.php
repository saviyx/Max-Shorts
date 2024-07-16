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

            include "connection.php";

            session_start();

            if (isset($_SESSION["u"])) {

                $user = $_SESSION["u"]["email"];

                $total = 0;
                $subtotal = 0;
                $shipping = 0;
                ?>



                <div class="col-11 userBody mt-5 mb-4 border border-1 border-primary">

                    <div class="row ">

                        <div class="col-12">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-label fs-1 fw-bold offset-1">Cart <i
                                            class="bi bi-cart4 fs-1 text-info mx-2"></i></label>
                                </div>

                                <div class="col-12 col-lg-10 offset-1">
                                    <hr />
                                </div>

                                <?php

                                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
                                $cart_num = $cart_rs->num_rows;

                                if ($cart_num == 0) {
                                    ?>

                                    <!-- Empty View -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 emptyCart"></div>
                                            <div class="col-12 text-center mb-2">
                                                <label class="form-label fs-1 fw-bold">
                                                    You have no items in your Cart yet.
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

                                    <!-- products -->
                                    <div class="col-12 col-lg-8 ">
                                        <div class="row">

                                            <?php
                                            for ($x = 0; $x < $cart_num; $x++) {
                                                $cart_data = $cart_rs->fetch_assoc();

                                                $product_rs = Database::search("SELECT * FROM `stock` INNER JOIN `category` ON 
                                              `stock`.`category_id`=`category`.`id` INNER JOIN `colour` ON `stock`.`colour_id`=`colour`.`id` 
                                              INNER JOIN `type` ON `stock`.`type_id`=`type`.`id` INNER JOIN `size` ON `stock`.`size_id`=`size`.`id`
                                              WHERE `stock`.`stock_id`='" . $cart_data["stock_stock_id"] . "'");

                                                $product_data = $product_rs->fetch_assoc();

                                                $total = $total + ($product_data["price"] * $cart_data["qty"]);




                                                $ship = $product_data["delivery_fee"];
                                                $shipping = $shipping + $ship;

                                                ?>
                                                <div class="card rounded-5 border-white mx-5 mb-5 col-11 col-lg-12 bg-transparent">
                                                    <div class="row g-0">
                                                        <div class="col-md-12 mt-2 mb-1 offset-1">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <span class="fw-bold text-black-50 fs-4">Seller :</span>&nbsp;
                                                                    <span class="fw-bold text-black fs-5">Max</span>&nbsp;
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr class="col-10 offset-1 mt-2">

                                                        <div class="col-md-4 mx-3">

                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                                data-bs-trigger="hover focus"
                                                                title="<?php echo $product_data["colour"]; ?>">
                                                                <img src="<?php echo $product_data["img_path"]; ?>"
                                                                    class="img-fluid rounded-start" style="max-width: 200px;">
                                                            </span>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card-body">

                                                                <h3 class="card-title"><?php echo $product_data["category"]; ?></h3>

                                                                <span class="fw-bold text-black-50">Colour :
                                                                    <?php echo $product_data["colour"]; ?></span> &nbsp; |

                                                                &nbsp; <span class="fw-bold text-black-50">Type :
                                                                    <?php echo $product_data["type"]; ?></span>
                                                                <br>
                                                                <span class="fw-bold text-black-50">Type :
                                                                    <?php echo $product_data["size"]; ?></span>
                                                                <br>
                                                                <span class="fw-bold text-black-50 ">Price :</span>&nbsp;
                                                                <span
                                                                    class="fw-bold text-black ">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                                                <br>
                                                                <span class="fw-bold text-black-50 fs-5">Quantity :</span>&nbsp;
                                                                <input type="number"
                                                                    class="mt-3 border border-2 border-secondary fs-4 fw-bold  text-black cardqtytext"
                                                                    value="<?php echo $cart_data["qty"]; ?>"
                                                                    onchange="changeQTY(<?php echo $cart_data['cart_id']; ?>);"
                                                                    id="qty_num">
                                                                <br><br>
                                                                <span class="fw-bold text-black-50 fs-5">Delivery Fee :</span>&nbsp;
                                                                <span
                                                                    class="fw-bold text-black fs-5">Rs.<?php echo $ship; ?>.00</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mx-5 mt-5">
                                                            <div class="card-body d-grid">
                                                                <a class="btn btn-success mb-2"
                                                                    onclick="payNow(<?php echo $product_data['stock_id'] ?>);">Buy
                                                                    Now</a>
                                                                <a class="btn btn-danger mb-2"
                                                                    onclick="deleteFromCart(<?php echo $cart_data['cart_id']; ?>);">Remove</a>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-6 col-md-6">
                                                                    <span class="fw-bold fs-5 text-black-50">Requested Total <i
                                                                            class="bi bi-info-circle"></i></span>
                                                                </div>
                                                                <div class="col-6 col-md-6 text-end">
                                                                    <span
                                                                        class="fw-bold fs-5 text-black-50">Rs.<?php echo ($product_data["price"] * $cart_data["qty"]) + $ship; ?>.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <?php

                                            }

                                            ?>

                                        </div>
                                    </div>

                                    <!-- products -->

                                    <!-- summary -->
                                    <div class="col-11 col-lg-3 mx-5 my-5">
                                        <div class="row">

                                            <div class="col-12">
                                                <label class="form-label fs-3 fw-bold">Summary</label>
                                            </div>

                                            <div class="col-12">
                                                <hr />
                                            </div>

                                            <div class="col-6 mb-3">
                                                <span class="fs-5 fw-bold">items (<?php echo $cart_num; ?>)</span>
                                            </div>

                                            <div class="col-6 text-end mb-3">
                                                <span class="fs-5 fw-bold">Rs.<?php echo $total; ?>.00</span>
                                            </div>

                                            <div class="col-6">
                                                <span class="fs-5 fw-bold">Delivery fee</span>
                                            </div>

                                            <div class="col-6 text-end">
                                                <span class="fs-5 fw-bold">Rs.<?php echo $shipping; ?>.00</span>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <hr />
                                            </div>

                                            <div class="col-6 mt-2">
                                                <span class="fs-4 fw-bold">Total</span>
                                            </div>

                                            <div class="col-6 mt-2 text-end">
                                                <span class="fs-4 fw-bold">Rs.<?php echo $total + $shipping; ?>.00</span>
                                            </div>

                                            <div class="col-12 mt-3 mb-3 d-grid">
                                                <button class="btn btn-primary fs-5 fw-bold"
                                                    onclick="payNow2(<?php echo ($shipping + $total); ?>)">CHECKOUT</button>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- summary -->
                                    <?php
                                }

                                ?>

                            </div>
                        </div>

                    </div>

                </div>
                <?php
            } else {
                ?>
                <script>window.location = "login.php"</script>
                <?php
            }

            require "footer.php";
            ?>
        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>

</html>