<?php

include "connection.php";

$pageno;

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
    <title>MAX Shop</title>
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

            <div class="col-12 col-lg-11 mt-3 mb-3 userBody">
                <div class="col-12">
                    <div class="row">

                        <div class="col-12">
                            <label class="form-label fs-1 fw-bold offset-1">Shop <i
                                    class="bi bi-shop fs-1 text-info mx-2"></i></label>
                        </div>

                        <div class="col-12 col-lg-10 offset-1">
                            <hr />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Search in Shop..."
                                        id="basic_search_txt" />
                                </div>
                                <div class="col-12 col-lg-2 mb-3 d-grid">
                                    <button class="btn btn-outline-primary" onclick="basicSearch(0);">Search</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>


                    </div>
                    <div class="row" id="basicSearchResult">
                        <div class="listProduct text-black">
                            <?php

                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }

                            $product_rs = Database::search("SELECT * FROM `stock` INNER JOIN category ON `stock`.`category_id` = `category`.`id` 
                         WHERE  `status_status_id` = '1'
                         ORDER BY `datetime_added` DESC LIMIT 8 OFFSET 0");

                            $product_num = $product_rs->num_rows;

                            $results_per_page = 8;
                            $number_of_pages = ceil($product_num / $results_per_page);
                            $page_results = ($pageno - 1) * $results_per_page;

                            $selected_rs = Database::search("SELECT * FROM `stock` INNER JOIN category ON `stock`.`category_id` = `category`.`id` 
                            WHERE  `status_status_id` = '1'
                            ORDER BY `datetime_added` DESC  LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                            $selected_num = $selected_rs->num_rows;
                            for ($x = 0; $x < $selected_num; $x++) {
                                $selected_data = $selected_rs->fetch_assoc();
                                ?>



                                <div class="item mt-5">

                                    <?php
                                    $img_rs = Database::search("SELECT `img_path` FROM `stock` WHERE `stock_id`='" . $selected_data["stock_id"] . "'");
                                    $img_data = $img_rs->fetch_assoc();
                                    ?>
                                    <img src="<?php echo $img_data["img_path"]; ?>" alt="">
                                    <h2><?php echo $selected_data["category"]; ?></h2>
                                    <div class="price">RS.<?php echo $selected_data["price"]; ?>.00</div>
                                    <a class="col-12 btn btn-dark mt-3"
                                        onclick="addToCart(<?php echo $selected_data['stock_id']; ?>)">
                                        Add To Cart
                                    </a>
                                    <a href='<?php echo "product.php?id=" . ($selected_data["stock_id"]); ?>'
                                        class="col-12 btn btn-success mt-3">
                                        Buy Now
                                    </a>
                                </div>




                                <?php

                            }
                            ?>


                        </div>
                        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    <?php
                                    for ($x = 1; $x <= $number_of_pages; $x++) {
                                        if ($x == $pageno) {
                                            ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <li class="page-item">
                                        <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
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