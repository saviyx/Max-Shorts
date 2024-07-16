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

            <div class="col-12 col-lg-10 text-center userBody1">

                <div class="row ">

                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label fs-2 fw-bold text-white mx-3">Add Products <i
                                        class=" fs-1 text-info mx-3"><img src="images/add-product.png"
                                            alt=""></i></label>
                            </div>
                            <div class="col-1 mt-2 ">
                                <a href="productManage.php"><img src="images/back (1).png" alt=""></a></label>
                            </div>
                            <div class="col-11">
                                <hr class="border border-1 border-white">
                            </div>

                            <div class="col-12 mt-3">


                                <div class="col-2 offset-5 mt-4 Pimage">
                                    <img src="images/image (1).png" class="rounded" style="width: 150px;" id="img">
                                    <input type="file" class="d-none" id="productimage" />
                                    <label for="productimage" class="btn btn-primary mt-5 "
                                        onclick="addProductImg();">Add your Product Image</label>
                                </div>
                            </div>
                            <div class="offset-0 offset-lg-3 col-12 col-lg-6">
                                <label class="form-label fw-bold fs-4 mt-4 text-black">
                                    Select Product Category
                                </label>
                            </div>
                            <div class="offset-0 offset-lg-4 col-11 col-lg-4 mt-3 fs-3">
                                <select class="form-select text-center fs-5" id="category">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $category_rs = Database::search("SELECT * FROM `category`");
                                    $category_num = $category_rs->num_rows;

                                    for ($x = 0; $x < $category_num; $x++) {
                                        $category_data = $category_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $category_data["id"]; ?>">
                                            <?php echo $category_data["category"]; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-1 mt-2">
                                <img src="images/add-button.png" alt="" onclick="addC();">
                            </div>



                            <div class="offset-0 offset-lg-3 col-12 col-lg-6">
                                <label class="form-label fw-bold fs-4 mt-4 text-black">
                                    Select Product Colour
                                </label>
                            </div>
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 mt-2 fs-3">
                                <select class="form-select text-center fs-5" id="colour">
                                    <option value="0">Select Colour</option>

                                    <?php
                                    $colour_rs = Database::search("SELECT * FROM `colour`");
                                    $colour_num = $colour_rs->num_rows;

                                    for ($x = 0; $x < $colour_num; $x++) {
                                        $colour_data = $colour_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $colour_data["id"]; ?>">
                                            <?php echo $colour_data["colour"]; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-1 mt-2">
                                <img src="images/add-button.png" alt="" onclick="addColour();">
                            </div>

                            <div class="offset-0 offset-lg-3 col-12 col-lg-6">
                                <label class="form-label fw-bold fs-4 mt-4 text-black">
                                    Select Product Type
                                </label>
                            </div>
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 mt-2 fs-3">
                                <select class="form-select text-center fs-5" id="type">
                                    <option value="0">Select Type</option>

                                    <?php
                                    $type_rs = Database::search("SELECT * FROM `type`");
                                    $type_num = $type_rs->num_rows;

                                    for ($x = 0; $x < $type_num; $x++) {
                                        $type_data = $type_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $type_data["id"]; ?>">
                                            <?php echo $type_data["type"]; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-1 mt-2">
                                <img src="images/add-button.png" alt="" onclick="addType();">
                            </div>

                            <div class="offset-0 offset-lg-3 col-12 col-lg-6">
                                <label class="form-label fw-bold fs-4 mt-4 text-black">
                                    Select Product Size
                                </label>
                            </div>
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 mt-2 fs-3">
                                <select class="form-select text-center fs-5" id="size">
                                    <option value="0">Select Size</option>

                                    <?php
                                    $size_rs = Database::search("SELECT * FROM `size`");
                                    $size_num = $size_rs->num_rows;

                                    for ($x = 0; $x < $size_num; $x++) {
                                        $size_data = $size_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $size_data["id"]; ?>">
                                            <?php echo $size_data["size"]; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-1 mt-2">
                                <img src="images/add-button.png" alt="" onclick="addSize()">
                            </div>



                            <div class="offset-0 offset-lg-3 col-12 col-lg-6">
                                <label class="form-label fw-bold fs-4 mt-4 text-black ">
                                    Enter Product Quantity
                                </label>
                            </div>
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 mt-2 fs-3 ">
                                <input type="text" class="form-control text-center" id="qty" />
                            </div>

                            <div class="offset-0 offset-lg-3 col-12 col-lg-6">
                                <label class="form-label fw-bold fs-4 mt-4 text-black">
                                    Enter Product Price
                                </label>
                            </div>
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 mt-1 fs-3">
                                <input type="text" class="form-control text-center" id="price" />
                            </div>

                            <div class="offset-0 offset-lg-3 col-12 col-lg-6">
                                <label class="form-label fw-bold fs-4 mt-4 text-black">
                                    Enter Dillevery fee
                                </label>
                            </div>
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 mt-1 fs-3">
                                <input type="text" class="form-control text-center" id="dillevery" />
                            </div>

                            <div class="col-12 col-lg-4 mt-5 buttonA  offset-4  mb-5" onclick="addProduct()">
                                Add Product
                            </div>
                        </div>


                    </div>




                </div>




            </div>

        </div>
    </div>

    <!-- Cmodal -->
    <div class="modal" tabindex="-1" id="cmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-10 offset-1">
                            <label class="form-label">New Category</label>
                            <input type="text" class="form-control" id="category1" />
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addCatogary();">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Cmodal -->

    <!-- Colourmodal -->
    <div class="modal" tabindex="-1" id="colourmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new colour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-10 offset-1">
                            <label class="form-label">New Colour</label>
                            <input type="text" class="form-control" id="colour1" />
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addColour1();">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Colourmodal -->

    <!-- Typemodal -->
    <div class="modal" tabindex="-1" id="Typemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-10 offset-1">
                            <label class="form-label">New type</label>
                            <input type="text" class="form-control" id="type1" />
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addType1();">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Typemodal -->

    <!-- Sizemodal -->
    <div class="modal" tabindex="-1" id="Sizemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-10 offset-1">
                            <label class="form-label">New size</label>
                            <input type="text" class="form-control" id="size1" />
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addSize1();">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Sizemodal -->



    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>