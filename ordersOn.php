<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>MAX | Product</title>
    <link rel="icon" href="images/wh.png">


    <!-- link Jquery -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- link Jquery -->

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

</head>

<body class="body1">
    <?php
    require "video.php";
    ?>
    <div class="container-fluid vh-100">
        <div class="row d-flex justify-content-center ">

            <?php
            require "adminPanel.php";
            ?>

            <div class="col-12 col-lg-10 ">

                <div class="row ">

                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-8">
                                <label class="form-label fs-2 fw-bold text-white mx-3">On Goin Orders <i
                                        class=" fs-1 text-info mx-3"><img src="images/product-management.png"
                                            alt=""></i></label>
                            </div>

                        </div>

                        <hr class="border border-1 border-white">

                    </div>


                    <!-- body contend -->

                    <div class="row">
                        <div class="col-12 mx-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>User Details</h4>
                                    <div class="card-header-form">

                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th class="text-center"></th>
                                                <th>Order Id</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Address</th>
                                                <th>Date</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php

                                            $t = Database::search("SELECT * , `invoice`.`qty` AS `invoice_qty`FROM `invoice` INNER JOIN `stock` ON `stock`.`stock_id` = `invoice`.`stock_stock_id` 
                                                INNER JOIN `category` ON 
                                                `stock`.`category_id`=`category`.`id` INNER JOIN `colour` ON `stock`.`colour_id`=`colour`.`id` 
                                                 INNER JOIN `type` ON `stock`.`type_id`=`type`.`id` INNER JOIN `size` ON `stock`.`size_id`=`size`.`id`
                                                 INNER JOIN `user` ON `invoice`.`user_email`=`user`.`email`
                                                ORDER BY `date` DESC ");

                                            $gett = $t->num_rows;
                                            for ($r = 0; $r < $gett; $r++) {
                                                $sett = $t->fetch_assoc();

                                                ?>
                                                <tr>
                                                    <td class="p-0 text-center">
                                                        <div class="custom-checkbox custom-control"></div>
                                                    </td>
                                                    <td><?php echo $sett["order_id"] ?></td>
                                                    <td class="text-truncate">
                                                        <?php echo $sett["category"] . " " . $sett["type"] . " " . " " . $sett["size"] . " " . " " . $sett["colour"] . " " ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="progress-text">
                                                            <?php echo $sett["invoice_qty"] ?>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $sett["total"] ?></td>
                                                    <td><?php echo $sett["ad_line1"] . " " . $sett["ad_line2"] . " " ?></td>
                                                    <td><?php echo $sett["date"] ?></td>
                                                    <td>
                                                        <?php echo $sett["user_email"] ?>
                                                    </td>
                                                    <td>

                                                        <button class="btn btn-outline-info">Confirm</button>

                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- body contend -->
                </div>

            </div>

        </div>
    </div>




    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>