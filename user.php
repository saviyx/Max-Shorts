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

                $email = $_SESSION["u"]["email"];

                $details_rs = Database::search("SELECT * FROM `user`  WHERE `email`='" . $email . "'");



                $user_details = $details_rs->fetch_assoc();


                ?>

                <div class="col-11 col-lg-8 userBody mt-5 mb-4">

                    <div class="row g-2 align-items-center">
                        <!-- profile image part -->
                        <div class="col-md-5 ">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="images/new_user.svg" class="rounded mt-5" style="width: 150px;" id="img" />
                                <span
                                    class="fw-bold"><?php echo $user_details["fname"] . " " . $user_details["lname"] ?></span>
                                <span class="fw-bold text-info"><?php echo $email; ?></span>


                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="p-3 py-5">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="fw-bold">Profile Settings</h4>
                                </div>

                                <div class="row mt-4">

                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input id="fname" type="text" class="form-control"
                                            value="<?php echo $user_details["fname"]; ?>" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input id="lname" type="text" class="form-control"
                                            value="<?php echo $user_details["lname"]; ?>" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Mobile</label>
                                        <?php
                                        if (empty($user_details["mobile"])) {
                                            ?>
                                            <input id="mobile" type="text" class="form-control" />
                                            <?php
                                        } else {
                                            ?>
                                            <input id="mobile" type="text" class="form-control"
                                                value="<?php echo $user_details["mobile"]; ?>" />
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control"
                                                value="<?php echo $user_details["password"]; ?>" readonly />

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" readonly
                                            value="<?php echo $user_details["email"]; ?>" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Registered Date</label>
                                        <input type="text" class="form-control" readonly
                                            value="<?php echo $user_details["joined_date"]; ?>" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Address Line 01</label>

                                        <?php
                                        if (empty($user_details["ad_line1"])) {
                                            ?>
                                            <input id="line1" type="text" class="form-control" />
                                            <?php
                                        } else {
                                            ?>
                                            <input id="line1" type="text" class="form-control"
                                                value="<?php echo $user_details["ad_line1"]; ?>" />
                                            <?php
                                        }
                                        ?>

                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Address Line 02</label>
                                        <?php
                                        if (empty($user_details["ad_line2"])) {
                                            ?>
                                            <input id="line2" type="text" class="form-control" />
                                            <?php
                                        } else {
                                            ?>
                                            <input id="line2" type="text" class="form-control"
                                                value="<?php echo $user_details["ad_line2"]; ?>" />
                                            <?php
                                        }
                                        ?>
                                    </div>







                                    <div class="col-12">
                                        <label class="form-label">Postal Code</label>
                                        <?php
                                        if (empty($user_details["postal_code"])) {
                                            ?>
                                            <input id="pcode" type="text" class="form-control" />
                                            <?php
                                        } else {
                                            ?>
                                            <input id="pcode" type="text" class="form-control"
                                                value="<?php echo $user_details["postal_code"]; ?>" />
                                            <?php
                                        }
                                        ?>

                                    </div>



                                    <div class="col-12 d-grid mt-3">
                                        <button class="btn btn-primary" onclick="updateProfile();">Update My
                                            Profile</button>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>


                </div>
                <?php

            } else {
                ?>

                <script>
                    window.location = "login.php";
                </script>

                <?php
            }
            require "footer.php";
            ?>

        </div>


    </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>