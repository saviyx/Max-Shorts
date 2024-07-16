<?php

session_start();

include "connection.php";

if (isset($_SESSION["au"])) {
    $adMail = $_SESSION["au"]['email'];
    $adName = $_SESSION["au"]['name'];

    ?>
    <!-- Admin Panel -->

    <div class="col-12 col-lg-2">
        <div class="row">
            <div class="col-12 align-items-start bg-dark vh-100">
                <div class="row g-1 text-center">

                    <div class="col-12">
                        <img src="images/Adm.png" alt="">
                    </div>

                    <div class="col-12 ">
                        <hr class="border border-1 col-10 offset-1 border-white" />
                        <h4 class="text-white fw-bold"><?php echo $adName ?></h4>
                        <span class="text-info"><?php echo $adMail ?></span>
                        <hr class="border border-1 border-white col-10 offset-1 " />
                    </div>


                    <div class="col-12">
                        <h4 class="text-warning fw-bold">Actions</h4>
                        <hr class="border border-1 border-white" />
                    </div>

                    <div class="col-12 d-grid  ">
                        <div class="row">
                            <!-- <div class="col-10 buttonA offset-1" onclick="dash()">
                                Dashboard
                            </div> -->
                            <div class="col-10 mt-3 buttonA offset-1" onclick="userM()">
                                Manage Users
                            </div>
                            <div class="col-10 mt-3 buttonA offset-1" onclick="productM()">
                                Manage Product
                            </div>
                            <div class="col-10 mt-3 buttonA offset-1" onclick="onOrder()">
                                Ongoin Orders
                            </div>
                            


                            <div class="col-10 offset-1">
                                <hr class="mt-5 border border-1 border-white ">
                            </div>

                            <div class="col-10 mt-5 buttonOut offset-1" onclick="Admsignout()">
                                Log Out
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Panel -->

    <?php

} else {
    ?>
    <script>window</script>
    <?php
}

?>