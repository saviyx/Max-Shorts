<?php

include "connection.php";

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
                <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
                <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
            </div>

        </nav>

        <!----------------------------- Form box ----------------------------------->
        <div class="form-box">

            <!------------------- login form -------------------------->

            <?php
            $email = "";
            $password = "";

            if (isset($_COOKIE["email"])) {
                $email = $_COOKIE["email"];
            }

            if (isset($_COOKIE["password"])) {
                $password = $_COOKIE["password"];
            }
            ?>

            <div class="login-container" id="login">
                <div class="top">
                    <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                    <header>Login</header>

                </div>
                
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Username or Email" id="email2" value="<?php echo $email; ?>" >
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box mt-2">
                    <input type="password" class="input-field" placeholder="Password" id="password2" value="<?php echo $password; ?>">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box mt-2">
                    <input type="submit" class="submit" value="Sign In" onclick="signin();">
                </div>

                <div class="input-box mt-1">
                    <input type="submit" class="adbutton" value="Admin Login" onclick="adminlogin()">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox"  id="rememberme" >
                        <label for="login-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#"  onclick="forgotPassword();" >Forgot password?</a></label>
                    </div>
                </div>
            </div>

            <!------------------- registration form -------------------------->
            <div class="register-container" id="register">
                <div class="top">
                    <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                    <header>Sign Up</header>
                </div>
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Firstname" id="fname">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Lastname" id="lname" >
                        <i class="bx bx-user "></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" id="email">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box mt-1">
                    <input type="password" class="input-field" placeholder="Password" id="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box mt-1">
                    <input type="submit" class="submit" value="Register" onclick="signup();">
                </div>
              
            </div>
        </div>
    </div>

     <!-- modal -->
     <div class="modal" tabindex="-1" id="fpmodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Forgot Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="np"/>
                                        <button id="npb" class="btn btn-outline-secondary" type="button" onclick="showPassword1();">Show</button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp"/>
                                        <button id="rnpb" class="btn btn-outline-secondary" type="button" onclick="showPassword2();">Show</button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vcode"/>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>