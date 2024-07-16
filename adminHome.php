<?php


   
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>MAX | Admin</title>
        <link rel="icon" href="images/wh.png">

        <!-- link Chart -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <!-- link Chart -->

        <!-- link Jquery -->
        <script src="js/jquery-3.7.1.min.js"></script>
        <!-- link Jquery -->
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
                            <label class="form-label fs-2 fw-bold text-white">Dashboard <i class=" fs-1 text-info mx-2"><img
                                        src="images/dashboard.png" alt=""></i></label>

                        </div>


                        <!-- body contend -->

                        <div class="col-12 col-lg-12 p-2 ">
                            <div class="col-12 userBody1 rounded rounded-3 border border-secondary border-2 ">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row p-2">
                                            <div class="col-12 col-lg-6 mb-2 mb-lg-0">
                                                <div
                                                    class="col-12 rounded rounded-3 border border-secondary border-2 p-2 d-flex justify-content-center">
                                                    <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 mb-md-2 mb-lg-0">
                                                <div
                                                    class="col-12 rounded rounded-3 border border-secondary border-2 p-2 d-flex justify-content-center">
                                                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 d-none d-md-block d-lg-block">
                                        <div class="row ">
                                            <div class="col-10 offset-1">
                                                <div class="col-12 rounded rounded-3 border border-secondary border-2 ">
                                                    <canvas id="myChart2" style="width:100%;height: 345px;"></canvas>
                                                </div>
                                            </div>
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
        <!-- chart -->
        <script>
            $(document).ready(function () {
                fetch("load.php")
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error("Something went wrong!");
                        }

                        return response.json();
                    })
                    .then((data) => {

                        console.log(data);

                        var qty = ["10"];
                        var name = [];
                        var day = [];
                        var day_qty = data.day_qty;
                        var month = [];
                        var month_qty = data.month_qty;

                        // console.log(month_qty);

                        data.qty.forEach((data) => {
                            qty.push(data);
                        });
                        data.name.forEach((data) => {
                            name.push(data);
                        });
                        data.day.forEach((data) => {
                            day.push(data);
                        });
                        data.month.forEach((data) => {
                            month.push(data);
                        });

                        // chart 1
                        const barColors1 = [
                            "#b91d47",
                            "#00aba9",
                            "#2b5797",
                            "#e8c3b9",
                            "#1e7145"
                        ];

                        new Chart("myChart1", {
                            type: "doughnut",
                            data: {
                                labels: name,
                                datasets: [{
                                    backgroundColor: barColors1,
                                    data: qty
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    text: "Today Books Selling History"
                                }
                            }
                        });

                        // chart 1
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            });
        </script>
        <!-- chart -->


        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>

    </body>

    </html>
 