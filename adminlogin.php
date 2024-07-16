<?php

session_start();
include "connection.php";

if (isset($_SESSION["au"])) {

    header("Location: adminHome.php");

}
    ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>MAX | Login & Registration</title>
    <link rel="icon" href="images/wh.png">
</head>

<body>
    <?php
    include "video.php";
    ?>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <img src="images/wh.png" alt="">
            </div>
            <div>
                <p class="hp">Welcome to MAX Shorts!</p>
            </div>
            <div class="nav-button">
                <button class="btn white-btn" id="loginBtn" onclick="login()">Admin</button>

            </div>

        </nav>

        <!----------------------------- Form box ----------------------------------->

        <div class="form-box">

            <div class="login-container" id="login">
                <div class="top">
                    <span>Hi, Admin</span>
                    <header>Admin Login</header>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Enter your Email" id="e">
                    <i class="bx bx-user"></i>
                </div>

                <div class="input-box">
                    <input type="submit" class="submit" value="Send verification code" onclick="adminVerification();">
                </div>

                <div class="input-box mt-3">
                    <input type="submit" class="adbutton" value="Back to customer Login" onclick="loginA()">
                </div>

            </div>
        </div>
        <!--modal-->

        <div class="modal" tabindex="-1" id="verificationModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Admin Verification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Enter Your Verification Code</label>
                        <input type="text" class="form-control" id="vcode">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>