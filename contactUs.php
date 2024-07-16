<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Contact Admin</title>
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



            <div class="col-9 userBody mt-5 mb-4 border border-1 border-primary">

                <div class="row ">

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 mt-3">
                                <label class="form-label fs-1 fw-bold offset-1">Contact Admin <i
                                        class=" fs-1 text-info mx-2"><img src="images/chat.png" alt=""></i></label>
                            </div>

                            <div class="col-12 col-lg-10 offset-1">
                                <hr />
                            </div>





                            <div class="col-12">



                                <div class="row d-flex justify-content-center p-4">
                                    <div class="col-12">
                                        <div class="row p-2 d-flex justify-content-center">

                                            <div class="col-12 col-lg-10 p-2">
                                                <div class="col-12 bg-white rounded-3 border border-secondary border-2 p-2"
                                                    style="height: 64vh; overflow-y: auto; overflow-x: hidden;"
                                                    id="messagebox" onload="scrollToBottom()">
                                                    <div class="row p-2 g-2">

                                                        <!-- user -->
                                                        <div class="col-12">
                                                            <div class="row p-1 d-flex justify-content-end">
                                                                <div
                                                                    class="col-10 col-sm-11 col-md-11 col-lg-11 d-flex justify-content-end align-items-center p-2">
                                                                    <span
                                                                        class="fs-5 border border-secondary px-3 p-3 rounded rounded-3 text-bg-info"
                                                                        id="adminmsg">Hiiiiiiiiiiii</span>
                                                                </div>
                                                                <div
                                                                    class="col-2 col-sm-1 col-md-1 col-lg-1 d-flex justify-content-center p-2">
                                                                    <img src="images/new_user.svg"
                                                                        class="rounded-circle border border-secondary"
                                                                        style="width: 50px; height: 50px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- user -->

                                                        <!-- admin -->
                                                        <div class="col-12" id="userbox">
                                                            <div class="row p-1">
                                                                <div
                                                                    class="col-2 col-sm-1 col-md-1 col-lg-1 d-flex justify-content-center p-2">
                                                                    <img src="images/new_user.svg"
                                                                        class="rounded-circle border border-success"
                                                                        style="width: 50px; height: 50px;">
                                                                </div>
                                                                <div
                                                                    class="col-10 col-sm-11 col-md-11 col-lg-11 d-flex justify-content-start align-items-center p-2">
                                                                    <div
                                                                        class="row border border-success px-2 p-3 rounded rounded-3 text-bg-dark">
                                                                        <div class="col-12 ">
                                                                            <span class="fs-5 ">Aiiiiii</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- admin -->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-8 p-2">
                                                <div class="col-12 bg-white rounded-3 border border-secondary border-2">
                                                    <div class="row p-2 g-2">
                                                        <div class="col-12 p-2 d-flex justify-content-center gap-3">
                                                            <input type="text" class="form-control" style="width: 90%;"
                                                                id="messsagedata">
                                                            <button class="inputbtn text-white btn form-control"
                                                                style="width: 10%; background-color:rgb(5, 195, 144);"
                                                                onclick="sendmessage();"><i
                                                                    class="bi bi-send fs-5"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <!-- <script>
                                            function startLiveUpdate() {
                                                const textViewCount = document.getElementById('viewCount');

                                                setInterval(function () {
                                                    fetch('loadusermsg.php').then(function (response) {
                                                        return response.json();
                                                    }).then(function (data) {
                                                        textViewCount.textContent = data.viewCount;
                                                    }).catch(function (error) {
                                                        console.log(error);
                                                    });
                                                }, 2000);

                                            }

                                            I

                                            document.addEventListener('DOMContentLoaded', function () {
                                                startLiveUpdate();

                                            });
                                        </script>

                                        <script>
                                            function scrollToBottom() {
                                                var scrollableDiv = document.getElementById('messagebox');
                                                scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
                                            }

                                            window.onload = scrollToBottom;

                                        </script> -->


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