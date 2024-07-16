<?php
include "connection.php";

$txt = $_POST["t"];


$query = "SELECT * FROM `stock` INNER JOIN `category` ON `stock`.`category_id` = `category`.`id`  ";

if (!empty($txt)) {
    $query .= "WHERE  `status_status_id` = '1' AND `category` LIKE '%" . $txt . "%'";
}

?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">
            <div class="listProduct text-black col-12">
                <?php

                $pageno;

                if ("0" != ($_POST["page"])) {
                    $pageno = $_POST["page"];
                } else {
                    $pageno = 1;
                }

                $product_rs = Database::search($query);
                $product_num = $product_rs->num_rows;

                if ($product_num > 0) {

                    $results_per_page = 4;
                    $number_of_pages = ceil($product_num / $results_per_page);

                    $page_results = ($pageno - 1) * $results_per_page;
                    $selected_rs = Database::search(" SELECT * FROM `stock` INNER JOIN `category` ON `stock`.`category_id` = `category`.`id`WHERE  `status_status_id` = '1' LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                    $selected_num = $selected_rs->num_rows;
                    for ($x = 0; $x < $selected_num; $x++) {
                        $selected_data = $selected_rs->fetch_assoc();
                        ?>



                        <div class="item mt-5" ondblclick="viewProduct();">

                            <?php
                            $img_rs = Database::search("SELECT `img_path` FROM `stock` WHERE `stock_id`='" . $selected_data["stock_id"] . "'");
                            $img_data = $img_rs->fetch_assoc();
                            ?>
                            <img src="<?php echo $img_data["img_path"]; ?>" alt="">
                            <h2><?php echo $selected_data["category"]; ?></h2>
                            <div class="price">RS.<?php echo $selected_data["price"]; ?>.00</div>
                            <a class="col-12 btn btn-dark mt-3" onclick="addToCart(<?php echo $selected_data['stock_id']; ?>)">
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

                    <div class="offset-2 offset-lg-3 col-8 col-lg-12 text-center mb-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" <?php if ($pageno <= 1) {
                                        echo ("#");
                                    } else {
                                        ?> onclick="basicSearch(<?php echo ($pageno - 1); ?>);" ; <?php
                                    } ?> aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <?php
                                for ($x = 1; $x <= $number_of_pages; $x++) {
                                    if ($x == $pageno) {
                                        ?>
                                        <li class="page-item active">
                                            <a class="page-link" onclick="basicSearch(<?php echo ($x); ?>);"><?php echo $x; ?></a>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" onclick="basicSearch(<?php echo ($x); ?>);"><?php echo $x; ?></a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>

                                <li class="page-item">
                                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                        echo ("#");
                                    } else {
                                        ?> onclick="basicSearch(<?php echo ($pageno + 1); ?>);" ; <?php
                                    } ?> aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <?php
                } else {
                    ?>
                    <div>
                        <img src="images/no-results.gif" class="notImage">
                    </div>

                    <?php
                }
                ?>
            </div>

        </div>
    </div>
</div>