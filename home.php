<?php

include "connection.php";

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
    <title>MAX Home</title>
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




            <div class="col-8 userBody  mt-5 mb-5">
                <div class="row">




                </div>
            </div>



            <div id="carouselExampleIndicators" class=" col-12 carousel slide d-none d-lg-block" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>

                </div>
                <div class="carousel-inner cinner">
                    <div class="carousel-item active">
                        <img src="images/slider/ccc1.png" class="d-block img-thumbnail poster-img-1" />
                    </div>
                    <div class="carousel-item">
                        <img src="images/slider/c2.png" class="d-block img-thumbnail poster-img-1" />
                    </div>
                    <div class="carousel-item">
                        <img src="images/slider/s3.png" class="d-block img-thumbnail poster-img-1" />
                    </div>


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <div class="col-11 mt-5 text2">
                <p class="offset-1"></p>

            </div>

            <div class="col-12 userBody ">
                <div class="row">

                    <div class="col-12 mt-3">
                        <label class="form-label fs-1 fw-bold offset-1 text-white">Latest Products<i
                                class=" fs-1 text-info mx-2"></i><img src="images/new.png" alt=""></label>
                    </div>

                    <div class="col-12 col-lg-10 offset-1">
                        <hr />
                    </div>




                    <div class="listProduct col-10 offset-1 mb-5 text-black">
                        <?php

                        $product_rs = Database::search("SELECT * FROM `stock` INNER JOIN category ON `stock`.`category_id` = `category`.`id`
                        WHERE  `status_status_id` = '1'
                        ORDER BY `datetime_added` DESC LIMIT 8 OFFSET 0");

                        $product_num = $product_rs->num_rows;

                        for ($z = 0; $z < $product_num; $z++) {
                            $product_data = $product_rs->fetch_assoc();
                            ?>

                            <div class="item mt-5">

                                <?php
                                $img_rs = Database::search("SELECT `img_path` FROM `stock` WHERE `stock_id`='" . $product_data["stock_id"] . "'");
                                $img_data = $img_rs->fetch_assoc();
                                ?>
                                <img src="<?php echo $img_data["img_path"]; ?>" alt="">
                                <h2><?php echo $product_data["category"]; ?></h2>
                                <div class="price">RS. <?php echo $product_data["price"]; ?> .00</div>

                                <a class="col-12 btn btn-dark mt-3"
                                    onclick="addToCart(<?php echo $product_data['stock_id']; ?>)">
                                    Add To Cart
                                </a>
                                <a href='<?php echo "product.php?id=" . ($product_data["id"]); ?>'
                                    class="col-12 btn btn-success mt-3">
                                    Buy Now
                                </a>
                            </div>

                            <?php

                        }
                        ?>

                    </div>


                </div>
            </div>

            <?php
            require "footer.php";
            ?>

        </div>











    </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>