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
                                <label class="form-label fs-2 fw-bold text-white mx-3">History <i
                                        class=" fs-1 text-info mx-3"><img src="images/product-management.png"
                                            alt=""></i></label>
                            </div>

                        </div>

                        <hr class="border border-1 border-white">

                    </div>


                    <!-- body contend -->


                    <div class="col-12 userBody1 rounded rounded-3 border border-secondary border-2 p-2">
                        <div class="row">

                            <!-- tabel -->
                            <table id="myTable" class="display mx-4">
                                <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Row 1 Data 1</td>
                                        <td>Row 1 Data 2</td>
                                    </tr>
                                    <tr>
                                        <td>Row 2 Data 1</td>
                                        <td>Row 2 Data 2</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- tabel -->

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